<?php

try{
    $bdd = new PDO("mysql:host=localhost;dbname=meuble", "root", "",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // Cette option me permet de faire de l'affichage de messages d'erreur
    ]);
}catch(Exception $e){ // injection de dépendance
    die("ERREUR CONNEXION BDD :" .$e->getMessage());

}

function debug($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

// déclarer de 2 variables globales qui vont nous permettre de récupérer et stocker des messages

$errorMessage = "";
$successMessage = "";

?>