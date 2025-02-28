# Laravel preset for TailwindCSS

[![License](https://poser.pugx.org/tailwindcomponents/laravel-preset/license)](//packagist.org/packages/tailwindcomponents/laravel-preset)
[![Latest Stable Version](https://poser.pugx.org/tailwindcomponents/laravel-preset/v)](//packagist.org/packages/tailwindcomponents/laravel-preset)
[![Total Downloads](https://poser.pugx.org/tailwindcomponents/laravel-preset/downloads)](//packagist.org/packages/tailwindcomponents/laravel-preset)
[![Monthly Downloads](https://poser.pugx.org/tailwindcomponents/laravel-preset/d/monthly)](//packagist.org/packages/tailwindcomponents/laravel-preset)
<a href="https://twitter.com/TwComponents">
    <img src="https://img.shields.io/twitter/url?label=Tailwindcomponents&style=social&url=https%3A%2F%2Ftwitter.com%2FTwComponents">
</a>

🛹 A Laravel front-end scaffolding preset for [Tailwind CSS](https://tailwindcss.com) - a Utility-First CSS Framework for Rapid UI Development.

## Installation and usage
This package requires Laravel 7.0 or higher.

1. Fresh install Laravel and `cd` to your app.
2. Install `composer require tailwindcomponents/laravel-preset --dev`.

### a. Preset WITHOUT Authentication

1. Use `php artisan ui tailwindcss` for the basic Tailwind CSS preset.
2. `npm install && npm run dev`
3. `php artisan serve` (or equivalent) to run server and test preset.

### b. Preset WITH Authentication

1. Use `php artisan ui tailwindcss --auth` for the basic preset, auth route entry, and Tailwind CSS auth views in one go. (NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in `routes/web.php`)
4. `npm install && npm run dev`
5. Configure your favorite database (mysql, sqlite etc.)
6. `php artisan migrate` to create basic user tables.
7. `php artisan serve` (or equivalent) to run server and test preset.

### Config

The default `tailwind.config.js` configuration file included by this package simply uses the config from the Tailwind vendor files. Should you wish to make changes, you should remove the file and run `node_modules/.bin/tailwind init`, which will generate a fresh configuration file for you, which you are free to change to suit your needs.

## Screenshots

![Dashboard](/screenshots/dashboard.png)

![Login](/screenshots/login.png)

![Register](/screenshots/register.png)

![Reset Password](/screenshots/reset-password-email.png)

![Reset Password](/screenshots/reset-password.png)

![Verify](/screenshots/verify.png)

![Pagination](/screenshots/pagination.png)

![Pagination](/screenshots/pagination-simple.png)
