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

    public function __construct($rootPath, array $config)
   {
       self::$root_DIR = $rootPath;
       $this->request = new Request();
       $this->response = new Responce();
       $this->session = new Session();

       self::$app = $this;
       $this->router=new Router($this->request, $this->response);
       $this->db = new Database($config['db']);
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

}