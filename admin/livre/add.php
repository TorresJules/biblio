<?php
include "../config/config.php";
include "../config/bdd.php";


$sql = "SELECT * FROM categorie";
$req = $bdd->query($sql);
$categories = $req->fetchAll(PDO::FETCH_ASSOC);
// var_dump($categories);

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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h1 class="text-center">Ajouter un livre</h1>
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <input type='hidden' name='id'>
                        <div class="mb-3">
                            <label for="titre" class="form-label">titre :</label>
                            <input type="text" name="titre" class="form-control" id="titre">
                        </div>
                        <div class="mb-3">
                            <label for="num_ISBN" class="form-label">num_ISBN :</label>
                            <input type="text" name="num_ISBN" class="form-control" id="num_ISBN">
                        </div>
                        <div class="mb-3">
                            <label for="illustration" class="form-label">Illustration :</label>
                            <input type="file" name="illustration" class="form-control" id="illustration">
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumé :</label>
                            <textarea class="form-control" name="resume" id="resume" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">prix :</label>
                            <input type="number" name="prix" class="form-control" id="prix">
                        </div>
                        <div class="mb-3">
                            <label for="nb_pages" class="form-label">nb_pages :</label>
                            <input type="number" name="nb_pages" class="form-control" id="nb_pages">
                        </div>
                        <div class="mb-3">
                            <label for="date_achat" class="form-label">date_achat :</label>
                            <input type="date" name="date_achat" class="form-control" id="date_achat">
                        </div>
                        <div class="mb-3">
                            <label for="cat" class="form-label">Catégories</label>
                            <select class="select-cat" name="categorie[]" multiple id="cat">
                                <?php foreach ($categories as $categorie) : ?>
                                    <option value="<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3 text-center">
                            <input type="submit" name="btn_add_livre" class="btn btn-success">
                            <a href="http://localhost/bibliotheque/admin/livre/index.php" class="btn btn-warning">Annuler</a>
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
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
            <script>
                $('.select-cat').select2();
                CKEDITOR.replace('resume');
            </script>