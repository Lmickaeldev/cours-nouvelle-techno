<?php
//difined title
$titre="Accueil";
//ont inclut le header
include "./includes/header.php";
//ont inclus la navbar
include "./includes/navbar.php";

?>
<p>ceci est un test</p>
<?php
//connexion a la base de données 
require_once "./includes/connect.php";
//ont inclus le footer
include "./includes/footer.php";

$username="jean";
$password="dujardin";

$sql="SELECT * FROM `user` WHERE `nom`= :username AND `prenom`= :pass ";

//on prepare la requete
$requete = $db->prepare($sql);

//on inject les valeur"bindvalue"
$requete->bindvalue(":username",$username, PDO::PARAM_STR);
$requete->bindvalue(":pass",$password, PDO::PARAM_STR);

//on execute
$requete->execute();

$user = $requete ->fetch();

var_dump($user);

?>