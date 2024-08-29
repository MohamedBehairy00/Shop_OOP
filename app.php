<?php 

require_once 'inc/connection.php';
require_once 'classes/product.php' ;
require_once 'classes/Session.php' ;
require_once 'classes/Request.php' ;
require_once 'classes/validation.php' ;
require_once 'classes/imageValidation.php' ;

use Work\Shop_OOP\classes\ImageValidation;
use Work\Shop_OOP\classes\Request;
use Work\Shop_OOP\classes\Session;
use Work\Shop_OOP\classes\Validation;





$session = new Session ;
$request = new Request ;
$products = new product('shop_online_oop');
$validation = new Validation ;
$imageValidator = new ImageValidation();




