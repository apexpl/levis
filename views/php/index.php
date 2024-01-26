<?php
declare(strict_types=1);

namespace Views;

use Levis\Svc\{App, View};


/**
 * Index
 */
class index
{

    #[Inject(Db::class)]
    private Db $db;

    /**
     * Get
     */
    public function render(View $view, App $app):void
    {

    }

}



