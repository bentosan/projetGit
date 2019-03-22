<!--considerer html au dessus de la balise php-->
<?php
    //MySQLi 

  /*  $mysqli = new Mysqli('localhost','root','','entreprise');
        //connection a la base : adresse , nom d'utilisateur,mdp,nom de la base
    $resultat = $mysqli -> query("SELECT * FROM employes LIMIT 0,1");

$employes = $resultat -> fetch_assoc();
print_r($employes);
echo "prenom : ".$employes["prenom"];

$mysqli -> query("INSERT INTO employes ( id_employes,prenom,nom,sexe,service,date_embauche,salaire )
VALUES (991,'Benjamin','Maurouard','m','informatique','2019-03-20',10000)") ;
*/
//PDO

$pdo = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
//$pdo -> query("INSERT INTO employes ( id_employes,prenom,nom,sexe,service,date_embauche,salaire )
//VALUES (992,'Jean-michel','Bruitage','m','communication','2019-03-20',1)") ;
/*
$pdo -> query("UPDATE  employes SET salaire = 0 WHERE prenom ='jean-michel' 
") ;
$test = $pdo -> query("SELECT * FROM employes WHERE id_employes=992 ") ;
$affiche = $test -> fetch();
print_r($affiche);*/
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $pdo -> query("INSERT INTO identification (nom,prenom,mail,password)
VALUES ('$nom','$prenom','$mail','$password')") ;
  echo " Vos données $nom - $prenom - $mail - $password ont bien été enregistrées!";
}
else{
    echo 'inscriver-vous';
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <FORM method="POST" action="index.php">
    <input type="text" name ="nom" placeholder="nom">
    <input type="text" name ="prenom"placeholder="prenom">
    <input type="mail" name ="mail"placeholder="adresse email">
    <input type="password" name ="password"placeholder="mot de passe">
    <button type="submit" name=btn>valider</button>
    </FORM>
    
</body>
</html>