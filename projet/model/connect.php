<?php 

   try{
      $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
      }catch(Exception $e){
     die('Erreur : '.$e->getMessage());
     $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
 
?>