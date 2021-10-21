<?php

namespace App\Controllers;

use App\Models\Option;
use App\Models\Survey;

class SurveyController
{

    public function index()
    {
        $surveys = Survey::all();
        header('Content-Type: application/json');
         echo json_encode($surveys);
    }
    public function store(){
        $survey = new Survey;
        $survey->title = $_REQUEST['title'];
        $survey->description = $_REQUEST['description'];
        $survey->multiple = $_REQUEST['multiple'];
        $survey->save();
        
        foreach($_REQUEST['option'] as $text){
            $option = new Option;
            $option->text = $text;
            $survey->options()->save($option);
        }

        $survey->save();
        $survey->refresh();

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
