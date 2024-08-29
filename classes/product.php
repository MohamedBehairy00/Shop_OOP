<?php 

class product {
    private $connection ;

    public function __construct($dbname){
        $this->connection = mysqli_connect("localhost" , "root" , "" , "$dbname") ;
    }

    public function SelectAll($colums,$table){
        $query = "Select $colums From $table" ;
        $runQuery = mysqli_query($this->connection , $query) ;
        if (mysqli_num_rows($runQuery) > 0 ) {
          return  $result = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        }else {
            return false ;
        }
    }


    public function SelectOne($colum , $table , $id){
        $query = "Select $colum from $table where id=$id";
        $runQuery = mysqli_query($this->connection , $query) ;
        if (mysqli_num_rows($runQuery) == 1) {
            return  $result = mysqli_fetch_assoc($runQuery);
        }else{
            return false ;

        }
    }

  
}