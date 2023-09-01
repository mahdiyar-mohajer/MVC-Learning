<?php
require_once "../vendor/autoload.php";

use MvcLearning\app\core\Application;

$app = Application::getInstance();

$app::getInstance()->getRouter()->get('/', 'login');
$app::getInstance()->getRouter()->get('/register', 'register');
$app::getInstance()->getRouter()->get('/login', 'login');

$app::getInstance()->run();