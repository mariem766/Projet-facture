<?php
require_once '../../model/connect.php';
require "nav.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/accueilfact.css">
    <title>Accueil facture</title>
</head>
</html>

<body>
   

      <div class="container">
          <div>
           
          </div>
          
         <a href="facture.php" type="button" class="btn btn-primary btn-lg p-4 m-3">Prepare une facture</a>
         <a href="client.php" type="button" class="btn btn-secondary btn-lg py-4 m-3">Clients</a>
         <a href="avoir.php" type="button" class="btn btn-success btn-lg py-4 m-3">Avoirs</a>
      </div>
      

   
</body>

</html>