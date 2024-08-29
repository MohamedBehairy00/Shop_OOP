<?php 


namespace Work\Shop_OOP\classes ;
use Work\Shop_OOP\classes\validator;
require_once 'Validator.php' ;

class numric implements validator {
    public function check($value,$key){
        if (! is_numeric($value)) {
            return "$key is Must Be Number" ;
        }else{
            return false; 
        }
    }
}