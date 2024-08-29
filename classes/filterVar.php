<?php 


namespace Work\Shop_OOP\classes ;
use Work\Shop_OOP\classes\validator;
require_once 'Validator.php' ;


class filterVar implements validator {
    public function check($value,$key){
        if (! filter_var($value,FILTER_VALIDATE_EMAIL)) {
            return "$key is not correct" ;
        }else{
            return false; 
        }
    }
}