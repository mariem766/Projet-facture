<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>bienvenue</title>
</head>
<style>
     *,*::after,*::after{
       box-sizing: border-box;
       margin: 0;
      padding: 0;
      outline: none;
  }
  body{
     height: 100vh;
     width: 100%;
     background: linear-gradient(rgba(0, 0, 0, .5),rgba(0, 0, 0, .1)), url('../asset/img/bienvenue.jpg');
     background-size:cover;
     background-position: center;
     padding:0 8%;
    }
  nav{
    display:flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 2px 0;
    border-radius: 90px;
    background-color: beige;
    
  }
  nav .logo{
    width: 60px;
    
  }
  nav .logo img{
    border-radius: 90px;
    height: 60px;
  }
  nav ul{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex: 1;
    padding-right: 40px;
    text-align: right;
    list-style: none;
  }
  nav ul li{
    margin: 10px 20px;
    
  }
  nav ul li a{
    padding: 10px 20px;
    margin: 10px 20px;
    text-decoration: none;
    margin-top: 0;
    color: white;
    font-size: 18px;
   
  }

p{
  color: white;

}


</style>

<body>
  <?php 
    require "nav.php";
  ?>
    
     <div>
       <p class="fs-1 text-center fw-bold light-text-emphasis">Simple facturation</p>
       <p class="fs-2 text-center">Commencer maintenant</p>
     </div>

     <div class="d-grid gap-2 col-6 mx-auto">
      <a href="accueilentreprise.php" class="btn btn-primary" type="button">S'inscrire</a>
   </div>
</div>
    
    
</body>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>