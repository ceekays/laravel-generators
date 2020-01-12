# Custom Laravel Generators

[![Build Status](https://travis-ci.org/ceekays/laravel-generators.png?branch=master)](https://travis-ci.org/ceekays/laravel-generators)

This package provides an extended list of generators to speed up your Laravel development process. These generators include:

- `make:report`
- `make:service`

Additionally, the package also overrides the default location for `Eloquent` models. 
By default, models are placed in `app/` directory. 
However, the directory quickly becomes messy as model files get mixed up together with other specialised directories such as `Console`, `Http`,  `Jobs`, `Policies`, `Providers`, etc.
 This package overrides Laravel's behaviour of creating models and introduces a `Models` directory where your models will be located.
## Installation

This package is installed using Composer. In your Laravel project, edit the `composer.json` file to require `ceekays/generators`. Additionally, let Composer know where to fetch the package by adding a `repositories` attribute:

	"require": {
		"ceekays/generators": "^1.0.0"
	}
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ceekays/laravel-generators"
        }
    ]

then update Composer from the Terminal:

    composer update

Once this operation completes, add the following service provider to the array of providers in `config/app.php`:

    Ceekays\Generators\GeneratorsServiceProvider::class,

That's it! You're all set to go. Run the `php artisan` command from the Terminal to see the new commands.

## Usage
- The `make:model` command has not changed its default behaviour except for the location of the models.
- `php artisan make:report UsersReport --table=users` or `php artisan make:report UsersReport -t users`
- `php artisan make:service CreateUserService`
