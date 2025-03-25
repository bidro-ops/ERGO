<?php


include_once __DIR__ . "/../config/gestionSession.php"; 
include_once __DIR__ . "/../BDD/connexion.php"; 
include_once "Backend/checkSession.php";

            if (!isset($_GET['project_id'])) {
                die("Project ID not provided.");
            }

            $project_id = $_GET['project_id'];
           


                $stmt = $conn->prepare("SELECT * FROM projects WHERE idproject = :idproject");
                $stmt->bindParam(':idproject', $project_id, PDO::PARAM_INT);
                $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $project = $stmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        die("Project not found.");
                    }
            




            $requete1 = "SELECT projects.idproject , tasks.title, projects.name, tasks.description, status from tasks 
            INNER JOIN projects
            ON projects.idproject = tasks.idproject 
            WHERE projects.idproject = :idproject
            ORDER BY status";
            $stmt = $conn->prepare($requete1);
            $stmt->execute([':idproject' => $project_id]);

            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);



            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_title'])) {
                    $deleteTitle = $_POST['delete_title'];
                    $stmt = $conn->prepare("DELETE FROM tasks WHERE title = :title AND idproject = :idproject");
                    $stmt->execute([
                        ':title' => $deleteTitle,
                        ':idproject' => $project_id
                    ]);
                    header("Location: " . $_SERVER['PHP_SELF'] . "?project_id=" . $project_id);
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_title'])) {
                    $updateTitle = $_POST['update_title'];
                    $stmt = $conn->prepare("UPDATE tasks SET status = 'done' WHERE title = :title");
                    $stmt->execute([':title' => $updateTitle]);
                    header("Location: " . $_SERVER['PHP_SELF'] . "?project_id=" . $project_id);
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatestart_title'])) {
                    $updatestartTitle = $_POST['updatestart_title'];
                    $stmt = $conn->prepare("UPDATE tasks SET status = 'in_progress' WHERE title = :title");
                    $stmt->execute([':title' => $updatestartTitle]);
                    header("Location: " . $_SERVER['PHP_SELF'] . "?project_id=" . $project_id);
                exit();
            }


            $fetchcontributors = $conn->prepare("SELECT users.* FROM contributors 
            INNER JOIN users 
            ON users.iduser = contributors.iduser
            WHERE idproject = :idproject");
            $fetchcontributors->execute([':idproject' => $project_id]);
            $contributors = $fetchcontributors->fetchAll(PDO::FETCH_ASSOC);




            $isChef = false;
            if (isset($_SESSION['iduser'])) {
                $query = "SELECT COUNT(*) as count FROM projects 
                WHERE idproject = :idproject AND chef = :userid";
            
                $stmt = $conn->prepare($query);
                $stmt->execute([
                ':idproject' => $project_id,
                ':userid' => $_SESSION['iduser'],
                ]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $isChef = ($result['count'] > 0);
            }

            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Title'])){
                $addtask = $conn->prepare("INSERT INTO tasks(idproject, title, description, status) VALUES (:idproject, :title, :description, :status)");
                $addtask->execute([
                    ':idproject' => $project_id,
                    ':title' => $_POST['Title'],
                    ':description' => $_POST['Description'],
                    ':status' => "todo",
                ]);
                header("Location: " . $_SERVER['PHP_SELF'] . "?project_id=" . $project_id);
                exit();
                
            }




        if (isset($_POST['add_user']) && isset($_POST['username'])) {
    
            $username = trim($_POST['username']);
            $projectId = $_POST['project_id'];
    
    
            if (empty($username)) {
                $_SESSION['error'] = "Username cannot be empty";
        } else {
            try {
            
            $query = "SELECT iduser FROM users WHERE username = :username LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->execute([':username' =>  $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                
                $query = "SELECT COUNT(*) as count FROM contributors 
                          WHERE iduser = :userid AND idproject = :projectid";
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    ':userid' => $user['iduser'],
                    ':projectid' => $projectId
                ]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($result['count'] == 0) {
                    $query = "INSERT INTO contributors (iduser, idproject, role) 
                              VALUES (:userid, :projectid, :role)";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                        ':userid' => $user['iduser'],
                        ':projectid' => $projectId,
                        'role' => "member"
                    ]);
                    
                    $_SESSION['success'] = "User {$username} added to the project successfully!";
                } else {
                    $_SESSION['error'] = "User {$username} is already a member of this project";
                }
            } else {
                $_SESSION['error'] = "User {$username} not found";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
        }
    }
    
    header("Location: " . $_SERVER['PHP_SELF'] . "?project_id=" . $projectId);
    exit;
}






            ?>       