<?php
session_start();
$url ="http://localhost/demo_rest/message/insert_message.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/demo_rest/message/read_message.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);
$res = file_get_contents("http://localhost/demo_rest/message/read_message.php");
$data = json_decode( file_get_contents("http://localhost/demo_rest/message/read_message.php"));
$data = (array) $data;

$name_user = $_SESSION['fullname'];

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Chat - Naranjito</title>
</head>
<body>
<h2>Chat en linea</h2>
<div class="row m-0 justify-content-md-center">
    <div class="col-8 border">
        <?php foreach ($data["mensajes"] as $sms => $value) {
                $value = (array)$value;
                echo '<b>' .$value["name_user"] . ': </b>' . $value["message"] . '<br>';
            };?></p>
    </div>
    <div class="col-2 border">
        <p>Usuarios Conectados:</p>
    </div>
    <form method="post" class="col-10" action="main.php">
        <textarea name="mensaje" class="form-control" placeholder="Escribe tu mensaje aquí"></textarea>
        <div class="col-10 m-4">
        <div class="float-left">
            <p>Bievenid@: <?php echo "<b>" . $_SESSION['fullname']. "</b>"?></p>
        </div>
        <div class="float-right">
            <button class="btn btn-danger">Salir</button>
            <button class="btn btn-success">Enviar</button>
        </div>
    </form>
    </div>
</div>
</body>
</html>
