
# Variables, Blocks and Callouts

All methods to personalize templates are available within the `Levis\Svc\View` class, and are explained below.


## Variables

Scalar variables and arrays can be assigned via the [View::assign()](..classes/svc/view/assign.md) method, for example:

~~~php
public function get(View $view, App $app):void
{

    // Assign scalar
    $view->assign('username', 'jsmith', 
    $view->assign('email', 'jsmith@domain.com');

    // Assign array
    $vars = [
        'city' => 'Toronto', 
        'province' => 'Ontario', 
        'country' => 'Canada'
    ];
    $view->assign('location', $vars);
}
~~~

Within the .html files, the above variables can be represented with for example:

~~~php
Hello ~username~ with e-mail ~email~

Your location is ~location.city~, ~location.province~, ~location.country~
~~~

As you can see, variables are represented within templates by surrounding their names with tilda ~ marks, and array elements are separated by periods.


#### Assign Array of Scalars

If desired, you may leave the first argument blank and pass an array as the second argument, and all array elements will be added as single scalars.  For example:

~~~php
function render(View $view, App $app):void
{

    $vars = [
        'username' => 'jsmith', 
        'full_name' => 'John Smith', 
        'email' => 'jsmith@domain.com'
    ];
    $view->assign('', $vars);
}
~~~

The above would allow the following variables within the templates:

~~~
Hello ~full_name~ (~username~) with e-mail ~email~
~~~


## Foreach Loops

You may add blocks which are used to loop through and populate &lt;s:foreach&gt; tags by calling the `View::addBlock()` method as necessary.  For example:

~~~php
public function render(View $view, App $app):void

    // Add blocks
    $view->addBlock('users', ['username' => 'jsmith', 'email' => 'jsmith@domain.com']);
    $view->addBlock('users', ['username' => 'mike' => 'email' => 'mike @domain.com']);
    $view->addBlock('users', ['username' => 'leanne', 'email' => 'leanne@gmail.com']);
}
~~~

The first argument is the name of the block / loop, and the second argument is an associative array of key value pairs for that iteration.  Within the .html files &lt;s:foreach&gt; tags can then be placed such as:

~~~php
&lt;s:foreach name="users" item="user"&gt;
    The user ~user.username~ has the e-mail ~user.email~
&lt;/s:foreach&gt;
~~~



## Callouts

Callouts are dynamic messages that generally appear on the top of pages contained within colored boxes to show success, error or other informational messages.  You may add callouts via the [View::addCallout()](/docs/classes/svc/view/addcallout) method, for example:

~~~php
public function post(View $view, App, $app):void

    // Success callout
    $view->addCallout('successfully performed an action.');

    // Error callout
    $view->addCallout('Uh oh, an error occured.', 'error');
}
~~~

The first argument is the contents of the message itself, and the second argument is the type of callout which defaults to "success".  The following callout types are supported:  success, error, warning, info.  The front-end designer must place the &lt;s:callouts&gt; tag somewhere within the site, usually the /includes/header.html file, which will be replaced with any callouts added during the request.


## Has Errors?

Sometimes you will want to check and see if any `error` callouts have been added during the request.  This can be done via the [View::hasErrors()](/docs/classes/svc/view/haserrors) method, which simply returns a boolean as to whether any `error` callouts have been added.  For example:

~~~php
public function post(View $view, App $app, AbcController $abc):void
{

    // Do something
    $abc->doSomething();

        // Check for errors
        if ($view->hasErrors() !== true) {
            $view->addCallout('Successfully completed the necessary action.');
    }
}
~~~




