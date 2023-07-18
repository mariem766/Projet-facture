<?php require_once '../../model/connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $reponse = $bdd->query("UPDATE client SET nom = '$nom', prenom = '$prenom', adresse= '$adresse' WHERE id= $id");
        header("location:client.php");
    }


    $reponse = $bdd->query("SELECT * FROM client WHERE id=$id ");
    $donnees = $reponse->fetch();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../asset/style.css">
    <title>client</title>
</head>
<body>
      <h1>Formulaire de modification :</h1>
        <div class="container">
            <form class="row g-3" action="updateclient.php?id=<?php echo $id;?>" method="post">
            <div class="col-auto">
                <label for="inputName2" class="visually-hidden">*</label>
                <input type="text" name= "prenom" class="form-control" id="prenom" placeholder="Prénom" value="<?php echo $donnees['nom'];?>">
            </div>
            <br>
            <div class="col-auto">
                <label for="inputEmail2" class="visually-hidden">*</label>
                <input type="text" name= "nom" class="form-control" id="nom" placeholder="Nom" value="<?php echo $donnees['prenom'];?>">
            </div>
            <br>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">*</label>
                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse" value="<?php echo $donnees['adresse'];?>">
            </div>
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-success mb-3">Modifier</button>
            </div>
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Retour</button>
            </div>
            </form>
        </div>
</body>
</html>