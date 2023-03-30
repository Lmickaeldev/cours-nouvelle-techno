<?php
require_once 'classes/Compte.php';

//on instancie le compte
$compte1 = new Compte('Benoit',300);

$compte1->setSolde(600);

echo $compte1->getTitulaire();
//on écrit dans la propriéter titulaire
// $compte1->titulaire='benoit';

//on écrit dans la propriété solde
// $compte1->solde=500;

//on depose 100€
$compte1->deposer(20);



$compte1->retirer(300);

$compte1->VoirSolde();
// $compte2 = new Compte('Roberts',389.50);

// // $compte2->titulaire='Robert';
// // $compte2->solde=389.25;

// var_dump ($compte2);

?>