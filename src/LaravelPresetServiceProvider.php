<?php

namespace TailwindComponents\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use TailwindComponents\LaravelPreset\Presets\Dark;
use TailwindComponents\LaravelPreset\Presets\Light;

class LaravelPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('tailwindcss', function ($command) {
            Light::install();

            $command->info('Tailwind CSS scaffolding installed successfully.');

            if ($command->option('auth')) {
                Light::installAuth();

                $command->info('Tailwind CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('tailwindcss:dark', function ($command) {
            Dark::install();

            $command->info('Tailwind CSS scaffolding installed successfully.');

            if ($command->option('auth')) {
                Dark::installAuth();

                $command->info('Tailwind CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        Paginator::defaultView('pagination::default');
        Paginator::defaultView('pagination::simple-default');
    }
}
