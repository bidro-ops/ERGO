<?php
        session_start();
        session_regenerate_id(true);
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache"); 
        header("Expires: 0"); 

?>