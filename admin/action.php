<!-- POUR GERER LA CONNEXION A L'ESPACE ADMIN -->

<?php
    include"config/config.php";
    include"config/bdd.php";

if (isset($_POST['btn_connect'])){
    // var_dump($_POST);
    // die;
    // traitement des données

    $mail = htmlentities($_POST['mail']);
    $mdp = htmlentities($_POST['mdp']);

    // check de l'utilisateur en bdd
    $sql ="SELECT * FROM utilisateur WHERE mail = ?";  // OR pseudo = :pseudo  -> mettre OR pour poser 2 conditions avec pseudo
    $req = $bdd->prepare($sql);
    $req->execute([$mail]);
    $user = $req->fetch(PDO::FETCH_ASSOC);
    // echo password_hash('martineBoss', PASSWORD_DEFAULT);
    // die;

    if (!$user){
        $_SESSION['connect'] = false;
        header('location:login.php');
        die;
    }
    if(!password_verify($mdp, $user['mot_de_passe'])){

        // erreur connexion refusee
        $_SESSION['connect'] = false;
        header('location:login.php');
        die;
    }
    unset($user['mot_de_passe']);
    $_SESSION['user'] = $user;
    $_SESSION['date_connect'] = new DateTime();
    checkRole($user['id'], $bdd);
    $_SESSION['connect'] = true;
    header('location:index.php');
    die;
}
// var_dump($_SESSION);
//     die;
if(isset($_GET['connect']) && $_GET['connect'] == "false"){
    
    $_SESSION = [];
    header('location:index.php');
    die;
}