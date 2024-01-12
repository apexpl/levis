<?php
declare(strict_types=1);

/**
 * Load Composer
 */
require_once(__DIR__ . '/../vendor/autoload.php');


/**
 * Instantiate Levis app
 */
$app = new \Levis\App\App();

/**
 * Process the http request.
 */
$response = $app->handle($app->getRequest());


/**
 * Output response to client.
 */
$app->outputResponse($response);


