
# Services Container

The `Levis\Svc\` namespace contains various PSR compliant and other items that can be easily pulled in via attribute / constructor injection to aide in your development.

## Loading Services

Services should always be loaded via attribute or constructor injection, for example:

~~~php
<?php

namespace App;

use Levis\Svc\{Db, HttpClient, View};
use App\Models\Product;

/**
 * Demo class
 */
class MyDemoClass
{

    #[Inject(Db::class)]
    private Db $db;

    #[Inject(HttpClient::class)]
        private HttpClient $http;

    #[Inject(View::class)]
    private View $view;

    /**
     * Do something
     */
    public function doSomething():void
    {

        $value = $this->db->getField("SELECT something from some_table WHERE id = 5");

        $this->view->assign('some_var', $value);
    }

}
~~~


## Available Services

The following services are available within the `Levis\Svc` namespace:

Service | Description
------------- |------------- 
[App](../app/index.md) | The central Levis `App` class, and is also a PSR15 compliant `RequestHandlerInterface` object.
[Container](flow.md) | PSR-11 compliant dependency injection container.
[Convert](../classes/svc/convert/index.md) | Conversion utility to format dates, amounts, and more for display to the end-user.
[Db](../database/db/index.md) | The SQL database connection.
[Emailer](../communication/email.md) | Send e-mail messages
<a href="https://github.com/guzzle/guzzle" target="_blank">HttpClient</a> | PSR-18 compliant HTTP client.  Defaults to the `guzzlehttp` package with installation.
<a href="https://github.com/Seldaek/monolog" target="_blank">Logger</a> | PSR-3 compliant logger.  Defaults to the `monolog/monolog` package with installation.
[View](../views/index.md) | Syrus template engine to parse and render views.

