<?php
    include_once "./config/database.php";
    include_once "./user/user.php";
    session_start();
if (isset($_POST['user_name'])){
    $_SESSION['user_name'] = $_POST['user_name']; //Nickname Grabado
    $_SESSION['mail'] = $_POST['mail']; //Mail Grabado
}

    $database= new Database();
    $db = $database->ConnectionDB();

    $user = new User($db);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Chat - Naranjito</title>
</head>
<body class="container">
    <form method="post" action="index.php">
        <h2>Ingresa a nuestro Chat</h2>
        <div class="form-group">
            <input type="text" name="user_name" placeholder="Nombre completo" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="name" name="mail" placeholder="Correo electrónico" class="form-control" required>
        </div>
            <button class="btn btn-primary" type="submit">Entrar</button>
    </form>
</body>
</html>