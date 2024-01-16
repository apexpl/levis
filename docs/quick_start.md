
# Quick Start

This page will very briefly run you through Levis.  Please refer to the [full documentation](https://github.com/apexpl/levis/) for more detailed information.

1. <a name="#install">Installation</a>
2. <a name="#create_view">Create View</a>
3. <a href="#view_functionality">Create View with Functionality</a>
4. <a href="#view_dynamic_param">Create View with Dynamic Path Parameter</a>
5. <a href="#http_controller">Create HTTP Controller</a>
6. <a name="#database">SQL Database<?a>
7. <a href="#cli_command">Create Console Command</a>
8. <a href="#rest_api">Create REST API Endpoint<?a>


<a name="install">
## Installation

Install with the command:

> `composer create-project apex/levis`

Start HTTP server with the commands:

~~~bash
cd levis/public
php -S 127.0.0.1:80 index.php
~~~

You may now open http://127.0.0.1/ to view the Levis home page in your browser.


<a name="create_view">
## Create View

Create a file at ~/views/html/test.html with any body contents you would like, for example:

~~~
<h1>Test Page</h1>

<p>Just testing this whole Levis thing.</p>
~~~

By default Levis has auto-routing enabled and since the page is named test.html, open your browser to http://127.0.0.1/test to view its contents.


<a name="view_functionality">
## Create View with Functionality

Create file at /src/Numbers.php with the following contents:

~~~php
<?php
declare(strict_types=1);

namespace App;

class Numbers
{

    public function generate(): int
    {
        return rand(1000, 9999);
    }
}
~~~

Within terminal, run the command:

~~~bash
./levis create view lucky
~~~

This will simply create two new files at:

- /views/html/lucky.html
- /views/php/lucky.php

If desired, you may manually create the files instead of using the above CLI command.  Open the /views/html/lucky.html and enter the contents:

~~~
<h1>Lucky Number</h1>

<p>Your lucky number is ~lucky_num~</p>
~~~

Next, replace the contents of the /views/php/lucky.php file with:

~~~php
<?php
declare(strict_types = 1);

namespace Views;

use Levis\Svc\{View, App};
use App\Numbers;

/**
 * Render the template.  All methods below are optional, may be 
 * removed as desired, and all methods support method based dependency injection.
 */
class lucky
{

    /**
     * Render - This method will be called everytime the view is rendered, regardless of HTTP method.
     * You may also use post(), get(), delete(), et al. methods which only execute for that specific HTTP verb.
     * All methods support dependency injection, so you can put any desired dependencies within the parameter list.
     */
    public function get(View $view, App $app, Numbers $nums):void
    {
        $number = $nums->generate();
        $view->assign('lucky_num', $number);
    }

}
~~~

Now open your browser to http://127.0.0.1/lucky and you will see the contents of the lucky.html template, which executed the .php file as necessary to generate the random number.

Change the name of the `get()` function to `post()`, reload the page in your browser and you will receive a 404 Page Not Found error.  This is because the .php file does exist and a `get()` or `render()` method does not exist, so the template will now only be displayed if the HTTP method is POST.  


<a name="view_dynamic_param">
## Create View with Dynamic Path Parameter

Run the following command:

~~~bash
./levis create view order --route order/:order_id
~~~

This will create the .html and .php files again, plus will also add an entry to the /config/routes.yml file with the key of `order/:order_id`, where the colon within `:order_id` represents a dynamic path parameter.  Now open the /views/html/order.html file and enter the following contents:

~~~
<h1>Viewing Order ~order_id~</h1>

<p>Details of the order ~order_id~</p>
~~~

Open the file at /views/php/order.php and change the contents to:

~~~php
<?php
declare(strict_types = 1);

namespace Views;

use Levis\Svc\{View, App};

/**
 * Render the template.  All methods below are optional, may be 
 * removed as desired, and all methods support method based dependency injection.
 */
class order
{

    /**
     * Get
     */
    public function get(View $view, App $app):void
    {
        $order_id = $app->pathParam('order_id');
        $view->assign('order_id', $order_id);
    }

}
~~~

Now visit http://127.0.0.1/order/88125 and you will see the template displayed with the appropriate order id#.


<a name="http_controller">
## Create HTTP Controller

Create a new HTTP controller with the command:

> `./levis create http-controller track --route track/:order_id`

This will create a new file at /src/HttpControllers/Track.php and add a new entry into the /config/routes.yml file for the new route with dynamic path parameter.  Open the file at /src/httpControllers/Track.php and replace it with the following contents:

~~~php
<?php
declare(strict_types = 1);

namespace App\HttpControllers;

use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};

/**
 * Http Controller - ~alias~
 */
class Track implements MiddlewareInterface
{

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        // Define json array
        $json = [
            'order_id' => $app->pathParam('order_id'),
            'status' => 'pending',
            'notice' => "It's on its way!"
        ];

        // Return PSR7 response
        return new Response(
            status: 200,
            headers: ['Content-type' => 'application/json'],
            body: json_encode($json)
        );

    }

}
~~~

Now open the browser to http://127.0.0.1/track/284885 and you will get the JSON object as a response as expected.


<a name="database">
## SQL Database

By default, utilizes a SQLite database located at ~/db.sqlite, which will be automatically created on first connection.  You may switch to mySQL or PostgreSQL by modifying the /config/config.yml file as necessary.  Database credentials are top section within the file with example mySQL commented out.

The database object is at `Levis\Svc\Db` and can be obtained via dependancy injection, for example:

~~~php
<?php

use Levis\Svc\Db;

class MyClass
{

    #[Inject(Db::class)]
    private Db $db;

    public function doSomething():void
    {
        $db->query("SELECT * FROM some_table");
    }
}
~~~

For full information, please view the [Database](database/index.md) section of the documentation.


<a name="cli_command">
## Create Console Command

Run the command:

~~~bash
./levis create cli greet
~~~

This will simply create a new file at /src/Console/Greet.php, and if desired you may manually create these classes yourself instead of using the above command.  Open the Greet.php file and replace it with the following contents:

~~~php
<?php
declare(strict_types = 1);

namespace App\Console;

use Apex\Cli\{Cli, CliHelpScreen};
use Apex\Cli\Interfaces\CliCommandInterface;

/**
 * CLI Command -- ./levis greet
 */
class Greet implements CliCommandInterface
{

    /**
     * Process
     */
    public function process(Cli $cli, array $args):void
    {

        // Get flag and argument
        $opt = $cli->getArgs(['email']);
        $email = $opt['email'] ?? 'unknown@domain.com';
        $name = $args[0] ?? 'undefined';

        // Send message
        $cli->send("Hello $name <$email>, welcome to the CLI command.\n");
    }

    /**
     * Help
     */
    public function help(Cli $cli):CliHelpScreen
    {

        $help = new CliHelpScreen(
            title: 'Greet',
            usage: './levis greet',
            description: 'Description of the command here'
        );

        // Add parameters
        $help->addParam('name', 'The name to echo..');
        $help->addFlag('--email', 'Optional e-mail address');

        // Add example
        $help->addExample('./levis greet Matt --email matt@apexpl.io');

        // Return
        return $help;
    }

}
~~~

Now within terminal, run the command:

~~~bash
./levis greet john --email john@test.com
~~~

It will print out the message as expected with the input filled in.


<a name="rest_api">
## Create REST API Endpoint

Run the command:

~~~bash
./levis create api get-rate
~~~

This will create a new file at /src/Api/GetRate.php.  Open the file and replace it with the following contents:

~~~php

<?php
declare(strict_types = 1);

namespace App\Api;

use Levis\App\RestApi\ApiRequest;
use Levis\App\RestApi\Models\ApiResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * GetRate API endpoint
 */
Class GetRate extends ApiRequest
{

    // Properties
    private float $rate = 1.3884;

    /**
     * Will execute when HTTP method is GET.  May use any other 
     * HTTP method as function name (post, put, delete, etc.).
     */
    public function get(ServerRequestInterface $request, RequestHandlerInterface $app):ApiResponse
    {
        $data = ['rate' => $this->rate];
        return new ApiResponse(200, $data, "Internal message for developers.");
    }

    /**
     * POST
     */
    public function post(ServerRequestInterface $request, RequestHandlerInterface $app):ApiResponse
    {

        // Get amount
        $amount = $app->post('amount', 1);
        $data = ['amount' => ($amount * $this->rate)];

        // Return
        return new ApiResponse(200, $data, "Internal message for developers.");
    }

}
~~~

Now if you visit http://127.0.0.1/api/get-rate within your browser, the above `get()` function will be executed which will return a simple JSON object giving the current rate.  However, if you POST to the same URL with an 'amount' field, the amount will be converted to the new amount based on the rate and returned.

For full details, please visit the [Create REST API Endpoint](cli/api.md) page of the documentation.

