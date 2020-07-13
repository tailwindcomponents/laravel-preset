<?php

namespace TailwindComponents\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class LaravelPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('tailwindcss', function ($command) {
            LaravelPresetLight::install();

            $command->info('Tailwind CSS scaffolding installed successfully.');

            if ($command->option('auth')) {
                LaravelPresetLight::installAuth();

                $command->info('Tailwind CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('tailwindcss:dark', function ($command) {
            LaravelPresetDark::install();

            $command->info('Tailwind CSS scaffolding installed successfully.');

            if ($command->option('auth')) {
                LaravelPresetDark::installAuth();

                $command->info('Tailwind CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        Paginator::defaultView('pagination::default');
        Paginator::defaultView('pagination::simple-default');
    }
}
