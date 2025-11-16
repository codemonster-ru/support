# Changelog

All significant changes to this project will be documented in this file.

## [1.1.0] – 2025-11-16

### Added

-   New `abort()` helper for throwing HTTP-like exceptions with a status code.
-   Introduced `HttpStatusExceptionInterface` extending `Throwable` for consistent type support.
-   Added test coverage for `abort()` including status code and message handling.

### Updated

-   Documentation: added `abort()` to the list of provided helpers.

## [1.0.0] – 2025-10-28

### Added

-   Global helper functions for the entire **Codemonster PHP ecosystem**:
    -   `config()` — access or modify configuration values
    -   `env()` — read environment variables
    -   `dump()`, `dd()` — elegant variable dumping
    -   `request()` — get current HTTP request or input
    -   `response()`, `json()` — send structured responses
    -   `router()` / `route()` — define and access routes
    -   `session()` — read or write session data
    -   `view()` / `render()` — render templates and return responses
-   Seamless integration with the **Annabel** framework via `app()` container
-   Standalone compatibility when Annabel is not installed
-   Full PHPUnit test coverage for all helpers (18 tests / 25 assertions)
-   Support for **PHP 8.2 – 8.4** and PHPUnit **9–12**
