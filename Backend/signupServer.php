 <?php
        include_once __DIR__ . "/../BDD/connexion.php"; // Path to BDD/connexion.php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            
            if (isset($_POST['role'])) {
                $selectedrole = $_POST['role'];            
            } else {
                echo "No role selected.<br>";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               die("Invalid email format. Please enter a valid email address.");
            }
            
            if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
                die("Please fill in all required fields.");
            }


            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Username already exists! Please choose a different username.";
            } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Email already exists! Please use a different email address.";
            } else {
                try {
                    $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, pwd, role) VALUES (:fullname, :username, :email, :password, :role)");
                    $stmt->bindParam(':fullname', $fullname);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':role', $selectedrole);

                if ($stmt->execute()) {
                    echo "User registered successfully!";
                    header("Location: authent.php");
                    exit();
                } else {
                    echo "Error registering user.";
                }
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    echo "Username or email already exists!";
                } else {
                    echo "Error: " . $e->getMessage();
                }
            }
            }

    }
 }
    
    ?>