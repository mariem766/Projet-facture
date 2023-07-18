<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/style.css">
    <title>Société</title>
</head>
<body>
 <?php 
 session_start();
   if (isset($_POST['submit'])){
     if(!empty($_POST['email']) AND !empty(['password'])) {
         $email=$_POST['email'];
         $pass= $_POST['password'];
          require_once '../../model/connect.php';
            $reponse = $bdd->prepare("SELECT * FROM societe WHERE email = ? AND password = ? ");
            $reponse ->execute(array($email, $pass));
            if($reponse->rowCount() > 0){
             $_SESSION['email'] = $email;
             $_SESSION['password'] = $pass;
             $_SESSION['id'] = $reponse->fetch()['id'];
             header('location: accueilfacture.php');
            }else{
              echo "Identifiant ou mot de passe incorrecte";
            }
     }else{
       echo " Veuillez completer les champs..."; 
     }
    }    
       
  ?>
  
 
     <div class="container  py-5"> 
            <form class="row g-3 center" action="" method="post">
            <h1>Connexion</h1>
            <div class="dropdown-divider border-warning color-blue"></div>
            <br>
            <div class="col-auto">
                <label for="inputEmail2" class="visually-hidden">*</label>
                <input type="email" name= "email" class="form-control" id="email" placeholder="Email" >
            </div>
            <br>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">*</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password">
            </div>
            <div class="col-auto">
               <button type="submit" name="submit" class="btn btn-primary mb-3">Se connecte</button> 
            </div>
            </form>
        </div>
        

</body>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>