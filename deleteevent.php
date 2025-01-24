<?php
session_start();
include_once('./connexion.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_events = $_POST['id_events'];
    $sql = "DELETE FROM `events` WHERE `id_events` = :id_events";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id_events', $id_events, PDO::PARAM_INT);

    if($stmt->execute()){
        echo "L'événement a été supprimé avec succès.";
        header('Location: myevents.php');   
        exit(); 

    }else{
        echo "Erreur : " . $stmt->error;
    }
}

?>