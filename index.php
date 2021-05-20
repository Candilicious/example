<?php
/*error display*/
/*error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');*/
require __DIR__ . "/vendor/autoload.php";
require_once 'controllers/Controller.php'; //родитель для всех контроллеров
require_once 'models/Model.php'; //родитель для всех моделей
require "controllers/FormController.php"; //работа с формой

/*Инициализация phpdotenv*/
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$Form=new Form_processing();