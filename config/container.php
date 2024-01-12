<?php
use Psr\Http\Client\ClientInterface as HttpClientInterface;

/**
 * Populate this with any items desired within the 
 * dependency injection container.  All items placed here can be retrived any time via 
 * the get() method of the container, for example:
 *
*   $value = $this->cntr->get('my_key');
 */
return [

    /**
     * PSR-18 compliant HTTP client, defaults to Guzzle
     */
    HttpClientInterface::class => \GuzzleHttp\Client::class,

    /**
     * Services - List of item names that will be marked as services, 
     * meaning they will only be instantiated once effectively making 
     * them the equivalent of a singleton.
     */
    'services' => [
        HttpClientInterface::class
    ]

];

