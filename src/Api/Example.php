<?php
declare(strict_types = 1);

namespace App\Api;

use Levis\App\RestApi\ApiRequest;
use Levis\App\RestApi\Models\ApiResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Example API endpoint
 */
Class Example extends ApiRequest
{

    /**
     * Will execute when HTTP method is GET.  May use any other 
     * HTTP method as function name (post, put, delete, etc.).
     */
    public function get(ServerRequestInterface $request, RequestHandlerInterface $app):ApiResponse
    {

        // Return
        return new ApiResponse(200, ['example' => 'data'], 'This is an example response.');
    }

}

