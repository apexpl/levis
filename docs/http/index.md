
# HTTP Requests

Levis handles all HTTP requests in compliance with PSR 7 and 15 standards, meaning you either are already familiar with the request handling, or will be learning the correct way.  Every HTTP request is handled in the same manner:

* Hits the /public/index.php script, which bootloads Levis and instantiates an instance of the `Levis\App\App` class.
* Processed via the interopable router to determine the appropriate middleware class, which are stored within the /src/HttpControllers/ directory.
* Request is passed to the PSR15 compliant middleware, which returns a PSR7 compliant response, which is output to the browser.

To continue, click on one of the below links:

1. [HTTP Router](router.md)
2. [HTTP Controllers / Middleware](middleware.md)
3. [PSR7 Response](response.md)
4. [Default PublicSite Controller](public_site.md)


