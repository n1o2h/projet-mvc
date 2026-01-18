<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controler;

class AdminController extends  Controler
{
    public function __construct()
    {
        if (!Application::$app->user || Application::$app->user->role !== 1) {
            Application::$app->response->redirect('/login');
        }
    }

    public function dashboard()
    {
        return $this->render('admin/dashboard', []);
    }


}