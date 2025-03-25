<?php
//require 'config/gestionSession.php'; 
require 'BDD/connexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idproject'])) {
    if (!isset($_SESSION['iduser'])) {
        die("Unauthorized access.");
    }

    $project_id = $_POST['idproject'];
    $user_id = $_SESSION['iduser'];


                   
    $isChef = false;

        $query = "SELECT COUNT(*) as count FROM projects 
        WHERE idproject = :idproject AND chef = :iduser";
                        
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':idproject' => $project_id,
            ':iduser' => $_SESSION['iduser']
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $isChef = ($result['count'] > 0);
        

    try {
        $query = "DELETE FROM contributors WHERE idproject = :project_id AND iduser  = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':project_id' => $project_id,
            ':user_id' => $user_id
        ]);

        if($isChef === true){
            $deleteproject = $conn->prepare("DELETE FROM projects WHERE idproject = :idproject");
            $deleteproject->execute(['idproject' => $project_id]);
        }
        
        header("Location: project.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>