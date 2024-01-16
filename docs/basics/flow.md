
# Basic Flow

Every HTTP request is handled in the same manner:

* Request hits the /public/index.php script, which boots Levis.
* The interopable router determines the appropriate middleware for the request based on the URI being accessed.
* The PSR-15 compliant middleware handles the request, and returns a PSR-7 compliant `ResponseInterface` object.
* The response is output to the client, and execution ends.

All routes can be found within the /config/routes.yml file, and HTTP controllers within the /src/HttpControllers directory.  With installation any HTTP requests that do not match any of the routes within the /config/routes.yml file will be handled by the PublicSite HTTP controller.  This HTTP controller displays the correct view based on auto-routing, so for example, http://localhost/services/hosting will render the view located at /views/html/services/hosting.html if one exists.

## Entry Points and Class Instantiation

In essense, there are two entry points into the software -- HTTP controllers and views, both of which support attribute and constructor based injection.  Within Levis you should never use the `new` keyword to instantiate objects, and instead it is highly recommended to always use attribute / constructor injection for all dependencies each class needs.  This helps maintain a consistent flow through the software during the entire request.

For an example of this, create a new HTTP controller with the command:

> `./levis create http-controller animal-viewer --route animals`

This will generate a new PHP class at ~/src/HttpControllers/AnimalViewer.php, and if you look at the ~/config/routes.yml file you will notice a new route with the line `animals: AnimalViewer`.  This means any HTTP request sent to http://localhost/animals/anything will be processed by the new HTTP controller.

For example sake, create a new blank file at ~/src/Zoo.php with the following contents:

~~~php
<?php
declare(strict_types = 1);

namespace App;

use Levis\Svc\Convert;

/**
 * Zoo class
 */
class Zoo
{

    #[Inject(Convert::class)]
    private Convert $convert;

    /**
     * Get animal name
     */
    public function getName(string $name):string
    {
        $name = $this->convert->case($name, 'phrase');
        return $name;
    }

}
~~~

The above method simply takes any string, and converts it into a titlecase phrase with spaces.  However, take note of the attribute based injection being used.  It is recommended you always inject all dependencies of a class either via attribute injection such as above, or constructor injection instead of using the `new` keyword.

Next, open the new HTTP controller at ~/src/HttpControllers/AnimalViewer.php and change its contents to:

~~~php
<?php
declare(strict_types = 1);

namespace App\HttpControllers;

use Levis\Svc\View;
use App\Zoo;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};

/**
 * Http Controller - AnimalViewer
 */
class AnimalViewer implements MiddlewareInterface
{

    #[Inject(View::class)]
    private View $view;

    #[Inject(Zoo::class)]
    private Zoo $zoo;

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        $path = preg_replace("/^\/animals\//", "", $app->getPath());
        $name = $this->zoo->getName($path);

        echo "Name: $name";
        exit;
    }

}
~~~

The following changes were made to the default class that was generated:

* Added a `use App\Zoo` declaration at the top.
* Added the `#[Inject(Zoo::class)]` attribute injection just below the class declaration.
* Modified the `process()` method to display the path after `/animals/` in titlecase with spaces.

Visit for example http://localhost/animals/dogs_are_awesome, and it will work as expected by outputting to the browser "Name: Dogs Are Awesome".  Very simple, but the above was to demonstrate the basic flow of Apex with its use of attribute / constructor injection.  Here's what happened during the request:

* Request was received and due to the `/animals/` in the path was routed to the `AnimalViewer` HTTP controller.
* When the `AnimalViewer` HTTP controller was loaded, the `App\Demo\Zoo` class was injected into the `$zoo` property via attribute injection.
* Upon the `Zoo` class being instantiated, the `Apex\Svc\Convert` class was injected into its `$convert` property via attribute injection.

The above is simply meant as an example of the basic flow of Levis via attribute / constructor injection.  For more details regarding HTTP controllers and how to handle HTTP requests, please see the [HTTP Requests](/docs/http/) section of this documentation or the [Quick Start - HTTP Request Handling](/guides/http_requests) page.


## Constructor Injection

Alternatively, you may also use constructor based injection.  For example, the above HTTP controller could be changed to:

~~~php
<?php
declare(strict_types = 1);

namespace App\HttpControllers;

use Levis\Svc\View;
use App\Zoo;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};

/**
 * Http Controller - AnimalViewer
 */
class AnimalViewer implements MiddlewareInterface
{

    /**
     * Constructor
     */
    public function __construct(
        private View $view,
        private Zoo $zoo
    ) { 

    }

    /**
     * Process request
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {

        $path = preg_replace("/^\/animals\//", "", $app->getPath());
        $name = $this->zoo->getName($path);

        echo "Name: $name";
        exit;
    }

}
~~~

There is no difference between the two methods, they both work exactly the same, and it's just a matter of personal preference.


## Instantiate Objects via `make` Method

Sometimes you are unable to use attribute / constructor injection as you don't have the necessary constructor parameters upon instantiation.  In these instances, you should always use the container's `make()` method instead of the `new()` keyword.

For an example of this, open a new file at /src/AnimalModel.php and enter the following contents:

~~~php
<?php
declare(strict_types = 1);

namespace App;

/**
 * Animal Model
 */
class AnimalModel
{

    /**
     * Constructor
     */
    public function __construct(
        public string $name
    ) {

    }

}
~~~

Just a very simple class that requires a `$name` parameter upon instantiation.  Now open the file at ~/src/Demo/Zoo.php and change its contents to:

~~~php
<?php
declare(strict_types = 1);

namespace App;

use Levis\Svc\{Convert, Container};
use App\AnimalModel;

/**
 * Zoo class
 */
class Zoo
{

    #[Inject(Convert::class)]
    private Convert $convert;

    #[Inject(Container::class)]
    private Container $cntr;

    /**
     * Get animal name
     */
    public function getName(string $name):AnimalModel
    {
        $name = $this->convert->case($name, 'phrase');

        $model = $this->cntr->make(AnimalModel::class, [
            'name' => $name
        ]);

        return $model;
    }

}
~~~

In the above class, the container has also now been injected, and it's `make()` method is called to create a new instance of the `AnimalModel` class which is then returned.  The above is an example of how to properly instantiate objects that can't be injected via attribute / constructor injection.


## Services Container

There are various PSR compliant and other items available within the services container in the `Levis\Svc\` namespace for easy attribute / constructor injection to aide in your development.  For full details on all items available, please visit the [Services Container](services.md) page of the documentation.


