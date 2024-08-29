<?php 

namespace Work\Shop_OOP\classes ;
class Session {

    // start
    public function __construct(){
        session_start();
    }
    
    // set 
    public function set($key , $value){
        return  $_SESSION[$key] = $value   ;
    }


    // get 

    public function get($key ){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null ;
    }


    // unset

    public function remove($key){
        unset($_SESSION[$key]) ;
    }


    // destroy

    public function destroy(){
        session_destroy();
    }
}