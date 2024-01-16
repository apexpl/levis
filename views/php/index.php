<?php
declare(strict_types=1);

namespace Views;

use Levis\Svc\{App, View, Db, Logger, HttpClient};


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
    public function render(View $view, App $app, Logger $logger, HttpClient $http, Db $db):void
    {
        $db->executeSqlFile(SITE_PATH . '/test.sql');
        echo "Done"; exit;
    }

}



