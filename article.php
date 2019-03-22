<?php
$pdo = new PDO('mysql:host=localhost;dbname=abonnes','root','',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
$id_identification = $_GET['id_identification'] ;

$result = $pdo -> query("SELECT nom, prenom FROM identification WHERE id_identification = '$id_identification'");
$tabResult = $result -> fetch();
$nom = $tabResult['nom'];
$prenom = $tabResult['prenom'];

if(isset($_POST['titre'])){
    $titre = $_POST['titre'];
    $art = $_POST['art'];
    $pdo -> query("INSERT INTO article (id_identification,titre,date_parution,art) VALUES ( '$id_identification','$titre',CURDATE(),'$art')") ;
    echo " Votre article $titre  a bien été enregistrer !";

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<h1><?php echo "Bonjour $nom $prenom"; ?></h1>
<h1>rediger votre article</h1>
<FORM method="POST" action="article.php">
<input type="text" name ="titre" placeholder="titre"><br><br>
<textarea name ="art" placeholder="rediger votre article"></textarea><br>
<label >choisir une rubrique pour votre article : </label>

<select id="rubrique-select">
    <option value="">----</option>
    <option value="culture_pop">culture pop</option>
    <option value="sport">sport</option>
    <option value="cuisine">cuisine</option>
    <option value="actualite">actualité</option>
    <option value="mode">mode</option>
    <option value="tunning">tunning</option>
</select><br>
<input type="submit" name="btn" placeholder="valider">
</FORM>
    

</body>
</html>
