<?php

namespace App\Controllers;

use App\Models\Survey;

class SurveyController
{

    public function index()
    {
        $surveys = Survey::all();
        header('Content-Type: application/json');
         echo json_encode($surveys);
    }
    public function storage(){
        $survey = new Survey;
        $survey->title = $_REQUEST['title'];
        $survey->description = $_REQUEST['description'];
        $survey->multiple = $_REQUEST['multiple'];
        $survey->save();

        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    public function get($id){
        $survey = Survey::find($id);
        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    public function update($id){
        $survey = Survey::find($id);

        foreach($_REQUEST as $field=>$value){
            $survey->$field = $value;
        }

        $survey->save();
        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    public function delete($id){
        $survey = Survey::find($id);
        if($survey) {
            $survey->delete();
        }


        header('Content-Type: application/json');
        echo json_encode($survey);

    }

}
