<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controler;
use App\core\Request;
use App\core\Responce;
use App\models\LoginForm;
use App\models\User;

class AuthController extends  Controler
{

    public function login(Request $request, Responce $responce)
    {
        $loginForm = new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $user = Application::$app->user;
                if ($user->role == 1) {
                    $responce->redirect('/admin/dashboard');
                } else {
                    $responce->redirect('/user/dashboard');
                }
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }
    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', "Thanks for registering");
                Application::$app->response->redirect('/login');
            }

            $this->setLayout('auth');
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);

    }

    public function logout(Request$request, Responce $responce)
    {
        Application::$app->logout();
        $responce->redirect('/');

    }

    public function profile()
    {
        return $this->render('profile',[]);

    }


}