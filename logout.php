<?php
session_start();
 include_once('./connexion.php');

 if(isset($_POST['logout'])){
    session_unset();
     session_destroy();
     header('Location: index.php');
     exit();
 }

 


 ?>