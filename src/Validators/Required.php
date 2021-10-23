<?php
namespace App\Validators;

class Required
{

    static public function validate(mixed $data, string $modificator = ""): bool
    {
        if ($data == 0 && $modificator == "zero") {
            return true;
        }
        return $data != false;
    }

    static public function message(string $field): array
    {
        return [
            "field" => $field,
            "message" => "obrigatório"
        ];
    }
}