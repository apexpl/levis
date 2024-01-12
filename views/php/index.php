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
    public function render(View $view, App $app, Logger $logger, HttpClient $http):void
    {
        //$db->query("CREATE TABLE test (id INT NOT NULL, name VARCHAR(100) NOT NULL)");
        $tables = $this->db->getTableNames();
        //print_r($tables); exit;
    }

}

