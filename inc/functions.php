<?php
//ADMIN EXIST

function account_exists(): array
{
    $admin = bdd_select('SELECT id, password FROM admin WHERE login = ?', [$_POST['login']]);
    
    if (!empty($admin) && password_verify($_POST['password'], $admin[0]['password'])) {
        return $admin[0];
    } else {
        return [];
    }
} // fonction retourne soit un tableau vide soit un tableau avec l'login et le mdp

//DELETE FROM BDD
function bdd_delete(string $query, array $params = []): int
{
    require 'pdo.php';

    if ($params) {
        $req = $bdd->prepare($query);
        $req->execute($params);

    } else {
        $req = $bdd->query($query);
    }
    $deleted = $req->rowCount();
    //compte le nombre de ligne qui ont été affectée par la derniere requete
    return $deleted;
}

//INSERT IN BDD
function bdd_insert(string $query, array $params = []): int
{
    require 'pdo.php';

    if ($params) {
        $req = $bdd->prepare($query);
        $req->execute($params);

    } else {
        $req = $bdd->query($query);
    }
    $inserted = $bdd->lastInsertId();
    return $inserted;

}

//SELECT IN BDD
//premier parametre requete SQL et 2e paramètre de la requete
//cette fonction permet de faire des requete sql
// en une seul ligne en indiquant en paramètre les éléments de la requete
function bdd_select(string $query, array $params = [])
{
    require 'pdo.php';

    if ($params) {
        $req = $bdd->prepare($query);
        $req->execute($params);

    } else {
        $req = $bdd->query($query);
    }
    $data = $req->fetchAll();
//    var_dump($data);
    return $data;
}


//UPDATE IN BDD
function bdd_update(string $query, array $params = []): int
{
    require 'pdo.php';

    if ($params) {
        $req = $bdd->prepare($query);
        $req->execute($params);

    } else {
        $req = $bdd->query($query);
    }
    $updated = $req->rowCount();
    return $updated;

}
function debug($val){
    echo'<pre>';
    var_dump($val);
    echo '</pre>';
}