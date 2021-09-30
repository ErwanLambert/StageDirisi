<?php 
namespace Site\src\constraint;
use Site\config\Parameter;

class PersonnelValidation extends Validation
{
    private $errors =[];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'nom'){
            $error = $this->checkNom($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'prenom') {
            $error = $this->checkPrenom($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'pseudo'){
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'password'){
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) {
        if($error){
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkNom($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('nom', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('nom', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('nom', $value, 50);
        }
    }

    private function checkPrenom($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('prénom', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('prénom', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('prénom', $value, 50);
        }
    }

    private function checkPseudo($name, $value)
    {
        if($this->constraint->notBlank('pseudo', $value)){
            return $this->constaint->notBlank('pseudo', $value);
        }
        if($this->constraint->minLength($name, $value, 2)){
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }

    private function checkPassword($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('password', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('password', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('password', $value, 255);
        }
    }
}