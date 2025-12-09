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

| Function               | Description                                  |
| ---------------------- | -------------------------------------------- |
| `config()`             | Get or set configuration values              |
| `env()`                | Read environment variables                   |
| `view()` / `render()`  | Render or return a view instance             |
| `router()` / `route()` | Access router instance                       |
| `request()`            | Get the current HTTP request                 |
| `response()`           | Create a new HTTP response                   |
| `json()`               | Return a JSON response                       |
| `abort()`              | Throw an HTTP-like exception                 |
| `session()`            | Read or write session data                   |
| `db()`                 | Get a database connection (if installed)     |
| `schema()`             | Schema builder (if database package present) |
| `transaction()`        | Run a DB transaction                         |
| `dump()` / `dd()`      | Debugging utilities                          |

> These helpers are framework‑agnostic and automatically enabled when installed.

## 🚀 Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

// ENV
$env = env('APP_ENV', 'production');

// Config
config(['app.name' => 'Codemonster']);
echo config('app.name');

// Requests & Responses
$request = request();
return response('Hello World', 200);

// Router
router()->get('/', fn() => response('Home'));

// Views
echo render('emails.welcome', ['user' => 'Vasya']);

// Debug
dump($request);
dd('Bye!');
```

## 🗄 Database Helpers (optional)

If `codemonster-ru/database` is installed:

```php
$conn = db();         // default connection
$conn = db('mysql');  // named connection

schema()->create('users', function ($table) {
    $table->id();
    $table->string('name');
});

transaction(function ($db) {
    $db->table('logs')->insert(['msg' => 'ok']);
});
```

## 🧪 Testing

```bash
composer test
```

## 👨‍💻 Author

[**Kirill Kolesnikov**](https://github.com/KolesnikovKirill)

## 📜 License

[MIT](https://github.com/codemonster-ru/support/blob/main/LICENSE)
