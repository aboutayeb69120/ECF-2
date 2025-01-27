<?php
session_start();

include_once('./connexion.php');

if(isset($_SESSION['id_participant'])){
   $id_participant = $_SESSION['id_participant'];  


$current_date = date('Y-m-d');  

try {
    // Requête SQL pour récupérer les événements associés à l'utilisateur
    $stmt = $bdd->prepare("SELECT `id_events`, `event_name`, `event_date`, `description`, `id_participant` FROM `events` WHERE `id_participant` = :id_participant");
    $stmt->bindParam(':id_participant', $id_participant, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();  // Si une erreur survient, on arrête l'exécution du script
}
}else{
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Événements</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="./index.php" class="nav-link"><i class="fas fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./myevents.php">Mes événements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./event.php">Ajouter un événement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <a href="./logout.php" class="btn btn-primary logout">Se déconnecter</a>
        </div>
    </div>
</nav>

<section class="event">
    <?php if(isset($_SESSION['id_participant'])){
    while ($event2 = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="card" style="width: 18rem; margin-bottom: 15px;">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($event2['event_name']); ?></h5>
                <p class="card-text">Date : <?= htmlspecialchars($event2['event_date']); ?></p>
                <p class="card-text"><?= htmlspecialchars($event2['description']); ?></p>
                <a href="./deleteevent.php?id=<?= $event2['id_events']; ?>" class="btn btn-danger">Supprimer <i class="fa-solid fa-trash"></i> </a> 
                <br> 
                
            </div>
        </div>
    <?php endwhile; 
    }?>
</section>
   



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
