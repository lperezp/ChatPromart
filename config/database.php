<?php

class Database{

  private $db_user = "root";
  private $db_pwd = "";
  public $vcon = "";
  
  public function ConnectionDB(){
     $this->vcon = "";
      
      try{
          $this->vcon = new PDO("mysql:host=localhost;dbname=chat", $this->db_user, $this->db_pwd);
          $this->vcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }
      return $this->vcon;

    }

}
/*
$obj = new Database();
$r= $obj->ConnectionDB();
print_r($r);
//Si imprime un obj esta ok
*/