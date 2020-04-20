<?php
include '../core/reclamationM.php';
   

   $var=new Reclamation($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email'],$_POST['telephone'],$_POST['pays'],$_POST['adresse1'],$_POST['adresse2'],$_POST['ville'],$_POST['region'],$_POST['code_postal'],$_POST['profession'],$_POST['produit'],$_POST['date_achat'],$_POST['notes'],$_POST['id_client']);
$var2=new ReclamationManage();
$var2->modifierreclamation($var,$_POST['id_client'],$_POST['id_reclamation']);
?>