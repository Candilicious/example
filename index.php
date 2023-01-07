<?php
/*error display*/
/*error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');*/
require __DIR__ . "/vendor/autoload.php";
require_once 'controllers/Controller.php'; 
require_once 'models/Model.php'; 
require "controllers/FormController.php"; 

/*Инициализация phpdotenv*/
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$Form=new Form_processing();