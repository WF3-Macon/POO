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
            <a href="/">Ajouter un commentaire</a>
            
            <!-- Message de confirmation de suppression -->
            <?php if(isset($_GET['delete']) && $_GET['delete']): ?>
                <div class="alert alert-success mt-5">
                    La suppression à bien été effectuée
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['edit']) && $_GET['edit']): ?>
                <div class="alert alert-success mt-5">
                    L'édition à bien été effectuée
                </div>
            <?php endif; ?>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avis</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listAvis as $avis): ?>
                        <tr>
                            <th scope="row"><?php echo $avis->getId(); ?></th>
                            <td><?php echo $avis->getContent(); ?></td>
                            <td>
                                <!-- http://avis.test/edit/avis?id=1 -->
                                <a href="/edit/avis?id=<?php echo $avis->getId(); ?>" class="btn btn-outline-secondary">
                                    Modifier
                                </a>
                                
                                <!-- http://avis.test/delete/avis?id=1 -->
                                <a href="/delete/avis?id=<?php echo $avis->getId(); ?>" class="btn btn-outline-danger">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>