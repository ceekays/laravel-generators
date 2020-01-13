# Custom Laravel Generators
[![License](https://poser.pugx.org/ceekays/generators/license)](https://packagist.org/packages/ceekays/generators)
[![Latest Stable Version](https://poser.pugx.org/ceekays/generators/v/stable)](https://packagist.org/packages/ceekays/generators)
[![Total Downloads](https://poser.pugx.org/ceekays/generators/downloads)](https://packagist.org/packages/ceekays/generators)

This package provides an extended list of generators to speed up your Laravel development process. These generators include:

- `make:report`
- `make:service`

Additionally, the package also overrides the default location for `Eloquent` models. 
By default, models are placed in `app/` directory. 
However, the directory quickly becomes messy as model files get mixed up together with other specialised directories such as `Console`, `Http`,  `Jobs`, `Policies`, `Providers`, etc.
 This package overrides Laravel's behaviour of creating models and introduces a `Models` directory where your models will be located.

 The package is compatible with **Laravel 5 or later.**

## Installation

This package is installed using Composer.

    composer require ceekays/generators

### Laravel 5.5 or Later
The package uses package auto-discovery, as such for Laravel 5.5 or later you are not required to manually add the service provider.

### Laravel < 5.5
For Laravel versions lower than 5.5, add following service provider to the array of providers in `config/app.php`:

    Ceekays\Generators\GeneratorsServiceProvider::class,

That's it! You're all set to go. Run the `php artisan` command from the Terminal to see the new commands.

## Usage
- The `make:model` command has not changed its default behaviour except for the location of the models.
- `php artisan make:report UsersReport --table=users` or `php artisan make:report UsersReport -t users`
- `php artisan make:service CreateUserService`


## License
This package is open-sourced software licensed under the [MIT license](license.md).
