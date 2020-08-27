<?php

namespace TailwindComponents\LaravelPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset as LaravelPreset;
use Symfony\Component\Finder\SplFileInfo;

class Preset extends LaravelPreset
{
    const NPM_PACKAGES_TO_ADD = [
        '@tailwindcss/typography' => '^0.2.0',
        '@tailwindcss/custom-forms' => '^0.2.0',
        'laravel-mix' => '^5.0.1',
        'tailwindcss' => '^1.7.0',
        'autoprefixer' => '^9.8.6',
        'postcss-import' => '^12.0.1',
        'vue' => '^2.6.11',
        'vue-template-compiler' => '^2.6.11',
    ];

    const NPM_PACKAGES_TO_REMOVE = [
        'bootstrap',
        'bootstrap-sass',
        'popper.js',
        'laravel-mix',
        'jquery',
        'sass',
        'sass-loader'
    ];

    public static function install()
    {
        static::updatePackages();
        static::updateStyles();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    public static function installAuth()
    {
        static::scaffoldController();
        static::scaffoldAuth();
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge(
            static::NPM_PACKAGES_TO_ADD,
            Arr::except($packages, static::NPM_PACKAGES_TO_REMOVE)
        );
    }

    protected static function updateStyles()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->deleteDirectory(resource_path('sass'));
            $filesystem->delete(public_path('js/app.js'));
            $filesystem->delete(public_path('css/app.css'));

            if (! $filesystem->isDirectory($directory = resource_path('css'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });

        copy(__DIR__.'/../stubs/resources/css/app.css', resource_path('css/app.css'));
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/../stubs/tailwind.config.js', base_path('tailwind.config.js'));

        copy(__DIR__.'/../stubs/webpack.mix.js', base_path('webpack.mix.js'));

        copy(__DIR__.'/../stubs/resources/js/app.js', resource_path('js/app.js'));

        copy(__DIR__.'/../stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));

        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/js/components', resource_path('js/components'));
    }


    protected static function scaffoldController()
    {
        if (! is_dir($directory = app_path('Http/Controllers/Auth'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/Auth')))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Auth/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
    }

    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());

        file_put_contents(
            base_path('routes/web.php'),
            "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );
    }

    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/../stubs/controllers/HomeController.stub')
        );
    }
}
