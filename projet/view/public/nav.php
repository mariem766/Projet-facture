<?php require "../layouts/head.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/nav.css">
  <title>Nav</title>
</head>

<div>
        <nav>
            <a href="" class="logo"><img src="../asset/img/Gold Modern Collection Logo (3).png" alt=""></a>
            <ul>
              <?php if (isset($_POST['password'])):?>
                  <li><a href="accueilfacture.php">Se déconnecter</a></li>
              <?php else: ?>
                  <li>
                      <a href="connectsociete.php"  class="btn btn-outline-warning" >se connecter</a>
                  </li>   
              <?php endif; ?> 
            </ul>
        </nav>
    </div>
</body>
</html>

