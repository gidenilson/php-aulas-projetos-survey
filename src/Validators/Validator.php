<?php
namespace App\Validators;

class Validator
{

    public $message = [];

    public function validate(array $data, array $rules): bool
    {
        $result = true;
        $this->message = [];

        foreach ($rules as $field => $list) {

            $list_rules = explode("|", $list);

            foreach ($list_rules as $rule) {

                $elements = explode(':', $rule);
                $class = "App\\Validators\\" . ucfirst($elements[0]);
                $modificator = isset($elements[1]) ? $elements[1] : "";
                $data[$field] = isset($data[$field]) ? $data[$field] : "";

                if (! $class::validate($data[$field], $modificator)) {

                    $result = false;
                    $this->message[] = $class::message($field);
                }
            }
        }
        return $result;
    }
}
