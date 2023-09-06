<?php

namespace MvcLearning\app\controller;

use MvcLearning\public\core\Application;
use MvcLearning\public\core\Controller;
use PDO;

class AuthController extends Controller
{
    public function login()
    {
        if (Application::getInstance()->getRequest()->isPost()) {

            $email = Application::getInstance()->getRequest()->getBody()['email'] ?? "";
            $password = Application::getInstance()->getRequest()->getBody()['password'] ?? "";
            $role = Application::getInstance()->getRequest()->getBody()['role'] ?? "";

            $conn = new PDO("mysql:host=localhost;dbname=mahdiyar_care", 'root', 'Mahdiyar1');
            if ($role == 'Doctor') {
                $query = "SELECT * FROM doctors WHERE email = :email AND password = :password";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":email", $email);
                $prepare->bindParam(":password", $password);
                $prepare->execute();
                $_SESSION['user_name'] = $email;
                return $this->render('home');
            }
            if ($role == 'Patient') {
                $query = "SELECT FROM * pationts WHERE email = :email AND password = :password";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":email", $email);
                $prepare->bindParam(":password", $password);
                $prepare->execute();
                $_SESSION['user_name'] = $email;
                return $this->render('home');
            }
            if ($role == 'Manager') {
                $query = "SELECT * FROM managers WHERE email = :email AND password = :password";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":email", $email);
                $prepare->bindParam(":password", $password);
                $prepare->execute();
                $_SESSION['user_name'] = $email;
                return $this->render('home');
            }
        }
        $this->setLayout('auth');
        return $this->render('login');

    }

    public function doctorProfile()
    {
        $this->setLayout('auth');
        return $this->render('doctorProfile');
    }

    public
    function register()
    {
        if (Application::getInstance()->getRequest()->isPost()) {

            $email = Application::getInstance()->getRequest()->getBody()['email'] ?? "";
            $password = Application::getInstance()->getRequest()->getBody()['password'] ?? "";
            $confirmPassword = Application::getInstance()->getRequest()->getBody()['confirm-password'] ?? "";
            $role = Application::getInstance()->getRequest()->getBody()['role'] ?? "";

            $conn = new PDO("mysql:host=localhost;dbname=mahdiyar_care", 'root', 'Mahdiyar1');

            $dataToValidate = ['email' => $email, 'password' => $password, 'role' => $role];

            $rules = [
                'email' => ['required', 'string', 'min:4'],
                'password' => 'required|string|min:3|max:40',
                'role' => 'required'
            ];

            $messages = [
                'required' => 'The :attribute field is required.',
                'min' => 'the min length is :min',
                'max' => 'the max length is :max'
            ];

            $validator = getValidator($dataToValidate, $rules, $messages);


            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach ($errors->all() as $message) {
                    var_dump($message);
                }
            }
            if ($role == 'Doctor') {
                $query = "INSERT INTO doctors (email, password) values (:email, :password)";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":email", $email);
                $prepare->bindParam(":password", $password);
                $prepare->execute();
            }
            if ($role == 'Patient') {
                $query = "INSERT INTO pationts (email, password) values (:email, :password)";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":email", $email);
                $prepare->bindParam(":password", $password);
                $prepare->execute();
            }
            if ($role == 'Manager') {
                $query = "INSERT INTO managers (email, password) values (:email, :password)";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":email", $email);
                $prepare->bindParam(":password", $password);
                $prepare->execute();
            }
        }
        $this->setLayout('auth');
        return $this->render('register');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        return $this->render('home');
    }
}