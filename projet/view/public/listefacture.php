<?php  require_once '../../model/connect.php';
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
    <title>liste facture</title>
</head>
<body>
<div class="dropdown-divider border-warning "></div>
             <div class="row">
                <div class="table-responsive" id="orderTable">
                    <table class="table table-striped">
                        <thead>
                           <tr>
                              <th scope="col">id</th>
                              <th scope="col">Numero facture</th>
                              <th scope="col">montant ht</th>
                              <th scope="col">tva</th>
                              <th scope="col">montant ttc</th>
                              <th scope="col">operations</th>
                          </tr>
                        </thead>
                        <tbody>
                             <tr>
                                 <th scope="row"></th>
                                 <?php
                                   $id = $_GET['id'];
                                   $reponse = $bdd->query("SELECT * FROM facture WHERE client_id=$id");
                                   while($donnees = $reponse->fetch(PDO::FETCH_ASSOC)){
                                    echo '<tr>';
                                    echo '<td>'.$donnees['client_id'].'</td>';
                                    echo '<td>'.$donnees['numero'].'</td>';
                                    echo '<td>'.$donnees['montantht'].'</td>';
                                    echo '<td>'.$donnees['ttva'].'</td>'; 
                                    echo '<td>'.$donnees['tttc'].'</td>';
                                ?>
                                   <td>
                                        <a target="_blank" href="gen.php?numero=<?= $donnees['numero'] ?>" class="btn btn-sm btn-primary"> 
                                        <i class="fa fa-file-pdf-o"></i> Mariam PDF</a>
                                   </td>
                                 
                                <?php 
                                  }
                                   
                                ?>
                             </tr>
                         </tbody>
                    </table>
               </div>
             </div>
</body>
</html>