<?php
$pdo = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

if(isset($_POST['login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = $pdo -> query("SELECT id_identification FROM identification WHERE mail='$login' AND password='$password' ");
    echo "nombre de resultats :".$result -> rowCount();
    $v=$result ->rowCount();
    $x = $result ->fetch();
    $id_identification = $x['id_identification'];
    if($v == 1){
        header('Location:article.php?id_identification='.$id_identification);
        exit;
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page de connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>

</head>
<body>
<h1>formulaire de connexion</h1>
    <FORM method="POST" action="index.php">
    <input type="text" name="login" placeholder="Entrer votre Email"><br>
    <input type="text" name="password" placeholder="Mot de passe"><br>
    <input type="submit">
    </FORM>
</body>
</html>