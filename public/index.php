<?php

require_once ('../src/Database.php');
require_once ('../src/ApiController.php');
require_once ('../src/Slot.php');

$config = require_once ('../config/config.php');
$conn = Database::getInstance($config)->getConnection();

$apiController = new ApiController($conn);
$apiController->handleRequest();
