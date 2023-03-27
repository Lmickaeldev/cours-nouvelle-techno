<?php
//on va chercher les article dans la base 

//ont verifie si ont a un un id
if (!isset($_GET["id"]) || !empty($get_["id"])) {
    //je n'est pas d'id
    header('location: articles.php');
    exit;
};
//je recupere l'id 
$id = $_GET["id"];
//on ce connnecte a la base 
require_once"./includes/connect.php";
//ont va checher l'article dans la base 
//ont ecrit la requete
$sql="SELECT * FROM`articles`WHERE `id` = :id";

//ont prepare la requete 
$requete = $db->prepare($sql);

//ont inject les paramettre
$requete->bindvalue(":id", $id, PDO::PARAM_INT);

//ont execute la requete
$requete->execute();

//on recupere l'article
$article = $requete->fetch();

//on verifie si article est vide
if (!$article) {
    //pas d'article 
    http_response_code(404);
    echo "article inexistant";
    exit;
}

//ont a un article


//ont definit le titre
$titre = strip_tags($article["title"]);
//ont inclut le header
include "./includes/header.php";
//ont inclus la navbar
include "./includes/navbar.php";
?>
    <article>
        <h1><?=strip_tags( $article['title']);?></h1>
        <p>publier le <?=$article['date'];?> </p>
        <div>
            <?=strip_tags($article['content']);?>
        </div>
    </article>

    
<?php
//ont inclus le footer
include "./includes/footer.php";
?>
