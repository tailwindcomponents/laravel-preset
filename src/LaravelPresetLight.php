<?php

namespace TailwindComponents\LaravelPreset;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;

class LaravelPresetLight extends Preset
{
    public static function install()
    {
        parent::install();
        static::updatePagination();
    }

    public static function installAuth()
    {
        parent::installAuth();
        static::scaffoldAuthViews();
    }

    protected static function updatePagination()
    {
        (new Filesystem)->delete(resource_path('views/vendor/paginate'));

        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/light/views/vendor/pagination', resource_path('views/vendor/pagination'));
    }

    protected static function scaffoldAuthViews()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->copyDirectory(__DIR__.'/../stubs/resources/light/views', resource_path('views'));

            collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/migrations')))
                ->each(function (SplFileInfo $file) use ($filesystem) {
                    $filesystem->copy(
                        $file->getPathname(),
                        database_path('migrations/'.$file->getFilename())
                    );
                });
        });
    }
}
