
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
    <title>Facture</title>
  </head>
  <body>
  <?php

use FontLib\Table\Type\head;

 require_once '../../model/connect.php';?>
  <?php 
    
     //Générer un numéro de facture basé sur la date
     $prefixeFacture = "FA";
     $dateFacture = date("Yd"); // Format de date : AAAAMMJJ
     $numeroAleatoire = rand(1,9); // Génère un nombre aléatoire à 4 chiffres
     $numeroFacture = $prefixeFacture . $dateFacture. $numeroAleatoire;
      
      if(isset($_POST['submit'])) {
         $numero=$_POST['numero'];
         $date= $_POST['date'];
         $client= $_POST['client_id'];
         $reference= $_POST['reference'];
         $designation= $_POST['designation'];
         $quantite= $_POST['quantite'];
         $puht= $_POST['puht'];
         $mth= $_POST['mht'];
         $montantht= $_POST['montantht'];
         $ttva= $_POST['ttva'];
         $tttc= $_POST['tttc'];   
         $reponse = $bdd->query("INSERT INTO facture (numero, date, client_id, reference, designation, quantite, puht, mht, montantht, ttva, tttc) VALUES ('$numero','$date','$client','$reference','$designation', '$quantite', '$puht', '$mth', '$montantht', '$ttva', '$tttc' )");
         //var_dump($reponse);
         header('location: accueilfacture.php');
         exit();
         
     }
     elseif (isset($_POST['btn2'])){
      header('location: accueilfacture.php');
      exit();
     }
?>
<?php 

?>

    <div class="dropdown-divider border-warning "></div>
    <div class="container  py-5">
       <form  class="row g-3 center" action="" method="post"> 
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
         <button class="btn btn-warning" type="submit" name="submit" id="submit" >Valider la facture</button>
         </div>
         <div class="col-auto">
           <label  class="visually-hidden">*</label>
           <input type="text" name="numero" class="form-control ms-2" value="<?php echo $numeroFacture;?> " readonly>
          </div>  

         <div class="col-auto">
             <label  class="visually-hidden">*</label>
             <input type="date" name="date" id="date"  class="form-control ms-4" placeholder="Date" >
         </div>

         <div class="col-auto">
           <select name="client_id" class="form-select" aria-label="Default select example" >
             <option >Selectionner un client</option>
                <?php
                                   $reponse = $bdd->query("SELECT * FROM client");
                                   while($donnees = $reponse->fetch(PDO::FETCH_ASSOC)){
                                   echo '<option>';
                                   echo '<option>'.$donnees['id'] . " ". $donnees['prenom'] ." ". $donnees['nom'].'</option>';
                                   }
                                  ?>
             
              </option>
           </select>
         </div>
         <table class="table table-striped">
            <tr>
                <td>Reférence</td>
                <td>Désignation</td>
                <td>Quantité</td>
                <td>P.U.HT</td>
                <td>M.HT</td>
            </tr>
            <tr>
                <td><input type="text" name="reference" id="reference" ></td>
                <td><input type="text" name="designation" id="designation" ></td>
                <td><input type="text" name="quantite" class="element" id="quantite" ></td>
                <td><input type="text" name="puht" class="element" id="puht" ></td>
                <td><input type="text" name="mht" id="mht"></td>
            </tr>
          
            <tr>
                <td>
                <div class="row center">
                    <div class=" input-group mb-3 " >
                      <span class="input-group-text">HT</span>
                      <input type="text" name="montantht" id="montantht" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" >TVA</span>
                      <input type="text" name="ttva" id="ttva" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" >TTC</span>
                      <input type="text" name="tttc" id="tttc" class="form-control">
                    </div>
                </div>
                </td>
            </tr>
        </table>
        <div class="d-grid gap-2 col-4 mx-auto">
          <button class="btn btn-success me-md-2" type="submit" id="submit" name="submit" >Enrigistrer</button>
          <button class="btn btn-danger" type="submit" name="btn2">Fermer</button>
          
        </div>
      </form>
    </div>
  </body>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="../../controllers/script.js"></script>
  </html>
