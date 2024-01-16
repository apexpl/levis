
# Render Views

Generally you will never need to manually render a view as it is already handled via auto-routing and the existing middleware.  However, you may need to if developing your own middleware components as explained below.

## Manually Render Views

You may render any view within a middleware component by calling the [View::render()](../../classes/svc/view/render.md) method, such as the example HTTP controller below.  Please note, you may create HTTP controllers via the [create http-controller CLI Command](../../cli/http-controller.md) such as:

> `./levis create http-controller example`

This will create a new file located at /src/HttpControllers/Example.php, and below is an example of how to render a view within it:

~~~php
<?php
declare(strict_types = 1);

namespace App\HttpControllers;

use Levis\Svc\View;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};

/**
 * Default http controller, generally intended to serve public web site.
 */
class Example implements MiddlewareInterface
{

    #[Inject(View::class)]
    private View $view;

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        // Do something
        $template_file = 'category/cars';

        // Render template
        $html = $this->view->render($template_file);

        // Return PSR7 response
        return new Response(200, [], $html);
    }
}
~~~

In the above HTTP controller, the `Apex\Svc\View` class is injected via attribute based injection.  Afterwards, the view at /views/html/category/cars.html is rendered, and returned which would then result in being output to the web browser.

The `View::render` method simply takes one optional argument, being the filename relative to the /views/html/ directory to render.  If the argument is not provided, auto-routing will take effect and the view based on the path being visited will be rendered.




