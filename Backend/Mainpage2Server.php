<?php 
        include 'config/gestionSession.php';
        include 'BDD/connexion.php';
        include 'Backend/checkSession.php'; 
 

            $requete1 = "SELECT projects.idproject ,title, projects.name, tasks.description, status from tasks 
            INNER JOIN projects
            ON projects.idproject = tasks.idproject 
            INNER JOIN contributors
            ON contributors.idproject = projects.idproject
            WHERE contributors.iduser = :iduser
            ORDER BY status";
            $stmt = $conn->prepare($requete1);
            $stmt->execute([':iduser' => $_SESSION['iduser']]);

            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_title'])) {
                    $deleteTitle = $_POST['delete_title'];
                    $deleteName = $_POST['delete_name'];
                    $stmt = $conn->prepare("DELETE FROM tasks WHERE title = :title AND idproject = :idproject");
                    $stmt->execute([
                        ':title' => $deleteTitle,
                        ':idproject' => $deleteName
                    ]);
                    header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_title'])) {
                    $updateTitle = $_POST['update_title'];
                    $stmt = $conn->prepare("UPDATE tasks SET status = 'done' WHERE title = :title");
                    $stmt->execute([':title' => $updateTitle]);
                    header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatestart_title'])) {
                    $updatestartTitle = $_POST['updatestart_title'];
                    $stmt = $conn->prepare("UPDATE tasks SET status = 'in_progress' WHERE title = :title");
                    $stmt->execute([':title' => $updatestartTitle]);
                    header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }







            ?>       