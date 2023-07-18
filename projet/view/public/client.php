

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>client</title>
</head>
<body>
 <?php require '../../model/connect.php';?>
 <div class="dropdown-divider border-warning "></div>
 <div class="d-grid gap-2 d-md-flex justify-content-md-end">
 <a class="btn btn-primary"  href="nouveauclient.php" role="submit">Nouveau client </a>
  <a class="btn btn-danger" type="submit" href="accueilfacture.php">Fermer</a>
</div>
       <div class="dropdown-divider border-warning "></div>
        <section>
          <div class="container py-5">
               <div class="row">
                  <div class="col-lg-8 col-sm mb-5 mx-auto">
                    <h1>Liste des clients</h1>
                  </div>
              </div>
           


           
              <div class="dropdown-divider border-warning "></div>
             <div class="row">
                <div class="table-responsive" id="orderTable">
                    <table class="table table-striped">
                        <thead>
                           <tr class="ligneclient">
                              <th scope="col">id</th>
                              <th scope="col">Penom</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Adresse</th>
                          </tr>
                        </thead>
                        <tbody>
                             <tr class="ligneclient">
                                 <th scope="row"></th>
                                 <?php
                                   $reponse = $bdd->query("SELECT * FROM client");
                                   while($donnees = $reponse->fetch(PDO::FETCH_ASSOC)){
                                   echo '<tr>';
                                   echo '<td>'.$donnees['id'].'</td>';
                                   echo '<td>'.$donnees['prenom'].'</td>';
                                   echo '<td>'.$donnees['nom'].'</td>';
                                   echo '<td>'.$donnees['adresse'].'</td>';
                                   echo '<td><a href="listefacture.php?id='.$donnees['id'].'" class="fas fa-file-invoice text-success"> VIEW Facture</a></td>';
                                   echo '<td><a href="updateclient.php?id='.$donnees['id'].'" class="fas fa-edit text-info"></a></td>';
                                   echo '<td><a href="deleteclient.php?id='.$donnees['id'].'" class="fas fa-trash-alt text-danger"></a></td>';
                                   }
                                   
                                  ?>
                                  
                             </tr>
                         </tbody>
                    </table>
               </div>
             </div>
          </div>
        </section>
 </body>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>