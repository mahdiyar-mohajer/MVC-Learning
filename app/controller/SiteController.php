<?php

namespace MvcLearning\app\controller;

use MvcLearning\app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

}