<?php

include_once '../config.php';


class CouponC
{


  function verifierCoupon($coupon)
  {

    $sql="SELECT * FROM clientfidele  WHERE codePromo='$coupon'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 

  }

function changervalidite($coupon)
{
 
   $sql = "UPDATE clientfidele SET validite=0 WHERE codePromo= '$coupon'";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        try{
            $req->execute();
           
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }



}




}





















?>