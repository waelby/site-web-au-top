<?php
require '../entities/calendrier.php';

class CalendrierManage
{
   
    
  function afficherEvent()
  {
    $sql="SELECT id, title, start_event, end_event, color FROM events ";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
  }
   
}

?>