<?php

namespace App\core;

class Application
{
    public Router $router;
    public static string $root_DIR;
    public Request $request;
    public static Application $app;
    public  Database $db;
    public Responce $response;
    public Controler $controller;
    public Session $session;
    public ?DBModel $user;
    public string $userClass;

    public function __construct($rootPath, array $config)
   {
       $this->userClass = $config['userClass'];
       self::$root_DIR = $rootPath;
       $this->request = new Request();
       $this->response = new Responce();
       $this->session = new Session();

       self::$app = $this;
       $this->router=new Router($this->request, $this->response);
       $this->db = new Database($config['db']);

       $primaryValue = $this->session->get('user');
       if($primaryValue){
           $primaryKey = $this->userClass::primaryKey();
           $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
       }else{
           $this->user = null;
       }
   }


   public function run()
   {
       echo $this->router->resolve();
   }

    public function getController(): Controler
    {
        return $this->controller;
    }

    public function setController(Controler $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DBModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }
    public static function isExisteUser()
    {
        return !self::$app->user;
    }

    public static function getDisplayName()
    {

    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

}