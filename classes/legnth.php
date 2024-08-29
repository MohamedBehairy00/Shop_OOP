<?php 


namespace Work\Shop_OOP\classes ;
use Work\Shop_OOP\classes\validator;
require_once 'Validator.php' ;


class legnth implements validator {
    public function check($value,$key){
        if (strlen($value) < 11) {
            return "$key must be legnth more than 11" ;
        }else{
            return false; 
        }
    }
}