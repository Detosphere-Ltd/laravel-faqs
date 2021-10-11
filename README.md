# Laravel FAQs

This is a simple package to help manage frequently asked questions in a project.

## Installation

You can install the package via composer by running:

```bash
composer require "detosphere-ltd/laravel-faqs"
```

After the installation has completed, the package will automatically register itself.
Run the following to publish the migration file

```bash
php artisan vendor:publish --provider="DetosphereLtd\LaravelFaqs\FAQServiceProvider"
```

After publishing the migration you can create the faqs table by running the migrations:

```bash
php artisan migrate
```

## Usage

## Testing

```bash
vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
