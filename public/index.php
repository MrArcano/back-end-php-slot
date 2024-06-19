<?php

require_once ('../src/Database.php');
require_once ('../src/ApiController.php');
require_once ('../src/Slot.php');

$config = require_once ('../config/config.php');
$db = Database::getInstance($config);

$apiController = new ApiController($db);
$apiController->handleRequest($config);
