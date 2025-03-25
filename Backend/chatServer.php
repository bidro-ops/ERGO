<?php



//include_once __DIR__ . "/../config/gestionSession.php"; 
include_once __DIR__ . "/../BDD/connexion.php"; 








include_once __DIR__ . "/infoProjectServer.php"; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = $_POST['message'];
    $iduser = $_SESSION['iduser']; 

    $insertMessage = $conn->prepare("INSERT INTO chat_messages (idproject, idsender, message) VALUES (:idproject, :idsender, :message)");
    $insertMessage->execute([
        ':idproject' => $project_id,
        ':idsender' => $iduser,
        ':message' => $message
    ]);

    
    header("Location: " . $_SERVER['PHP_SELF'] . "?project_id=" . $project_id);
    exit();
}


$getmessages = $conn->prepare("SELECT chat_messages.idsender, chat_messages.message, users.username, chat_messages.sendDate
 from chat_messages inner join 
users ON chat_messages.idsender = users.iduser 
WHERE chat_messages.idproject = :idproject
ORDER BY sendDate");
$getmessages->execute(['idproject' => $project_id]);

$fetchmessages = $getmessages->fetchAll(PDO::FETCH_ASSOC);


?>