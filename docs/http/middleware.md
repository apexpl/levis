
# HTTP Controllers / Middleware

All PSR15 compliant middleware / HTTP controllers are stored within the /src/HttpControllers directory.  The values within the /config/routes.yml file are prefixed with `App\HttpControllers\` when resolving the namespace, and for example with the route:

~~~yaml
catalog: Shop\CatalogViewer
~~~

When a HTTP request triggers that    at route, the system will look for a HTTP controller at `App\HttpControllers\Shop\CatalogViewer`., and forward the request to it for processing.  As per the [PSR15 specification](https://www.php-fig.org/psr/psr-15/), each HTTP controller class contains one `process()` method that must return a PSR7 `ResponseInterface` object, which is then output to the web browser.

## Create HTTP Controllers

Although not absolutely required, you may quickly generate a new blank HTTP controller by using the [create http-controller CLI command](../cli/http-controller.md), for example:

~~~bash
./levis create http-controller Shop/CatalogViewer --route catalog
~~~

This will create the necessary blank HTTP controller at src/HttpControllers/Shop/Catalog.php, plus will also add the above route to the /boot/routes.yml file.


## Development

As per the PSR specifications, the HTTP controller class contains one `process()` method that takes two arguments -- a `ServerRequestInterface` object, and an instance of the [central App class](../app/index.md), which as explained in the next section contains all information on the request such as POST / GET variables, target resource, client information, and much more.

The `process()` method can do anything you wish, and simply must return a PSR7 compliant `ResponseInterface` object which is then output to the browser.  For example:

~~~php
<?php
declare(strict_types = 1);

namespace App\HttpControllers\Shop;

use Levis\Svc\View;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};

/**
 * Http Controller - ~alias~
 */
class CatalogViewer implements MiddlewareInterface
{

    #[Inject(View::class)]
    private View $view;

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        // Do something

        // Render the /views/html/catalog.html view
        $html = $this->view->render('catalog');

        // Create PSR7 compliant response
        $response = new Response(
            body: $html
        );

        // Return
        return $response;
    }

}
~~~

Again, the HTTP controllers can do anything you wish as long as they return a PSR7 compliant `ResponseInterface` object.  The above controller will perform any necessary actions, then render and output the view located at /views/html/catalog.html.  Full details on views are explained later on within the [Views - Developers](/docs/views/developers/) section of the documentation.


