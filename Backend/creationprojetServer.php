
<?php
include "config/gestionSession.php";
include "BDD/connexion.php";



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['projectName']) || empty($_POST['projectDescription'])) {
        echo "<div class='alert alert-danger'>Please fill in all required fields</div>";
        exit();
    }
    
    $projectName = filter_input(INPUT_POST, 'projectName', FILTER_SANITIZE_SPECIAL_CHARS);
    $projectDescription = filter_input(INPUT_POST, 'projectDescription', FILTER_SANITIZE_SPECIAL_CHARS); 
    $userId = $_COOKIE['iduser'];
    
    $checkStmt = $conn->prepare("SELECT * FROM projects WHERE name = :name AND chef = :chef");
    $checkStmt->bindParam(':name', $projectName);
    $checkStmt->bindParam(':chef', $userId);
    $checkStmt->execute();
    
    if ($checkStmt->rowCount() > 0) {
        echo "<div class='alert alert-warning'>This project already exists!</div>";
    } else {
        try {
            $insertStmt = $conn->prepare("INSERT INTO projects (name, description, chef, created_at) 
                                         VALUES (:name, :description, :chef, NOW())");
            $insertStmt->bindParam(':name', $projectName);
            $insertStmt->bindParam(':description', $projectDescription);
            $insertStmt->bindParam(':chef', $userId);
           



            if ($insertStmt->execute()) {
                $_SESSION['success_message'] = "Project created successfully!";
                $selectionIdProjetStmt = $conn->prepare("SELECT idproject FROM projects WHERE name = :nom");
                $selectionIdProjetStmt->bindParam(':nom', $projectName); 
                $selectionIdProjetStmt->execute();
                $idProject = $selectionIdProjetStmt->fetch(PDO::FETCH_ASSOC); 

                if ($idProject) {
                    $idProject = $idProject['idproject'];
                } else {
                    echo "Project not found.";
                }

                $addcontribStmt = $conn->prepare("INSERT INTO contributors(idproject, iduser) VALUES(:idproject, :iduser)");            
                $addcontribStmt->bindParam(':idproject', $idProject);
                $addcontribStmt->bindParam(':iduser', $userId);
                $addcontribStmt->execute();
                    header("Location: project.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Error creating project</div>";
            }
        } catch(PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "<div class='alert alert-warning'>Project already exists!</div>";
            } else {
                echo "<div class='alert alert-danger'>Database error: " . $e->getMessage() . "</div>";
            }
        }
    }
}
?>