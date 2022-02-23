<?php
    include '../config/config.php';
    include "../config/bdd.php";
    if (!isConnect()) {
        header('location:../index.php');
    }

    $sql = 'SELECT * FROM auteur';
    $requete = $bdd->query($sql);
    $auteurs = $requete->fetchAll(PDO::FETCH_ASSOC);


    ?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Auteurs</title>

    <!-- Custom fonts for this template-->
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
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
                        <h1 class="h3 mb-0 text-gray-800">Auteurs</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <?php if (isset ($_SESSION['error_update_auteur']) && ($_SESSION['error_update_auteur'] == false)){
                        alert('success','modification appliquée');
                        unset($_SESSION['error_update_auteur']);
                    }; ?>
                        <a href="http://localhost/bibliotheque/admin/auteur/add.php" class="btn btn-success">Ajouter un auteur</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom de plume</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Code postal</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($auteurs as $auteur) : ?>
                                    <tr>
                                        <th scope="row"><?= $auteur['id'] ?></th>
                                        <td><?= $auteur['nom'] ?></td>
                                        <td><?= $auteur['prenom'] ?></td>
                                        <td><?= $auteur['nom_de_plume'] ?></td>
                                        <td><?= $auteur['adresse'] ?></td>
                                        <td><?= $auteur['ville'] ?></td>
                                        <td><?= $auteur['code_postal'] ?></td>
                                        <td><?= $auteur['mail'] ?></td>
                                        <td><?= $auteur['numero'] ?></td>
                                        <td><?= $auteur['photo'] ?></td>

                                        <td><a href="http://localhost/bibliotheque/admin/auteur/update.php?id=<?= $auteur['id'] ?>" class="btn btn-warning">Modifier</a>
                                        <td><a href="http://localhost/bibliotheque/admin/auteur/action.php?id=<?= $auteur['id'] ?>" class="btn btn-danger">Supprimer</a>
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
            
