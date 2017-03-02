<?php
session_start();

$_SESSION = []; //vide la session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
} // détruit les cookies de session

session_destroy();

header('Location: connexion.php');

?>
