
# Additional Methods

Below details some additional methods available within the `Levis/Svc/View` class that may be useful during development.  You may view a list of all methods available within the class at the <a href="/docs/classes/svc/view/">Function Reference: Apex\Svc\View</a> section.


## Set Template File

During execution, you may set / change the template file that will be rendered at anytime with the [View::setTemplateFile()](/docs/classes/svc/view/settemplatefile) method.  For example, you may need to force an unauthorized or account verification required template to be rendered instead of the requested template.

This method accepts two parameters:

Variable | Required | Type | Description
------------- |------------- |------------- |------------- 
`$template_file` | Yes | string | The template file to render once the `View::render()` method is called.
`$is_locked` | No | bool | Defaults to false, but if set to true, the template file will be locked and future calls to the method will leave the template file unchanged.

For example, within the PHP class for the /search view:

~~~php
<?php
declare(strict_types=1);

namespace Views;

use Levis\Svc\{View, App};

class search
{

    /**
     * Render
     */
    public function render(View $view, App $app):void
    {

        // Check if allowed to search...
        $can_search = false;

        // Set account upgrade required template
        if ($can_search !== true) { 
            $view->setTemplateFile('upgrade_account', true);
        }
    }
}
~~~

With the above code in place, instead of rendering the /search.html template, Syrus will render the /upgrade_account.html template.

**NOTE:** You may retrieve the current view that will be displayed via the [View::getTemplateFile()](../../classes/svc/view/gettemplatefile) method.


## Render Block of HTML

Instead of rendering full template pages, you may render blocks of HTML code using the [View::renderBlock()](../../classes/svc/view/renderblock) method, for example:

~~~php
$html = 'large block of html code';

// Add necessary variables / blocks
$view->assign('', $variables);

// Render HTML
$html = $view->renderBlock($html);
~~~

Please note, when rendering blocks of HTML code, it will not dispatch the optional RPC call, execute a per-view PHP class, or apply any theme / layout.



