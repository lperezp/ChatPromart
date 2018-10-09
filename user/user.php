<?php

class User{

    private $vcon;
    public $tbl_db = 'user';
    public $name_user = '';
    public $mail = '';
    public function __construct($db){
        $this->vcon=$db;
    }

    function readUser()
    {
        $sql = "select id_user, name_user, mail from user;";
        $stmt = $this->vcon->query($sql);
        return $stmt;
    }

    public function save($user_name,$mail){

        $sql ='INSERT INTO ' . $this->tbl_db .'(name_user,mail) VALUES (' . $user_name . ',' .$mail .')';
        $stmt= $this->vcon->query($sql);
        return $stmt;
    }
}

