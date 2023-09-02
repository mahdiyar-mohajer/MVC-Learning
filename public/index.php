<?php
require_once "../vendor/autoload.php";

use MvcLearning\app\controller\AuthController;
use MvcLearning\app\controller\SiteController;
use MvcLearning\app\core\Application;

$app = Application::getInstance();

$app::getInstance()->getRouter()->get('/', [SiteController::class,'home']);
$app::getInstance()->getRouter()->get('/register', [AuthController::class,'register']);
$app::getInstance()->getRouter()->get('/login', [AuthController::class,'login']);

$app::getInstance()->run();