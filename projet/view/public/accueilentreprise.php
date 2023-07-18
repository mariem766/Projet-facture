<?php 
  require "debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/accueilEnt.css">
    <title>Inscription</title>
</head>
<?php
  
 
   // connection , verification et insertion
 

    if(!empty($_POST)){
        $errors=array();
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            }catch(Exception $e){
           die('Erreur : '.$e->getMessage());
           $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
       }

        if(empty($_POST['nom'])|| !preg_match('/^[ a-zA-Z 0-9_]+$/', $_POST['nom'])){
            $errors['nom']= "Veillez renseigner votre nom";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM societe WHERE nom=?');
            $reponse->execute([$_POST['nom']]);
            $user=$reponse->fetch();
            if($user){
                $errors['nom']= 'ce nom est déjà pris';
            }

        }

        if(empty($_POST['adresse'])|| !preg_match('/^[A-Z a-z 0-9_]+$/', $_POST['adresse'])){
            $errors['adresse']= "Veillez renseigner votre adresse";
        }

        if(empty($_POST['tel'])|| !preg_match('/^[0-9_]+$/', $_POST['tel'])){
            $errors['tel']= "Veillez renseigner un numero valide";
        }

        if(empty($_POST['capital']) || !preg_match('/^[0-9_]+$/', $_POST['capital'])){
            $errors['capital']= "Veillez renseigner votre capital";
        }

        if(empty($_POST['siret'])|| !preg_match('/^[A-Z a-z 0-9_]+$/', $_POST['siret'])){
            $errors['siret']= "Veillez renseigner votre siret";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM societe WHERE siret=?');
            $reponse->execute([$_POST['siret']]);
            $user=$reponse->fetch();
            if($user){
                $errors['siret']= 'Ce siret est déjà pris';
            }

        }

        if(empty($_POST['cee']) || !preg_match('/^[a-zA-Z 0-9_]+$/', $_POST['cee'])){
            $errors['cee']= "Veillez renseigner votre N/Id CEE";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM societe WHERE cee=?');
            $reponse->execute([$_POST['cee']]);
            $user=$reponse->fetch();
            if($user){
                $errors['cee']= 'Ce N/Id CEE est déjà pris';
            }

        }

        
        if(empty($_POST['email'])|| !filter_var($_POST['email'])){
            $errors['email']= "Veillez renseigner votre email";
        }else{
            $reponse=$bdd->prepare('SELECT id FROM societe WHERE email=?');
            $reponse->execute([$_POST['email']]);
            $user=$reponse->fetch();
            if($user){
                $errors['email']= 'Ce email est déjà pris';
            }

        }

        if(empty($_POST['password']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])){
            $errors['password']= "Veillez renseigner votre mot de passe";
        }
        if(empty($errors)){
           
                $reponse = $bdd->prepare("INSERT INTO societe SET nom = ?, adresse = ?, tel = ?, capital = ?, siret = ?, cee = ?, email = ?, password = ?");
               // $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
                //$confirm= str_random(50);
                $reponse ->execute([$_POST['nom'], $_POST['adresse'], $_POST['tel'], $_POST['capital'],  $_POST['siret'], $_POST['cee'], $_POST['email'], $_POST['password'] ]);
               header('location: accueilfacture.php');
               die();
        }
    }
    
 ?>

<body>
     
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
  <form action="" method="post">
    <div class="container">
        <div class="card">
            <h2>S'inscrire</h2>
            <div class="inputBox">
                <input type="text" name="nom" id="nom">
                <span>Nom societe</span>
            </div>
            <div class="inputBox">
                <input type="text" name="adresse" id="adresse"  >
                <span>Adresse</span>
            </div>
            <div class="inputBox">
                <input type="text" name="tel" id="tel"  >
                <span>Tél</span>
            </div>
            <div class="inputBox">
                <input type="text" name="capital" id="capital"  >
                <span>capital</span>
            </div>
            <div class="inputBox">
                <input type="text" name="siret" id="siret"  >
                <span>Siret</span>
            </div>
            <div class="inputBox">
                <input type="text" name="cee" id="cee"  >
                <span>N/Id CEE</span>
            </div>
            <div class="inputBox">
                <input type="email" name="email" id="email"  >
                <span>Email</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" id="password">
                <span>Mot de passe</span>
            </div>
            
            <button type="submit" name="submit">M'inscrire</button>
        </div>
    </div>
  </form>
</body>
</html>