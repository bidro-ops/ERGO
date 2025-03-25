<?php
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE['iduser'])) {
    setcookie('iduser', '', time() - 3600, "/");
    unset($_COOKIE['iduser']); 
}

if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); 
    unset($_COOKIE['username']); 
}

if (isset($_COOKIE['email'])) {
    setcookie('email', '', time() - 3600, "/"); 
    unset($_COOKIE['email']); 
}


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 
header("Location: ../authent.php"  ); 
exit();
?>
