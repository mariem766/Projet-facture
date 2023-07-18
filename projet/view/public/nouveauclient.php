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
    <title>client</title>
</head>
<body>
 
<?php 
  require "debug.php";?>
  <?php 
    
    if(!empty($_POST)){
        $errors=array();
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=projetfinal;charset=utf8','root','');
            }catch(Exception $e){
           die('Erreur : '.$e->getMessage());
           $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
       }

        if(empty($_POST['nom'])|| !preg_match('/^[a-z0-9_]+$/', $_POST['nom'])){
            $errors['nom']= "nom déjà utilisé";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM client WHERE nom=?');
            $reponse->execute([$_POST['nom']]);
            $user=$reponse->fetch();
            if($user){
                $errors['nom']= 'ce nom est déjà pris';
            }

        }

        if(empty($_POST['prenom'])|| !preg_match('/^[a-z0-9_]+$/', $_POST['prenom'])){
            $errors['prenom']= "Veillez renseigner un prenom";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM client WHERE prenom=?');
            $reponse->execute([$_POST['prenom']]);
            $user=$reponse->fetch();
            if($user){
                $errors['prenom']= 'ce prénom est déjà pris';
            }

        }

       /* if(empty($_POST['adresse'])|| !preg_match('/^[a-z0-9_]+$/', $_POST['adresse'])){
            $errors['adresse']= "Veillez renseigner votre adresse";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM client WHERE adresse=?');
            $reponse->execute([$_POST['adresse']]);
            $user=$reponse->fetch();
            if($user){
                $errors['adresse']= 'Adresse est déjà pris';
            }

        }*/
       

        if(empty($errors)){
           
            $reponse = $bdd->prepare("INSERT INTO client SET prenom = ?, nom = ?, adresse = ?");
            $reponse ->execute([$_POST['prenom'], $_POST['nom'], $_POST['adresse']]);
            header('location:client.php');
            die();
       }

    }
    
    
  ?>
      

        <div class="container  py-5">
            <form class="row g-3 center" action="" method="post">
            <h1>Nouveau client</h1>
                  <?php 
                     if(!empty($errors)):?>
                  <div class="alert alert-danger ">
                     <p>Veuillez remplire le formulaire</p>
                     <ul>
                         <?php foreach($errors as $error):?>
                         <li><?=$error; ?></li>
                         <?php endforeach?>
                     </ul>
                 </div>
                 <?php endif?>
            <div class="dropdown-divider border-warning color-blue"></div>
            <div class="col-auto">
                <label for="inputName2" class="visually-hidden">*</label>
                <input type="text" name= "prenom" class="form-control" id="prenom" placeholder="Prénom">
            </div>
            <br>
            <div class="col-auto">
                <label for="inputEmail2" class="visually-hidden">*</label>
                <input type="text" name= "nom" class="form-control" id="nom" placeholder="Nom">
            </div>
            <br>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">*</label>
                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse">
            </div>
            <div class="col-auto">
            <button type="submit" name="submit" class="btn btn-primary mb-3">Créer client</button> 
            </div>
            </form>
        </div>
        

</body>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>