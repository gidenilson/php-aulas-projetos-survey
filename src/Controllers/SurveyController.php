<?php
namespace App\Controllers;

use App\Models\Option;
use App\Models\Survey;
use Illuminate\Database\Capsule\Manager as DB;
use App\Validators\Validator;

class SurveyController
{


    public function index()
    {
        $surveys = Survey::all();
        header('Content-Type: application/json');
        echo json_encode($surveys);
    }

    public function store()
    {


        $survey = new Survey();
        $survey->title = $_REQUEST['title'];
        $survey->description = $_REQUEST['description'];
        $survey->multiple = $_REQUEST['multiple'];
        $survey->save();

        $this->updateOptions($survey, $_REQUEST['option']);

        $survey->save();
        $survey->refresh();

        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    public function get($id)
    {
        $survey = Survey::find($id);
        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    public function update($id)
    {
        $survey = Survey::find($id);

        $this->updateOptions($survey, $_REQUEST['option']);

        foreach ($_REQUEST as $field => $value) {
            if(isset($survey->$field)){
                $survey->$field = $value;
            }            
        }

        $survey->save();
        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    public function delete($id)
    {
        $survey = Survey::find($id);
        if ($survey) {
            $survey->delete();
        }

        header('Content-Type: application/json');
        echo json_encode($survey);
    }

    private function updateOptions($survey, $options)
    {
        DB::table('options')->where('survey_id', $survey->id)->delete();
        
        foreach ($options as $text) {
            $option = new Option();
            $option->text = $text;
            $survey->options()->save($option);
        }
    }
}
