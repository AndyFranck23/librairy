<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/librairy.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="listeBook">Liste des livres</a>
            <a href="listeCommand">Liste des commandes</a>
        </div>
        <table class="table table-borser table-dark table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th> -->
                        <td>Id</td>
                        <td>Titre</td>
                        <td>Auteur</td>
                        <td>Durée d'utilisation</td>
                        <td>Disponible</td>
                    <!-- </th> -->
                </tr>
            </thead>
            <tbody>
                <div class="tabBar">
                    <div class="navSearch">
                        <form action="" method="post">
                            <input type="text" class="search" placeholder="Recherche" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div>
                        <a href="addBook" class="ajout">Ajout</a>
                        <a href="logoutAdmin" class="ajout">Deconnecter</a>
                    </div>
                </div>
                <?php
                foreach($books as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['titre'] ?></td>
                    <td><?= $row['auteur'] ?></td>
                    <td><?= $row['heure'] ?>j</td>
                    <td><?= $row['emprunt'] ?></td>
                    <td>
                        <a href="addBook<?= $row['id'] ?>">Modifier</a>
                        <a href="book/delete/<?= $row['id'] ?>">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>