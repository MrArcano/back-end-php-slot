<?php

require_once ('../src/Database.php');
require_once ('../src/Utility.php');
require_once ('../src/Router.php');
require_once ('../src/utilities/Cors.php');

$config = require_once ('../config/config.php');

// Gestisci il CORS
Cors::handle($config['cors']);

// Crea un'istanza del database
$db = Database::getInstance($config['db']);

Router::routeRequest($db);