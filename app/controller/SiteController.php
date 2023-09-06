<?php

namespace MvcLearning\app\controller;

use MvcLearning\public\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }
    public function doctorProfile()
    {
        $this->setLayout('auth');
        return $this->render('doctorProfile');
    }
}