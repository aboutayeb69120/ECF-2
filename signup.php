<?php
 include_once('./connexion.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    if($password==$confpassword){
        echo "mot de passe ok!";

        $chek = "SELECT `email` FROM `participant` 
                WHERE `email` = :email";
        
        $chek = $bdd->prepare($chek);

        $chek -> bindParam(':email', $email, PDO::PARAM_STR);

        $chek->execute();

        if($chek->rowCount() > 0){
            echo "email existe déjà!";
            exit();
        }else{
            $passwordH = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `participant`( `name`, `email`, `password`) VALUES (:name, :email, :password)";
            $req = $bdd->prepare($sql);
            $req -> bindParam(':name', $name, PDO::PARAM_STR);
            $req -> bindParam(':email', $email, PDO::PARAM_STR);
            $req -> bindParam(':password', $passwordH, PDO::PARAM_STR);
    
            $req->execute();

            header('Location: login.php');
            
        }
    

    }else{
        echo "mot de passe incorrecte!";
    }



    // $sql = "INSERT INTO user (name, email, message) VALUES ('$name', '$email', '$message')";


   
}
 

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title> <link rel="stylesheet" href="./css/style.css">
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
    <div class="container d-flex justify-content-center">
        <h3 class="text-center">Signup </h3>

        <form action="signup.php" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="motdepasse">Mot de passe :</label>
            <input type="password" id="motdepasse" name="password" required><br><br>

            <label for="confmotdepasse">Confirmer le mot de passe :</label>
            <input type="password" id="confmotdepasse" name="confpassword" required><br><br>

            <input type="submit" value="S'inscrire">
        </form>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
 </body>
 </html>