<?php
session_start();
 include_once('./connexion.php');


    session_unset();
    session_destroy();
     header('Location: index.php');
     exit();
 

 


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