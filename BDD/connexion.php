<?php 

            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "ergo";


            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){     
                die("connection failed" . $e->getMessage());
            }





?>