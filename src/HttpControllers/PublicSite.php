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
class PublicSite implements MiddlewareInterface
{

    #[Inject(View::class)]
    private View $view;

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        // Render template via auto-routing based on URI being viewed
        $file = $this->view->doAutoRouting($app->getPath());
        $html = $this->view->render($file);

        // Create response
        $code = str_ends_with($file, '404.html') ? 404 : 200;
        return new Response($code, [], $html);
    }

}



