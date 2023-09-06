<?php

namespace MvcLearning\app\controller;

use Illuminate\Database\Capsule\Manager as Capsule;
use MvcLearning\public\core\Application;
use MvcLearning\public\core\Controller;

class DoctorProfileController extends Controller
{
    private static Capsule $capsule;

    public static function boot(): void
    {
        $config = [
            'connections' => [
                'mysql' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'database' => 'mahdiyar_care',
                    'username' => 'root',
                    'password' => 'Mahdiyar1'
                ]
            ]
        ];

        $capsule = new Capsule;
        $capsule->addConnection($config['connections']['mysql']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        self::$capsule = $capsule;
    }

    public static function checkProfile($id): bool
    {
        self::boot();
        $result = self::$capsule->table('doctors')->select()->where('id', '=', $id)->get();
        return empty($result);
    }

    public function findId($email)
    {
        self::boot();
        return self::$capsule->table('doctors')->select('id')->where('email', '=', $email)->get()[0]->id ?? null;
    }

    public function checkExpertise($id)
    {
        self::boot();
        return self::$capsule->table('doctors')->select('expertise')->where('id', '=', $id)->get() ?? null;
    }

    public function checkName($id)
    {
        self::boot();
        return self::$capsule->table('doctors')->select('name')->where('id', '=', $id)->get() ?? null;
    }

    public function checkCellPhone($id)
    {
        self::boot();
        return self::$capsule->table('doctors')->select('cell_phone')->where('id', '=', $id)->get() ?? null;
    }

    public function checkAddress($id)
    {
        self::boot();
        return self::$capsule->table('doctors')->select('address')->where('id', '=', $id)->get() ?? null;
    }

    public function show()
    {
        $this->setLayout('auth');
        return $this->render('doctorProfile');
    }

    public function save()
    {
//        if (Application::getInstance()->getRequest()->isPost()) {
//            self::boot();
//            $id = $this->findId($_SESSION['user_name']);
//                self::$capsule->table('doctors')->where('id', '=', $id)->update(['address' => $_POST['address'], 'name' => $_POST['name'], 'cell_phone' => $_POST['phone'], 'expertise' => $_POST['expertise']]) ?? null;
//            $days = self::$capsule->table('days')->select()->where('doctor_id', '=', $id)->get();
//            foreach ($_POST['type'] as $day) {
//                if (!in_array($day, (array)$days['day'])) {
//                        self::$capsule->table('days')->insert(['doctor_id' => $id, 'day' => $day]) ?? null;
//                }
//            }
//            $this->setLayout('auth');
//            return $this->render('doctorProfile');
//        }

        if (Application::getInstance()->getRequest()->isPost()) {
            self::boot();
            $id = $this->findId($_SESSION['user_name']);

            $existingDays = self::$capsule->table('days')->where('doctor_id', '=', $id)->pluck('day')->toArray();
            foreach ($_POST['type'] as $day) {
                if (!in_array($day, $existingDays)) {
                        self::$capsule->table('days')->insert(['doctor_id' => $id, 'day' => $day]) ?? null;
                }
            }
                self::$capsule->table('doctors')->where('id', '=', $id)->update([
                    'address' => $_POST['address'],
                    'name' => $_POST['name'],
                    'cell_phone' => $_POST['phone'],
                    'expertise' => $_POST['expertise']
                ]) ?? null;

            $this->setLayout('auth');
            return $this->render('doctorProfile');
        }


    }
}