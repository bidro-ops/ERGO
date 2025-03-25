
<?php
    include_once "config/gestionSession.php";
    include_once "BDD/connexion.php";
    include_once "Backend/checkSession.php";


    $fetchProjets = "SELECT * from projects 
    INNER JOIN contributors 
    ON projects.idproject = contributors.idproject
    WHERE iduser = :iduser";

    $stmt = $conn->prepare($fetchProjets);
    $stmt->bindParam(':iduser', $_COOKIE['iduser']);
    $stmt->execute();

    $resultatProjets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_project'])) {
            $updatestartTitle = $_POST['delete_project'];
            $stmt = $conn->prepare("DELETE FROM projects WHERE idproject = :idproject");
            $stmt->execute([':idproject' => $updatestartTitle]);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
    }


?>