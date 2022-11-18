<?php

/**
 * 4 status de fichier git
 * -untracked => les fichiers crée mais non suivies par git
 * -tracked => fichier déja suivi par git mais non envoyé vers le repository
 * -staged => les fichiers suivi, enregistré mais non envoyé vers le repository
 * -comited => tous les fichiers envoyés et non modifiés de mon projet
 * 
*/
?>
<?php

require_once "init.php";

debug($_POST);

if ($successMessage = "bravo tu as reussi") {
    echo "bavro tu as reussi";
    
} else { 
    echo "Nope";
}

if( !empty($_POST) ) {



    if(!empty($_FILES['photo']['name'])){

        copy($_FILES['photo']['tpm_name'], 'photos/' .time() . '-' .$_FILES['photo']['name']);
    

        debug($_FILES);



      //  copy($_FILES['photo']['tmp_name'], "photo/".$_FILES['photo']['name']);
    }
    $requete = $bdd->prepare("INSERT INTO produit(titre,prix,description,photo) VALUES (:titre, :prix, :description, :photo) ");

    debug($requete);

    $success = $requete->execute([
        ':titre' => $_POST['titre'],
        ':prix' => $_POST['prix'],
        ':description' => $_POST['description'],
        ':photo' => time() ."-".$_FILES['photo']['name']
        ]);
    }


    ?>









<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
</head>
<body>


                <div class="container">
                <h1 class="text-center mt-5">Ajout produit</h1>

                <?php if( !empty($successMessage) ){ ?>
            <div class="alert alert-success col-md-6 mx-auto text-center">
                <?php echo $successMessage; ?>
            </div>
        <?php } ?>


<form action="" class="col-6 mx auto" method="post" enctype="multipart/form-data">


                <label for="" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre">

                <label for="" class="form-label">Prix</label>
                <input type="text" class="form-control" name="prix" id="prix">

                <label for="" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description">

                <label for="" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo">

                <button class="btn btn-success mt-3 d-block mx-auto">Enregistrer</button>
            </form>
        </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>