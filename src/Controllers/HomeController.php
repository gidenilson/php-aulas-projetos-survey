<?php

namespace App\Controllers;


class HomeController
{

    public function index()
    {

         header('Content-Type: application/json');
         echo json_encode($_REQUEST);
         
    }

    public function login($password){
        $_SESSION['authorize'] = true;
        $_SESSION['password'] = $password;
    }
}
