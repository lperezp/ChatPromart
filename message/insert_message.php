<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../message/message.php';

$database = new Database();
$db = $database->ConnectionDB();

$sms = new Message($db);

$data = json_decode(file_get_contents("php://input"));

$sms->id_user= $data->id_user;
$sms->message =$data->mensaje;
$sms->date_message = $data->date;

if($sms->insertMessage()){
    echo '{' ;
        echo '"message": "Mensaje enviado."';
    echo '}' ;
}else{
    echo '{' ;
    echo '"message": "Mensaje no enviado."';
    echo '}' ;
}

/**
 * Created by PhpStorm.
 * User: luiseduardo
 * Date: 07/10/18
 * Time: 10:12 PM
 */