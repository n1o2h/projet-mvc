<?php
namespace App\controllers;

use App\core\Application;
use App\core\Controler;
use App\core\Request;

class SiteController extends  Controler
{
    public  function handelContact(Request $request)
    {
         $body = $request->getBody();
         echo "<pre>";
         var_dump($body);
         echo '</pre>';

         return "ddd";
    }
    public  function home()
    {
        $params = [
            'name' => "NohailaAitHammad"
        ];
        return $this->render('home', $params);

    }
    public  function front()
    {
        $params = [
            'name' => "NohailaAitHammad"
        ];
        return $this->render('admin', $params);

    }

}
