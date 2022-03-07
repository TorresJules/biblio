<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    include '../config/bdd.php';

    // REQUETE SQL POUR RECUP LES INFO DE LOC
    $sql = 'SELECT * 
    FROM location
    INNER JOIN usager ON location.id_usager = usager.id
    INNER JOIN livre ON location.id_livre = livre.id';

    $requete = $bdd->query($sql);
    $locations= $requete->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($locations);
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des locations</h1>
                    </div>

                    <a href="http://localhost/bibliotheque/admin/location/add.php" class="btn btn-success">Ajouter une location</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Titre livre</th>
                                <th scope="col">Loué par</th>
                                <th scope="col">Depuis le</th>
                                <th scope="col">jusqu'au</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($locations as $location) : ?>
                                <tr>
                                    <th scope="row"><?= $location['titre'] ?></th>
                                    <th scope="row"><?= $location['nom'] ?></th>
                                    <th scope="row"><?= $location['date_debut'] ?></th>
                                    <th scope="row"><?= $location['date_fin'] ?></th>

                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
                include PATH_ADMIN .'include/footer.php';
            ?>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $('.select-livre').select2();
                $('.select-usager').select2();
            </script>
</body>
</html>