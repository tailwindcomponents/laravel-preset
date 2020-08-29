<?php

namespace TailwindComponents\LaravelPreset\Presets;

use Illuminate\Filesystem\Filesystem;

class Dark extends Preset
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

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/dark/views/vendor/pagination', resource_path('views/vendor/pagination'));
    }

    protected static function scaffoldAuthViews()
    {
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/dark/views', resource_path('views'));
    }
}
