<?php

function alert($couleur, $message){ ?>
    <div class="alert alert-<?= $couleur ?>" role="alert">
        <?= $message ?>
    </div>


<?php }

function isConnect(){
    if(isset($_SESSION['connect']) && $_SESSION['connect']==true){
        return true;
    }
    return false;
}

// 
function checkRole($id, $bdd){
    if (intval($id) <= 0){
        // erreur
        return false;
    }
        $sql = 'SELECT libelle FROM role_utilisateur INNER JOIN role ON role.id = role_utilisateur.id_role WHERE role_utilisateur.id_utilisateur = ?';
        $req = $bdd->prepare($sql);
        $req->execute([$id]);
        // fetch_num pour le merge
        $roles = $req->fetchAll(PDO::FETCH_NUM);
        // verif si 1 role ou +
        if (count($roles)>1){
            // si + de 1 role alors on merge (car le retour de la requete est sous la forme d'un tableau qui contient 2 tableau en element)
            $roles = array_merge($roles[0], $roles[1]);
        }else{
            // sinon on recup le role de l'utilisateur (qui a forcement 0 pour index car la bdd retourne un tableau)
            $roles= $roles[0];
        }
        /**
         * on retourne le tableau
         * normalement on devrait stocker directement le tableau en session
         * cela permet d'avoir une actualisation a chaque appel de la fonction
         */
        $_SESSION['user']['roles'] = $roles;
        return true;
    }

/**
 * isAdmin()
 * Fonction qui retourne un booléan
 * en fonvtion de si l'utilisateur a le role d'administrateur ou non
 * @return boolean
 */
function isAdmin(){
    /**
     * Doit verifier sio le tableau ['roles'] en session contient le nom du role recherché
     * Si oui alors l'utilisateur a le role recherché
     * Sinon l'utilisateur n'a pas le role recherché
    */
    return in_array('admin', $_SESSION['user']['roles']);
    foreach ($_SESSION['user']['roles'] as $roles){
        if ($roles == 'admin'){
            return true;
        }
        return false;
    }
}