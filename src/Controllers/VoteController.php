<?php
namespace App\Controllers;

use App\Models\Survey;
use App\Models\Vote;
use App\Validators\Validator;

class VoteController
{
    private $validator;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function vote()
    {
        
        //validar campos
        $valid = $this->validator->validate($_REQUEST, [
            'option_id' => 'required',
            'email' => 'required'
        ]);
        

        foreach($_REQUEST['option_id'] as $option) {
            $vote = Vote::create(['option_id' => $option, 'email' => $_REQUEST['email']]);
            $vote->save();
        }
        
        header('Content-Type: application/json');
        echo json_encode($_REQUEST);
    }
}