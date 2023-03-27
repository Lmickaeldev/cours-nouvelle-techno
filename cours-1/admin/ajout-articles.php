
<?php
//ont traite le formulaires
if (!empty($_POST)) {
    //ont verifie que toute les donné sont présente
    if (isset($_POST["titre"],$_POST["contenu"]) && !empty($_POST["titre"]) && !empty($_POST["contenu"]))
    {
        
        //le formualaire est complet
        //ont recupere les données en les protegeant(failles xss)
        
        //ont retire toute balise du titre
        $titre = strip_tags($_POST["titre"]);
        //ont netralise toute balise du contenue
        $contenu = htmlspecialchars($_POST["contenu"]);
        
        //ont peu les enregistrer
        //ont ce connect a la base de donnés
        require_once"../includes/connect.php";
        //ont ecrit la requete
        $sql="INSERT INTO `articles`(`title`,`content`)VALUE (:title, :content)";
        //ont la prepare
        $query = $db->prepare($sql);
        //on inject les valeur
        $query->bindvalue(':title',$titre, PDO::PARAM_STR);
        $query->bindvalue(':content',$contenu, PDO::PARAM_STR);
        
        //ont execute la requete
        if (!$query->execute()) {
            die("une erreur est survenue");
        }
        //on recupere l'id de l'article
        $id=$db->lastInsertId();
        die("article ajouté sous le numero $id");

    }else{
        die("le formulaire est incomplet");
    }
}


$titre = "ajouts d'un article";

//on inclut le header
include_once "../includes/header.php";
//on inclut la navbar
include_once "../includes/navbar.php";
?>
<h1>ajouter un article</h1>
<form action="" method="post">
<label for="titre" >titre de l'article</label>
<input type="text" name="titre">
<br>
<label for="contenue">contenue de larticle</label>
<textarea name="contenu" id="contenue"></textarea>
<button type="submit">enregistrer</button>
</form>


<?php
//on inclut le footer
include_once "../includes/footer.php";
?>