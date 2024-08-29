<?php 

namespace Work\Shop_OOP\classes ;
use Work\Shop_OOP\classes\validator;
require_once 'Validator.php' ;

class Required implements validator {
    public function check($value,$key){
        if (empty($value)) {
            return "$key is Required" ;
        }else{
            return false; 
        }
    }
}