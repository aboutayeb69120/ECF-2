<?php
session_start();
 include_once('./connexion.php');

 $particant_id = $_SESSION['id_participant'];

 $curent_date = date('Y-m-d');
 
 $stmt = $bdd->prepare("SELECT `event_name`, `event_date`, `description`, `id_participant` FROM `events` WHERE `id_participant` = :id_participant AND `event_date` = :curent_date");

 $stmt->bindParam(':id_participant', $particant_id, PDO::PARAM_INT);

 $stmt->bindParam(':curent_date', $curent_date, PDO::PARAM_STR);

 $stmt->execute();

 $events= $stmt->fetchAll(PDO::FETCH_ASSOC);

 
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myevents</title><link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            <form method="post">
              <button type="submit" name="Se déconnecter" class="logout">Se déconnecter</button>
            </form>
      
          </div>
        </div>
</nav>
      
         <section class="event">
         <?php foreach($events as $event): ?>
         <div class="card" style="width: 18rem;">
            <img src="./img/pexels-rahulp9800-3052307.jpg" class="card-img-top" alt="foule et des feux d'artifices">
            <div class="card-body">
            <h5 class="card-title">Concert</h5>
            <p class="card-text">Un concert qui déchire, une soirée inoubliable.</p>
            <a href="./event.php" class="btn btn-primary">Ajouter un événement</a>
         </div>
         </div>
         <div class="card" style="width: 18rem;">
            <img src="./img/pexels-anh-nguyen-517648218-30323393.jpg" class="card-img-top" alt="réunion de bureau">
            <div class="card-body">
            <h5 class="card-title">Présentation</h5>
            <p class="card-text">Présentation du nouveau produit avant la mise en marché.</p>
            <a href="./event.php" class="btn btn-primary">Ajouter un événement</a>
            </div>
         </div>
         <div class="card" style="width: 18rem;">
            <img src="./img/pexels-julian-v-293152-860227.jpg" class="card-img-top" alt="réunion de bureau">
            <div class="card-body">
            <h5 class="card-title">Au salon de l'innovation</h5>
            <p class="card-text">Salon de l'innovation technologique.</p>
            <a href="./event.php" class="btn btn-primary">Ajouter un événement</a>
            </div>
         </div>
         <?php endforeach; ?>
         </section>

     
 
 
   
  
 

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
 </body>
</html>