# codemonster-ru/support

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codemonster-ru/support.svg?style=flat-square)](https://packagist.org/packages/codemonster-ru/support)
[![Total Downloads](https://img.shields.io/packagist/dt/codemonster-ru/support.svg?style=flat-square)](https://packagist.org/packages/codemonster-ru/support)
[![License](https://img.shields.io/packagist/l/codemonster-ru/support.svg?style=flat-square)](https://packagist.org/packages/codemonster-ru/support)
[![Tests](https://github.com/codemonster-ru/support/actions/workflows/tests.yml/badge.svg)](https://github.com/codemonster-ru/support/actions/workflows/tests.yml)

Global helper functions for the **Codemonster PHP ecosystem**.

## 📦 Installation

```bash
composer require codemonster-ru/support
```

## 🧩 Provided Helpers

| Function               | Description                          |
| ---------------------- | ------------------------------------ |
| `config()`             | Get or set configuration values      |
| `env()`                | Read environment variables           |
| `view()` / `render()`  | Render or return a view instance     |
| `router()` / `route()` | Access router instance               |
| `request()`            | Get the current HTTP request         |
| `response()`           | Create a new HTTP response           |
| `json()`               | Return a JSON response               |
| `session()`            | Read, write, or access session store |
| `dump()` / `dd()`      | Debugging utilities (print and exit) |

## 🚀 Usage

All helpers are automatically registered via Composer’s autoloading.
You can call them from anywhere in your application.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

// Environment variables
$value = env('APP_ENV', 'production');

// Configuration
config(['app.name' => 'Codemonster']);

echo config('app.name'); // Codemonster

// HTTP request and response
$request = request();
$response = response('Hello World', 200);
$response->send();

// Router
router()->get('/', fn() => response('Home'));
router()->post('/contact', fn() => response('Contact form submitted'));

// View rendering
echo render('emails.welcome', ['user' => 'Vasya']);

// Debugging
dump($request);
dd('Goodbye');
```

## 🧪 Testing

You can run tests with the command:

```bash
composer test
```

## 👨‍💻 Author

[**Kirill Kolesnikov**](https://github.com/KolesnikovKirill)

## 📜 License

[MIT](https://github.com/codemonster-ru/support/blob/main/LICENSE)
