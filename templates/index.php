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
        <div class="w-50 mx-auto pt-5">
            <a href="/liste">Voir tous les avis</a>
            
            <form method="post" class="pt-5">
                <!-- Affiche un message de succès -->
                <?php if(isset($success) && $success): ?>
                    <div class="alert alert-success">
                        Merci pour ton avis
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="avis" class="form-label">Votre avis</label>
                    <textarea class="form-control" id="avis" rows="6" name="avis"></textarea>
                </div>
                <button class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </body>
</html>