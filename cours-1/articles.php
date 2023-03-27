<?php
//on va chercher les article dans la base 
//on ce connnecte a la base 
require_once"./includes/connect.php";

//ont ecrit la requête
$sql="SELECT * FROM `articles` ORDER BY `date` DESC";
//on execute la requête
$requete = $db->query($sql);

//ont recupere les articles
$articles = $requete->fetchALL();

//ont definit le titre
$titre = " liste des article";
//ont inclut le header
include "./includes/header.php";
//ont inclus la navbar
include "./includes/navbar.php";
?>
<h1>liste des articles</h1>

<section>
<?php foreach($articles as $article):?>
    <article>
        <h1><a href="article.php?id=<?=$article['id'];?>"><?=strip_tags( $article['title']);?></a></h1>
        <p>publier le <?=$article['date'];?> </p>
        <div>
            <?=strip_tags($article['content']);?>
        </div>
    </article>
    <?php endforeach;?>
</section>

    
<?php
//ont inclus le footer
include "./includes/footer.php";
?>
