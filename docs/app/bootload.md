
# App - Bootload from Outside Script

At times you may wish to load the App class from within an outside script (eg. test.php).  This is extremly simple, and a quick example can be found below that bootloads Levis and obtains the Db class.

~~~php
<?php

use Levis\App\App;
use Levis\Svc\{Db;

// Autoload
require_once('./vendor/autoload.php');

// Load app
$app = new App();
$cntr = $app->getContainer();

// Get Db class
$db = $cntr->get(Db::class);

// Levis is loaded, do anything you wish.
~~~


