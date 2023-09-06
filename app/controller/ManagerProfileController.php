<?php

namespace MvcLearning\app\controller;

use MvcLearning\public\core\Controller;

class ManagerProfileController extends Controller
{
    public function showDoctors()
    {
        $this->setLayout('auth');
        return $this->render('waitingDoctorsList');
    }
    public function showManagers()
    {
        $this->setLayout('auth');
        return $this->render('waitingManagersList');
    }
}