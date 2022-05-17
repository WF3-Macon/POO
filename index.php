<?php

// Récupération de la classe PHP "Avis"
require_once 'Avis.php';

// Si le formulaire est envoyé, la superglobale $_POST est
// remplie des données du formulaire
if (!empty($_POST)) {

    // Instancier la classe Avis
    $avis = new Avis();

    // Envoyer les infos du formulaire à la classe Avis
    $success = $avis->insert($_POST['avis']);

    if ($success) {
        echo 'Merci pour votre commentaire';
    }
    else {
        echo 'Problème, veuillez recommencer';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Poste ton avis !</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <form method="post" class="w-50 mx-auto pt-5">
            <div class="mb-3">
                <label for="avis" class="form-label">Votre avis</label>
                <textarea class="form-control" id="avis" rows="6" name="avis"></textarea>
            </div>
            <button class="btn btn-primary">Envoyer</button>
        </form>
    </body>
</html>