# Laravel FAQs

This is a simple package to help manage frequently asked questions in a project.

## Installation

You can install the package via composer by running:

```bash
composer require detosphere-ltd/laravel-faqs
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

## Models and Migrations

This package has only one model (`Faq`) and its corresponding migration file. You are allowed to extend it and use it any how you want. The model only guarded properties on the model are the `id` and `uuid`.

### Scopes

The Faq model has `scopeType` to query faqs by type. It is as easy as shown below.

```php
$faqs = \DetosphereLtd\LaravelFaqs\Models\Faq::type('type')->get();
```

## Action classes

This package exposes four action classes. Find details about them below.

### CreateFAQAction

This is used to create a new faq. The execute method accepts an array. It returns the created faq.

```php
$faq = (new CreateFAQAction)->execute([
    'question' => 'What does your app do?',
    'answer' => 'It helps manage Frequently asked questions on any application.',
    'type' => 'type'
]);
```

### UpdateFAQAction

This is used to update an already existing faq. The execute method accepts the faq to update and an array. It returns the updated faq.

```php
$faq = \DetosphereLtd\LaravelFaqs\Models\Faq::first();

$updatedFaq = (new UpdateFAQAction)->execute($faq, [
    'question' => 'What does your app do?',
    'answer' => 'It helps manage Frequently asked questions on any application.',
    'type' => 'type'
]);
```

### DeleteFAQAction

This is used to delete an existing faq from the database. The execute method accepts the faq to delete. Faqs are soft deleted. It returns void.

```php
$faq = \DetosphereLtd\LaravelFaqs\Models\Faq::first();

(new DeleteFAQAction)->execute($faq);
```

### IncrementFAQHelpfulnessAction

This is used to increment the `helpful_yes` and `helpful_no` of an existing faq in the database. The execute method accepts the faq to increment and the helpfulness to increment. Helpful must be `yes` or `no`. It returns the incremented faq. Throws an query exception if invalid `helpful` paramater is passed.

```php
$faq = \DetosphereLtd\LaravelFaqs\Models\Faq::first();

$incrementedYes = (new IncrementFAQHelpfulnessAction)->execute($faq, 'yes');

$incrementedNo = (new IncrementFAQHelpfulnessAction)->execute($faq, 'no');
```

## Usage

You can instantiate the class like you would any normal PHP class

```php
(new CreateFAQAction)->execute([
    'question' => 'What does your app do?',
    'answer' => 'It helps manage Frequently asked questions on any application.',
    'type' => 'type'
]);
```

Also, you can also resolve the class from laravel's container

```php
app(CreateFAQAction::class)->execute([
   'question' => 'What does your app do?',
    'answer' => 'It helps manage Frequently asked questions on any application.',
    'type' => 'type'
]);
```

Lastly, you can also inject the action class into your controller method like below.

```php
<?php

namespace App\Http\Controllers;

use DetosphereLtd\LaravelFaqs\Actions\CreateFAQAction;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateFAQAction $action)
    {
        $action->execute([
            'question' => $request->question,
            'answer'=> $request->answer,
            'type' => $request->type
        ]);

        return response(201);
    }
}

```

## Testing

```bash
vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
