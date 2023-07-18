function produit(){
   let quantite=document.getElementById("quantite").value;
   let puht=document.getElementById("puht").value;
   let mht=document.getElementById("mht");
   mht.value=parseInt(quantite)*(puht);

   let montantht=document.getElementById("montantht");
   montantht.value=parseInt(mht.value);

   
   let ttva=document.getElementById("ttva");
   ttva.value=parseInt(montantht.value)*(20/100);
   let tttc=document.getElementById("tttc");
   tttc.value=parseInt(montantht.value)+(montantht.value)*(20/100);
}


   let quantite=document.getElementById("quantite");
   let puht=document.getElementById("puht");
   let mht=document.getElementById("mht");
   
   quantite.addEventListener("change",produit,false);
   puht.addEventListener("change",produit,false);
   
   
   


