# Laravel PR Message

Laravel middleware to add PR message to API response headers.  
You can enter the message you want to convey to the user!

## Installation

Install using Composer:

```bash
composer require naotty/laravel-pr-message
```

## Configuration

### Publish the configuration file

Run the following command to publish the configuration file:

```bash
php artisan vendor:publish --tag=pr-message-config
```

This will create the `config/pr-message.php` file.

### Customize the messages

Edit the `config/pr-message.php` file to customize the PR messages:

```php
return [
    'messages' => [
        'Would you like to work with us? We are hiring engineers!',
        'This service makes you happy!',
        'Let\'s create better services together!',
        'This service makes your life better!',
        'You, who are reading this message, would you like to work with us?',
        // Add your own messages
    ],
];
```

## Usage

### Response Headers

When using this middleware, the following HTTP header will be added to your API responses:

- `pr-message`: A randomly selected message from your configured message list

### Register as a global middleware

Add the following to the `$middleware` array in the `app/Http/Kernel.php` file:

```php
protected $middleware = [
    // Other middleware
    \Naotty\LaravelPrMessage\Middleware\AddPrMessageHeader::class,
];
```

### Apply to a specific route

Use the alias that is already registered in the `$routeMiddleware` array in the `app/Http/Kernel.php` file:

```php
protected $routeMiddleware = [
    // Other middleware
    'pr-message' => \Naotty\LaravelPrMessage\Middleware\AddPrMessageHeader::class,
];
```

Then, use it in the route definition:

```php
Route::get('/api/endpoint', function () {
    return response()->json(['data' => 'example']);
})->middleware('pr-message');
```

## License

MIT
