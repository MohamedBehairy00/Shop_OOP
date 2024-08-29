<?php 

namespace Work\Shop_OOP\classes ;

require_once 'Required.php';
require_once 'Str.php';
require_once 'numric.php';
require_once 'filterVar.php';
require_once 'legnth.php';

class Validation {
    private $errors = [] ;

    public function endValidate($value , $key , $rules){

        foreach($rules as $rule){
            $rule = "Work\Shop_OOP\classes\\" . $rule ;
            $obj = new $rule ;
            $result = $obj->check($value,$key);
            if ($result != false) {
                $this->errors[] = $result ;
            }
        }
    }


    public function getError(){
        return $this->errors ;
    }
}