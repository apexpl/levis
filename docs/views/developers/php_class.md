
# PHP Classes per View

For every view within the /html/views/ directory, there may be a corresponding .php file within the /views/php/ directory.  If the file exists, it will be executed every time the view is rendered, providing a bridge between views and the back-end application.

For example, upon viewing http://localhost/services/hosting, the view located at /views/html/services/hosting.html will be displayed.  Upon the view being rendered, any PHP file located 
at /views/php/services/hosting.php will be executed as described below.


## Methods

Upon the view being rendered, Apex will load the PHP class and initially look for a method named the same as the HTTP method of the request (eg. post(), get()).  If one exists, that method will be executed.  On top of this, the PHP class will also be checked for a `render()` method.  If one exists, it will be executed regardless of what the HTTP method of the request is.

Please note, all methods within the PHP class are optional, as is the entire PHP class itself.  If the .php file does not exist, the view will always be displayed regardless of HTTP method.

If the .php file does exist, it must contain either the `render()` method or a method named the HTTP method (eg. `get()`, `post()`, etc.).  If the .php file exists, but no `render()` or function named the HTTP method exists, a 404 Page Not Found error will be displayed.


## Dependency Injection

Aside from the standard constructor and attribute injection, all methods within the view PHP classes also support method based injection.  This means you may place any depencies desired within the method parameters, and they will be automatically injected as necessary.  For example:

~~~php
namespace Views;

use Levis\Svc\{App, View, Db};
use App\MyPackage\AbcController;

/**
 * Demo page
 */
class demo
{

    /**
     * GET HTTP method
     */
    public function get(View $view, App $app, Db $db, AbcController $abc):void
    {

    }

}
~~~

As you can see, the above `get()` method takes four parameters, all of which will be injected into as necessary.



