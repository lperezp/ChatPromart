<?php

class Message{

    private $vcon;

    public $id_user;
    public $message;
    public $date_message;

    public function __construct($db){
        $this->vcon=$db;
    }

    function readMessage()
    {
        $sql = "select m.id_message,u.name_user, m.message from message m inner join user u on m.id_user = u.id_user;";
        $stmt = $this->vcon->query($sql);
        return $stmt;
    }

    function insertMessage(){
        $sql = "insert into message('id_user','message','date') set id_user=:id_user,message=:message,date_message=:date_message";
        $this->id_user=htmlspecialchars(strip_tags($this->id_user));
        $this->message=htmlspecialchars(strip_tags($this->message));
        $this->date_message=htmlspecialchars(strip_tags($this->date_message));

        $stmt = $this->vcon->query($sql);
        $stmt->bindParam(":id_user",$this->id_user);
        $stmt->bindParam(":message",$this->message);
        $stmt->bindParam(":date_message",$this->date_message);

        if($stmt){
            return true;
        }
        return false;
    }

     function insert(){
  if(isset($_POST["fullname"]))
  {
   $form_data = array(
    ':name_user'  => $_POST["fullname"],
    ':mail'  => $_POST["mail"]
   );
   $query = "
   INSERT INTO user 
   (name_user, mail) VALUES 
   (:name_user, :mail)
   ";
   $statement = $this->vcon->prepare($query);
   if($statement->execute($form_data))
   {
    $data[] = array(
     'success' => '1'
    );
   }
   else
   {
    $data[] = array(
     'success' => '0'
    );
   }
  }
  else
  {
   $data[] = array(
    'success' => '0'
   );
  }
  return $data;
 }
}

