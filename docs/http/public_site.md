
# Default PublicSite Controller

With installation, the routes within the /config/routes.ymll file will reflect that the "default" route points to the `PublicSite` HTTP controller.  This means any HTTP request made to the system that does not explicity match any other route will be forwarded to the `PublicSite` controller for processing.

The `PublicSite` uses auto-routing that displays templates based on the URI being accessed.  For example, if visiting the URL at:

> `http://localhost/services/hosting`

Levis will look for a view at /views/html/services/hosting.html, and if found will render and display it.  While doing so, Levis will also look for a PHP file at /views/php/services/hosting.php, and execute the necessary methods depending on the request method (ie. get, post,, et al) being requested.

If the .php file exists, and no function name of the HTTP method or `render()` function exists, it will throw a 404 Page Not Found error.  For example, if the .php file exists for a view, but only contains a `post()` method, any requests sent via GET to that page will return a 404 Page Not Found error.  However, if either a `get()` or `render()` method exists within the class, it will be displayed during a GET request.

For full information on how views work, please visit the [Views - Developers](../views/developers/) section of the documentation.

