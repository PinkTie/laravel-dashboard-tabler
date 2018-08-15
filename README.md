### ![PinkTie Logo](https://pinktietech.com/wp-content/uploads/2017/03/PinkTie-60x60.png) PinkTie Technology Group
# Laravel 5.5/5.6 Preset for Tabler Dashboard UI Kit

[![Latest Stable Version](https://poser.pugx.org/pinktie/laravel-dashboard-tabler/v/stable)](https://packagist.org/packages/pinktie/laravel-dashboard-tabler) [![License](https://poser.pugx.org/pinktie/laravel-dashboard-tabler/license)](https://packagist.org/packages/pinktie/laravel-dashboard-tabler)

Preset for [Tabler](https://tabler.github.io/) scaffolding on a fresh Laravel 5.5/5.6 project.

## Usage

1.  Fresh install Laravel 5.5/5.6 and `cd` to your app.
2.  Install this preset via `composer require pinktie/laravel-dashboard-tabler`. Laravel 5.5/5.6 will automatically discover this package. No need to register the service provider.
3.  Use `php artisan preset tabler` for basic Tabler preset. **OR** Use `php artisan preset tabler-auth` for basic preset, Auth route entry and Tabler Auth views in one go. (**NOTE**: If you run this command several times, be sure to clean up the duplicate Auth entries in `routes/web.php`)
4.  `yarn`
5.  `yarn dev` or `yarn watch`
6.  Configure your database (mysql, sqlite, etc.)
7.  `php artisan migrate` to create basic user tables.
8.  `php artisan serve` (or equivalent) to run server and test preset.


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Feature Request / Bug Reports

If you discover any bugs or problems or would like to request addtional features, please use the GitHub issue tracker.

## Security

If you discover any security related issues, please email support@pinktietech.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Kevin Fairbanks](https://github.com/KevinFairbanks)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
