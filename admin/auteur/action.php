<?php 
include "../config/config.php";
include "../config/bdd.php";


// POUR UPDATE
if (isset($_POST['btn_update_auteur'])){
    $id = intval($_POST['id']);
    if($id <= 0) {
        // erreur
        header('location:index.php');
        die;
    }

    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $mail = htmlentities($_POST['mail']);
    $numero = htmlentities($_POST['numero']);
    $photo = $_FILES['photo']['name'];

    // on verifie si la photo a été changée sinon on garde la même
    if (!empty($_FILES['photo']['name'])){

        // si la photo doit être changée on enregistre le nom de la photo
        $photo = $_FILES['photo']['name'];
        // on recupère le nom de la photo actuelle save en bdd avec une requete
        $sql = 'SELECT photo FROM auteur WHERE id = :id';
        $req = $bdd->prepare($sql);
        $req->execute([$id]);
        $hold_photo = $req->fetch(PDO::FETCH_ASSOC);
        $hold_photo = $hold_photo['photo'];
        $chemin_hold_photo = PATH_ADMIN . 'img/photo/' . $hold_photo;
        var_dump($chemin_hold_photo);
        
    }
}