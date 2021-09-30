<?php
namespace Site\src\constraint;

class Validation
{
    public function validate($data, $name)
    {
        if($name === 'Personnel'){
            $personnelValidation = new PersonnelValidation();
            $errors = $personnelValidation->check($data);
            return $errors;
        }
    }
}