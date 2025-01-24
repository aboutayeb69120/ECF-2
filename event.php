<?php
session_start();
 include_once('./connexion.php');
 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $id = $_SESSION['id_participant'];

    // Préparer la requête SQL pour insérer l'événement
    $sql = "INSERT INTO `events`(`event_name`, `event_date`, `description`, `id_participant`, `id_location`)
    VALUES (:event_name, :event_date ,:description, :id_participant, :id_location)";
            

    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':event_name', $titre,PDO::PARAM_STR);
    $stmt->bindParam(':description', $description,PDO::PARAM_STR);
    $stmt->bindParam(':event_date', $date,PDO::PARAM_STR);
    $stmt-> bindParam(':id_participant',$id ,PDO::PARAM_INT);
    $stmt->bindParam(':id_location', $lieu,PDO::PARAM_INT);
    $stmt->execute();
    // Exécuter la requête
    // if ($stmt->execute()) {
    //     echo "L'événement a été ajouté avec succès.";
    // } else {
    //     echo "Erreur : " . $stmt->error;
    // }
 
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>  <link rel="stylesheet" href="./css/style.css">
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

    <h1 class="text-center">Ajouter un événement</h1>
    <div class="container d-flex justify-content-center">
        <form action="event.php" classs="" method="POST">
            <label for="titre">Titre de l'événement:</label><br>
            <input type="text" id="titre" name="titre" required><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br><br>

            <label for="date">Date </label><br>
            <input type="date" id="date" name="date" required><br><br>

        
            <label for="lieu">Lieu:</label><br>
            <select name="lieu" id="lieu">
            <option value="">--Please choose an option--</option>
            <option value="1">Salle de Conférence</option>

            <input type="submit" value="Ajouter l'événement">
            <input type="submit" value="Supprimer l'événement">
        </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  

 </body>
 </html>