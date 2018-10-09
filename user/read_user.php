<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");


    include_once "../config/database.php";
    include_once "../user/user.php";

    $database= new Database();
    $db = $database->ConnectionDB();

    $user = new User($db);
    $stmt = $user->readUser();
    $num = $stmt->rowCount();

    if($num>0){

        $user_array=array();
        $user_array["usuarios"]=array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $user_item = array(
                "id_name" => $id_user,
                "user_name" => $name_user,
                "mail" => $mail
            );

            array_push($user_array["usuarios"],$user_item);
        }
        echo json_encode($user_array);
    }else{
        echo json_encode(array("message" => "No existe usuarios."));
    }