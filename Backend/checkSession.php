<?php
  
  if (!isset($_SESSION['username']) || !isset($_COOKIE['iduser']) || !isset($_COOKIE['username'])) {
                header("Location: authent.php"  ); 
                exit();
            }
?>