
# /config/container.php File

The /config/container.php file contains all items and services that the dependency injection container is initiated with every request.  With installation this file only contains one item for the PSR-18 compliant HTTP Client which defaults to the popular Guzzle package.  This is meant to provide an example service, plus allow you to change the HTTP client if desired.

For instances where you need an item / service to instantiate a class with defined constructor parameters, you may use a two element array, for example:

~~~php
return [
    MyInterface::class = [
        Vendor\Package\Controllers\SomeController::class, 
        ['param1' => 'value1', 'param2' => 'value2']
    ],

    'services' => [
        MyInterface::class
    ]
]
~~~


## 'services' Array

The container.php file also contains a 'services' array, which is a one-dimensional list of all item names that should be marked as services.  This means  class will only be instantiated once, and each time it is retrieved from the container you will always get the same instance essentially making it the equivalent of a singleton.


## Constructor Parameters

When the `MyInterface::class` item is retrived from the container either via the `get()` or `make()` methods, it will instantiate the `SomeController` object with additional parameters used within the constructor.  Since it has also been marked as a service, each subsequent time the item is retrived from the computer it will be the same instance.


