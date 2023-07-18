<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf</title>
  <style>
    
     @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&family=Roboto+Condensed&display=swap');

    .societe{margin: 10px;
        width: 200px;
        height: 350px;
        position: relative;}
    .societe P {display: block;}   
    .societe span{
        display: block;
        float: right;
    }
    .numero{
        position: absolute;
        width: 60%;
        height: 10%;
        right: 0;
        top: 0;
    
       
    }
    .tabl{
        right: 10%;
        width: 80%;
        height:1%;
        padding: 20px;
        border-radius: 5px;
    }
    .client{
        display: block;
        position: absolute;
        text-align: center;
        top: 150px;
        right: 10%;
        width:40% ;
        height: 18%;
        font-size: 19px;
        border-radius: 3px;
        border: 1px solid #000;
        padding: 2px;
    
    }
    .client h4{
        font-size: 16px;
        display: block;
    }
    .end{
        width: 98%;
        height: 10%;
        display: flex;
        justify-content: space-between;
        margin: 10px;
        padding: 5px;
    
    }
    .minitab{
        width: 40%;
    } 
    .minitab table{
        width: 100%;
        border-radius: 20px;
        background: #ccc;
       
    }
    .minitab table, tr ,td {
        text-align: center;
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    .total{
        width: 40%;
        float:right;
        top:0;
     }
    .total table{
         width: 100%;
         height: 50%; 
         border: 2px solid #000;
         border-collapse: collapse; 
     }
    .total table tr td:first-child{
         font-weight: 600;
     }
     tfoot{
         border-top: 2px solid #000;
         background: #ccc;
         font-weight: 600;
     }
    </style>
</head>
<body>
   <?php require_once '../../model/connect.php';?>
  <div class="societe">
      <?php 
      $reponseSociete = $bdd->query("SELECT * FROM societe");
      $societe = $reponseSociete->fetch(PDO::FETCH_ASSOC);
        echo '<h4>'.$societe['nom'].'</h4>';
        echo '<h4>'.$societe['adresse'].'</h4>';
        echo '<P>Tél:'.' <span>'.$societe['tel'].'</span></P>';
        echo '<P>Capital:'.' <span>'.$societe['capital'].'</span></P>';
        echo '<P> SIRET:'.' <span>'.$societe['siret'].'</span></P>';
        echo '<P>N/Id CEE:'.' <span>'.$societe['cee'].'</span></P>';
       
     ?>   
 </div>
      <div class="numero">
           <table class="tabl">
                        <thead>
                           <tr>
                              <th>Facture N°</th>
                              <th>Date</th>
                              <th>Client</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $numero = $_GET['numero'];
                            $reponseFacture = $bdd->query("SELECT * FROM facture WHERE numero='$numero'");
                            $facture = $reponseFacture->fetch(PDO::FETCH_ASSOC);
                             echo '<tr>';
                             echo '<td>'.$facture['numero'].'</td>';
                             echo '<td>'.$facture['date'].'</td>';
                             echo '<td>'.$facture['client'].'</td>';
                           
                        ?> 
                        </tbody>
                        
           </table>  
        </div>
        <div class="client">
          <?php 
             $reponseClient = $bdd->query("SELECT client.nom,client.prenom,client.adresse,facture.id FROM Facture JOIN client on facture.client_id=client.id WHERE numero='$numero'");
             $client = $reponseClient->fetch(PDO::FETCH_ASSOC);
                echo '<h4>'.$client['nom'].'</h4>';
                echo '<h4>'.$client['prenom'].'</h4>';
                echo '<h5>'.$client['adresse'].'</h5>';
              
            ?>
        </div>
        
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                    <th>Réference</th>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>P.UHT</th>
                    <th>%REM</th>
                    <th>Remise HT</th>
                    <th>Montant HT</th>
                    <th>TVA</th>
                </thead>
                <tr>

                      <?php
                             echo '<tr>';
                             echo '<td>'.$facture['reference'].'</td>';
                             echo '<td>'.$facture['designation'].'</td>';
                             echo '<td>'.$facture['quantite'].'</td>';
                             echo '<td>'.$facture['puht'].'</td>';
                             echo '<td></td>';
                             echo '<td></td>';
                             echo '<td>'.$facture['montantht'].'</td>';
                             echo '<td>5</td>';
                        ?> 
                </tr>
        </table>
        <div class="end">
                 <table  class="minitab">
                        <thead>
                          
                              <th>code</th>
                              <th>base HT</th>
                              <th>Taux TVA</th>
                              <th>Montant TVA</th>
                          
                        </thead>
                        <tbody>
                        <?php
                             echo '<tr>';
                             echo '<td>5</td>';
                             echo '<td>'.$facture['montantht'].'</td>';
                             echo '<td>20,00</td>';
                             echo '<td>'.$facture['ttva'].'</td>';
                           
                        ?> 
                             
                            
                        </tbody>
                        
               </table> 
         </div>
         <div class="total">
         <table  border="1" cellpadding="5" cellspacing="0">
         <tr>
         <?php
                     echo '<tr>';
                     echo '<td>Total HT</td>';
                     echo '<td>'.$facture['montantht'].'</td>';
               
            ?> 
       </tr>
       <tr>
          
           <?php
                 
                     echo '<tr>';
                     echo '<td>Total TVA</td>';
                     echo '<td>'.$facture['ttva'].'</td>';
               
            ?> 
       </tr>
       <tr>
       <?php
                     echo '<tr>';
                     echo '<td>Total TTC</td>';
                     echo '<td>'.$facture['tttc'].'</td>';
               
            ?> 
       </tr>
       <tfoot>
          <tr>
          <?php
                     echo '<tr>';
                     echo '<td>NET A PAYER</td>';
                     echo '<td>'.$facture['tttc'].'</td>';
               
            ?> 
          </tr>
       </tfoot>
         </table>
      
     </div>
     <div class="text">
     <?php
                     echo '<p>Facture payable le '.'<span>'.$facture['date'].'</span> pour la somme de '.'<span>'.$facture['tttc']. 'Euros.</span></p>';
            ?> 
         
        </div>
</body>
</html>