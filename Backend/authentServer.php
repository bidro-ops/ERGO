
    <?php
    include_once __DIR__ . "/../config/gestionSession.php"; 
    include_once __DIR__ . "/../BDD/connexion.php"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];




    try {
     

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $users['pwd'])) {
                
                setcookie('iduser', $users['iduser'], time() + (86400 * 30), "/"); 
                setcookie('username', $users['username'], time() + (86400 * 30), "/");
                setcookie('email', $users['email'], time() + (86400 * 30), "/");

                


                $checkAdmin = $conn->prepare("SELECT count(*) AS count FROM users WHERE iduser = :iduser AND role = 'administrator'");
                $checkAdmin->execute([':iduser' => $users['iduser']]);
                $isadmin = $checkAdmin->fetch(PDO::FETCH_ASSOC);

                $_SESSION['username'] = $users['username'];
                $_SESSION['iduser'] = $users['iduser'];

                if($isadmin['count'] > 0){
                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: Mainpage2.php");
                    exit();
                }

            } else {
                $_SESSION['error'] = "Incorrect password.";

            }
        } else {
            $_SESSION['error'] = "Username not found.";

        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        $_SESSION['error'] = "An error occurred. Please try again later.";

    }
}
?>