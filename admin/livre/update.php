<?php
// MODIFIER UN LIVRE

include "../config/config.php";
include "../config/bdd.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        // REQUETE SQL POUR RECUPERER LE LIVRE EN BDD
        $sql = 'SELECT * FROM livre WHERE id= :id';
        $requete = $bdd->prepare($sql);
        $data = [':id' => $id];
        $requete->execute($data);
        $livre = $requete->fetch(PDO::FETCH_ASSOC);

        //  REQUETE POUR RECUP LA CATEGORIE DU LIVRE
        $sqlCatLivre = 'SELECT libelle FROM categorie_livre
        INNER JOIN categorie ON categorie_livre.id_categorie = categorie.id
        WHERE id_livre= :id';
        $data = [':id' => $id];
        $reqCatLivre = $bdd->prepare($sqlCatLivre);
        $reqCatLivre->execute($data);
        $catLivre = $reqCatLivre->fetchAll(PDO::FETCH_NUM);

        if (count($catLivre)>1){
            $catLivre=array_merge([],...$catLivre);
        }else{
            $catLivre = $catLivre[0];
        }

        // REQUETE POUR RECUPERER TOUTES LES CATEGORIES
        $sqlCategorie = 'SELECT * FROM categorie';
        
        $reqcat = $bdd->query($sqlCategorie);
        $categories = $reqcat->fetchAll(PDO::FETCH_ASSOC);

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

    <title>Modifier un ivre</title>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Livres</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <h1 class="text-center">Modifier un livre</h1>


                    <form action="action.php" method="POST">
                        <input type='hidden' name='id' value="<?= $livre['id'] ?>">
                        <div class="mb-3">
                            <label for="titre" class="form-label">titre :</label>
                            <input type="text" name="titre" class="form-control" id="titre" value="<?= $livre['titre'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="num_ISBN" class="form-label">num_ISBN :</label>
                            <input type="text" name="num_ISBN" class="form-control" id="num_ISBN" value="<?= $livre['num_ISBN'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="illustration" class="form-label">Illustration :</label>
                            <input type="text" name="illustration" class="form-control" id="illustration" value="<?= $livre['illustration'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumé :</label>
                            <textarea class="form-control" name="resume" id="resume" rows="3"><?= $livre['resume'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">prix :</label>
                            <input type="number" name="prix" class="form-control" id="prix" value="<?= $livre['prix'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nb_pages" class="form-label">nb_pages :</label>
                            <input type="number" name="nb_pages" class="form-control" id="nb_pages" value="<?= $livre['nb_pages'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="date_achat" class="form-label">date_achat :</label>
                            <input type="text" name="date_achat" value="<?php $date = date_create($livre['date_achat']);
                                                                        echo $date->format('d-m-Y'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cat" class="form-label">Catégories</label>
                            <select class="select-cat" name="categorie[]" multiple id="cat">
                                <?php foreach($categories as $categorie) :?>
                                    <option value="<?= $categorie['id'] ?>" 
                                    <?php 
                                        if(count($catLivre)>1){
                                            if(in_array($categorie['libelle'],$catLivre)){
                                                echo(' selected');
                                            }
                                        }else{
                                            if($categorie['libelle']===$catLivre[0]){
                                                echo(' selected');
                                            }
                                        

                                        }
                                        ?>><?= $categorie['libelle'] ?></option>
                                <?php endforeach ;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disponibilite" class="form-label">Disponibilité :</label>
                            <input type="number" name="disponibilite" class="form-control" id="disponibilite" value="<?= $livre['disponibilite'] ?>">
                        </div>

                        <div class="mb-3 text-center">
                            <input type="submit" name="btn_update_livre" class="btn btn-warning" value="modifier">
                            <a href="http://localhost/bibliotheque/admin/livre/index.php" class="btn btn-primary">Annuler</a>
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