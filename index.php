<?php
 include_once('./connexion.php');


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <meta name="description" content= "platforme d'organisation d'événement en ligne">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

 </head>
 <body>
  <header>
    <div id="head-top">
      


    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div>
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
            <a href="./logout.php" class="btn btn-primary logout padding">Se déconnecter</a>
            
          </div>
      
          </div>
        </div>
    </nav>
      <div class="bouton-container d-flex justify-content-center" >
        <a href="./signup.php" class="btn btn-primary btn-lg">Créer un compte</a>
        <a href="./login" class="btn btn-primary btn-lg">Se connecter</a>
      </div>
  </header>




  <footer class="blockquote-footer text-center ">Events : organisez vos événements en un clique</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
 </html>