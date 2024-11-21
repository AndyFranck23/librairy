<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-head">
                <form action="
                <?php base_url('addBook'); ?>" method="post">
                    <div class="form-floating mb-3">
                        <label for="">Titre</label>
                        <input type="text" name="titre" class="form-control" 
                        <?php if($_SERVER['REQUEST_URI'] != '/addBook'){?>value=<?= $book['titre'] ?><?php } ?>>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="">Auteur</label>
                        <input type="text" name="auteur" class="form-control"
                        <?php if($_SERVER['REQUEST_URI'] != '/addBook'){?>value=<?= $book['auteur'] ?><?php } ?>>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="">Delai</label>
                        <input type="number" name="heure" class="form-control"
                        <?php if($_SERVER['REQUEST_URI'] != '/addBook'){?>value=<?= $book['heure'] ?><?php } ?>>
                    </div>
                    <?php if($_SERVER['REQUEST_URI'] == '/addBook'){ $value = 'Ajouter';}else{ $value = 'Modifier';} ?>
                    <input type="submit" value=<?= $value ?> class="btn btn-outlined-danger">
                </form>
            </div>
        </div>
    </div>
</body>
</html>