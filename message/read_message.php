<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once "../config/database.php";
include_once "../message/message.php";

$database= new Database();
$db = $database->ConnectionDB();

$sms = new Message($db);
$stmt = $sms->readMessage();
$num = $stmt->rowCount();

if($num>0){

    $message_array=array();
    $message_array["mensajes"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $message_item = array(
            "id_message" => $id_message,
            "name_user" => $name_user,
            "message" => $message
        );

        array_push($message_array["mensajes"],$message_item);
    }
    echo json_encode($message_array);
}else{
    echo json_encode(array("message" => "No existe mensajes."));
}