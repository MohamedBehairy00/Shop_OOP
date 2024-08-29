<?php 
namespace Work\Shop_OOP\classes ;
class Request {
    
    public function get($key){
        return isset($_GET[$key]) ? $_GET[$key] : null ;
    }

    public function post($key){
        return  isset($_POST[$key]) ? $_POST[$key] : null ;
    }

    public function check($data){
        return isset($data) ;
    }

    public function filtr($data){
        return trim(htmlspecialchars($data)) ;
    }

    public function checkMethod(){
        return $_SERVER['REQUEST_METHOD'] ;
    }

    public function redirect($file){
        header("location:$file");
    }
    
   public function files(){
    return $_FILES['image'] && $_FILES['image']['name'];
   }
    
}