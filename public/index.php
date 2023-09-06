<?php

session_start();

require_once "../vendor/autoload.php";

use MvcLearning\app\controller\AuthController;
use MvcLearning\app\controller\DoctorProfileController;
use MvcLearning\app\controller\ManagerProfileController;
use MvcLearning\app\controller\SiteController;
use MvcLearning\public\core\Application;

$app = Application::getInstance();



$app::getInstance()->getRouter()->post('/register', [AuthController::class,'register']);
$app::getInstance()->getRouter()->post('/login', [AuthController::class,'login']);
$app::getInstance()->getRouter()->post('/home', [AuthController::class,'logout']);
$app::getInstance()->getRouter()->post('/', [AuthController::class,'logout']);
//$app::getInstance()->getRouter()->post('/login', [AuthController::class,'doctorProfile']);
//$app::getInstance()->getRouter()->post('/login', [AuthController::class,'logout']);

$app::getInstance()->getRouter()->get('/', [SiteController::class,'home']);
$app::getInstance()->getRouter()->get('/register', [AuthController::class,'register']);
$app::getInstance()->getRouter()->get('/login', [AuthController::class,'login']);

$app::getInstance()->getRouter()->get('/', [SiteController::class,'home']);
$app::getInstance()->getRouter()->get('/register', [AuthController::class,'register']);
$app::getInstance()->getRouter()->get('/doctorProfile', [DoctorProfileController::class,'show']);

$app::getInstance()->getRouter()->get('/waitingDoctorsList', [ManagerProfileController::class,'showDoctors']);
$app::getInstance()->getRouter()->get('/waitingManagersList', [ManagerProfileController::class,'showManagers']);

$app::getInstance()->getRouter()->post('/doctorProfile', [DoctorProfileController::class,'save']);


$app::getInstance()->run();