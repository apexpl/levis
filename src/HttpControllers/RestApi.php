<?php
declare(strict_types = 1);

namespace App\HttpControllers;

use Levis\App\RestApi\Router;
use Levis\App\RestApi\Models\ApiResponse;
use Levis\App\RestApi\Exceptions\RestApiInvalidArgumentException;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};

/**
 * Http Controller - RestApi
 */
class RestApi implements MiddlewareInterface
{

    #[Inject(Router::class)]
    private Router $router;

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        // Set content type
        //$app->setContentType('application/json');

        // Lookup route
        if (!$route = $this->router->lookup($request)) { 
            $res = new ApiResponse(404, [], "No endpoint exists at this URI.");
            return $res->get();
        }

        // Set variables
        $middleware = $route->getMiddleware();
        $method = $route->getMethod();
        //$app->replacePathParams($route->getParams());

        // Execute method
        $res = $middleware->$method($request, $app);
        if (!$res instanceof ApiResponse) { 
            throw new RestApiInvalidArgumentException("The method $method did not return an ApiResponse object, which is required.");
        }

        // Return
        return $res->get();
    }

}


