<?php
session_start();
include_once('./connexion.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $event_name = $_POST['id_events'];
    $sql = "DELETE FROM `events` WHERE `id_events` = :id_events";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id_events', $id_events, PDO::PARAM_INT);

    if($stmt->execute()){
        echo "L'événement a été supprimé avec succès.";
        header('Location: myevents.php');   
        exit(); 

    }else{
        echo "Erreur : " . $stmt->errorInfo();
    }
} else {
    echo "Aucun identifiant d'événement n'a été fourni.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="./css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>