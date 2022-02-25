<?php
include "../config/config.php";
include "../config/bdd.php";
if (!isConnect()) {
    header('location:../index.php');
}

    // REQUETE SQL POUR RECUPERER LES LIVRES EN BDD
    $sql= 'SELECT *
    FROM livre';
    // EXECUTER LA REQUETE
    $requete = $bdd->query($sql);
    // RECUPERATION DES INFOS
    $livres = $requete->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($livres);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Livres</title>

    <!-- Custom fonts for this template-->
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include PATH_ADMIN . "include/sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include PATH_ADMIN . "include/topbar.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Livres</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <?php if (isset ($_SESSION['error_update_livre']) && ($_SESSION['error_update_livre'] == false)){
                        alert('success','modification appliquée');
                        unset($_SESSION['error_update_livre']);
                    }; ?>
                        <a href="http://localhost/bibliotheque/admin/livre/add.php" class="btn btn-success">Ajouter un livre</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Auteur</th>
                                    <th scope="col">Num_ISBN</th>
                                    <th scope="col">Illustration</th>
                                    <th scope="col">Résumé</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">NB_pages</th>
                                    <th scope="col">Date d'achat</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Disponibilité</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($livres as $livre) : ?>

                                    <!-- REQUETE POUR AVOIR LES CATEGORIES -->
                                    <?php $reqcat='SELECT categorie.libelle FROM categorie_livre
                                    INNER JOIN categorie ON categorie.id = categorie_livre.id_categorie
                                    WHERE id_livre = :id';
                                    $data = [':id' => $livre['id']];
                                    $reqcat = $bdd->prepare($reqcat);
                                    $reqcat->execute($data);
                                    $cat = $reqcat->fetchAll(PDO::FETCH_NUM);
                            
                                    if (count($cat)>1){
                                        $cat=array_merge([],...$cat);
                                    }else{
                                        $cat = $cat[0];
                                    }

                                    // REQUETE POUR AVOIR LES AUTEURS
                                    $reqaut = 'SELECT auteur.nom, auteur.prenom FROM auteur_livre
                                    INNER JOIN auteur ON auteur.id = auteur_livre.id_auteur
                                    WHERE id_livre = :id';
                                    $data = [':id' => $livre['id']];
                                    $reqaut = $bdd->prepare($reqaut);
                                    $reqaut->execute($data);
                                    $aut = $reqaut->fetchAll(PDO::FETCH_ASSOC);
                                    var_dump($aut);
                                    ?>
 
                                    <tr>
                                        <th scope="row"><?= $livre['id'] ?></th>
                                        <td><?= $livre['titre'] ?></td>
                                        <td><?= $aut['prenom'] . " " . $aut['nom'] ?></td>
                                        <td><?= $livre['num_ISBN'] ?></td>
                                        <td><?= $livre['illustration'] ?></td>
                                        <td><input value="<?= $livre['resume'] ?>"  disabled="disabled"/></td>
                                        <td><?= $livre['prix'] ?></td>
                                        <td><?= $livre['nb_pages'] ?></td>
                                        <td><input value="<?php $date = date_create($livre['date_achat']); echo $date->format('d-m-Y'); ?>"/></td>
                                        <td><?= implode($cat)?></td>
                                        <td><?= $livre['disponibilite'] ?></td>
                                        <td><a href="http://localhost/bibliotheque/admin/livre/update.php?id=<?= $livre['id'] ?>" class="btn btn-warning">Modifier</a>
                                        <td><a href="http://localhost/bibliotheque/admin/livre/action.php?id=<?= $livre['id'] ?>" class="btn btn-danger">Supprimer</a>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include PATH_ADMIN . "include/footer.php";
            ?>
            <!-- End of Footer -->

        