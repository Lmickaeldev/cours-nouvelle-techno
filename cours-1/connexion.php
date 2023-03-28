<?php
require_once"includes/connexion_script.php";

// $titre doit etre donner avant header.php
$titre="connexion";
include_once"includes/header.php";
// on inclus la navbar
include_once"includes/navbar.php";

// contenu de la page
?>
<h1>connexion</h1>

<form method="post">

<div>
    <label for="email">email</label>
    <input type="email" name="email" id="email">    
</div>
<div>
    <label for="pass">mots de passe</label>
    <input type="password" name="pass" id="pass">
</div>
<button type="submit">me connecter</button>




</form>

<?php
include_once"includes/footer.php";
?>