<?php
namespace App\Controllers;

use App\Models\Survey;

class HomeController
{

    public function index()
    {
        $surveys = Survey::all();
        header('Content-Type: application/json');
        echo json_encode($surveys);
    }
}
