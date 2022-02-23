<?php
// MODIFIER UN AUTEUR

include "../config/config.php";
include "../config/bdd.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        // REQUETE SQL POUR RECUPERER L'AUTEUR EN BDD
        $sql = "SELECT * FROM auteur WHERE id= :id";
        // var_dump($sql);
        // EXECTUER LA REQUETE
        $requete = $bdd->prepare($sql);
        // $requete->execute(array($id));

        $data = [':id' => $id];

        $requete->execute($data);


        // RECUPERATION DES INFOS
        $auteur = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($auteur);

    } else {
        header('location:index.php');
        die;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modifier un auteur</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Auteurs</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                        <h1 class="text-center">Modifier un auteur</h1>

                        
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <input type='hidden' name='id' value="<?= $auteur['id'] ?>">
                            <div class="mb-3">
                                <label for="nom" class="form-label">nom :</label>
                                <input type="text" name="nom" class="form-control" id="nom" value="<?= $auteur['nom'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">prenom :</label>
                                <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $auteur['prenom'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nom_de_plume" class="form-label">nom_de_plume :</label>
                                <input type="text" name="nom_de_plume" class="form-control" id="nom_de_plume" value="<?= $auteur['nom_de_plume'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse :</label>
                                <input type="text" name="adresse" class="form-control" id="adresse" value="<?= $auteur['adresse'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">ville :</label>
                                <input type="text" name="ville" class="form-control" id="ville" value="<?= $auteur['ville'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="code_postal" class="form-label">code_postal :</label>
                                <input type="number" name="code_postal" class="form-control" id="code_postal" value="<?= $auteur['code_postal'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="form-label">mail :</label>
                                <input type="mail" name='mail' class='form-control' id='mail' value="<?= $auteur['mail'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="numero" class="form-label">numéro :</label>
                                <input type="number" name="numero" class="form-control" id="numero" value="<?= $auteur['numero'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo : Si vous souhaitez garder la photo actuelle ne touchez pas à ce champ</label>
                                <input type="file" name="photo" class="form-control" id="photo" value="<?= $auteur['photo'] ?>">
                            </div>
                            
                            <div class="mb-3 text-center">
                                <input type="submit" name="btn_update_auteur" class="btn btn-warning">
                                <a href="http://localhost/bibliotheque/admin/auteur/index.php" class="btn btn-primary">Annuler</a>
                            </div>
                        </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include PATH_ADMIN . "include/footer.php";
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= URL_ADMIN ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= URL_ADMIN ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= URL_ADMIN ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= URL_ADMIN ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= URL_ADMIN ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= URL_ADMIN ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= URL_ADMIN ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>