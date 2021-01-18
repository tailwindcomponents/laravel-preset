<?php

namespace TailwindComponents\LaravelPreset;

use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset as LaravelPreset;
use Symfony\Component\Finder\SplFileInfo;

class Preset extends LaravelPreset
{
    const NPM_PACKAGES_TO_ADD = [
        '@tailwindcss/forms' => '^0.2.1',
        'tailwindcss' => '^2.0.2',
        'autoprefixer' => '^10.2.1',
        'vue' => '^2.6.11',
        'vue-template-compiler' => '^2.6.11',
        'vue-loader'=> '^15.9.5',
    ];

    public static function install()
    {
        static::updatePackages();
        static::updateStyles();
        static::updateBootstrapping();
        static::removeNodeModules();
        static::updatePagination();
    }

    public static function installAuth()
    {
        static::scaffoldController();
        static::scaffoldMigrations();
        static::scaffoldAuth();
        static::scaffoldAuthViews();
    }

    protected static function updatePackageArray($packages)
    {
        return array_merge(
            static::NPM_PACKAGES_TO_ADD,
            $packages
        );
    }

    protected static function updateStyles()
    {
        tap(new Filesystem, function ($filesystem) {
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

    protected static function scaffoldMigrations()
    {
        $filesystem = new Filesystem;

        collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/migrations')))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    database_path('migrations/'.$file->getFilename())
                );
            });
    }

    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());

        file_put_contents(
            base_path('routes/web.php'),
            "Auth::routes();\n\nRoute::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');\n\n",
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

    protected static function updatePagination()
    {
        (new Filesystem)->delete(resource_path('views/vendor/paginate'));

        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/views/vendor/pagination', resource_path('views/vendor/pagination'));
    }

    protected static function scaffoldAuthViews()
    {
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/views', resource_path('views'));
    }
}
