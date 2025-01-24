<?php
session_start();
 include_once('./connexion.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    
        $sql = "SELECT `id_participant`, `name`, `password` 
        FROM `participant` 
        WHERE `email` = :email";

        $check = $bdd->prepare($sql);

        $check->bindParam(':email', $email, PDO::PARAM_STR);

        $check->execute();

        $verify = $check->fetch(PDO::FETCH_ASSOC);

        if($verify){
            
            if(password_verify($password, $verify['password'])){
                echo "mot de passe ok!";
                $_SESSION['id_participant'] = $verify['id_participant'];
                $_SESSION['name'] = $verify['name'];
                
                header('Location: myevents.php');
            }     else{
            header('Location: signup.php');
                
            }
            }

        echo "compte créé avec succès!";

        exit();
       
    }

 

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title> <link rel="stylesheet" href="./css/style.css">
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
    
 <h2 class="text-center">Login</h2>
    <div class="container d-flex justify-content-center">
        <form action="login.php" method="POST">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Votre email sera confidentiel.</div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
 </body>
 </html>