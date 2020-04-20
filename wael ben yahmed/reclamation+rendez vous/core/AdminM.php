<?php

include "../entities/Admin.php";

class AdminManage
{
public function ajouterAdmin($admin) 
    {
        $db=config::getConnexion();
        
        $req="INSERT INTO `admin` (`nom`, `prenom` ,`pseudo`, `email`, `MotDePasse`,`type`) VALUES ( :nom, :prenom, :pseudo, :email, :motDePasse,1);";
      
        $sql=$db->prepare($req);
       // $sql->bindValue(':id',$admin->get_id());
        $sql->bindValue(':nom',$admin->get_nom());
        $sql->bindValue(':prenom',$admin->get_prenom());
        $sql->bindValue(':pseudo',$admin->get_pseudo());
        $sql->bindValue(':email',$admin->get_email());
        $sql->bindValue(':motDePasse',$admin->get_motDePasse());
      

        if($sql->execute())
        {
        	
            echo "<p style='text-align: center;'><img src='http://pluspng.com/imga-png/success-png-success-icon-image-23194-400.png' width='319' height='319' /></p>";
             echo "<h2 style='text-align: center;'><span style='color: #3BB54A;'><strong>Ajout avec succes</strong></span></h2>";
             header("Refresh:2;url=affichage-admin-back.php");
             exit;
         }
        else
        {
            echo "<p style='text-align: center;'><img src='https://cdn1.iconfinder.com/data/icons/smallicons-controls/32/614338-.svg-512.png' width='319' height='319' /></p>";
            echo "<h2 style='text-align: center;'><span style='color: #E2574C;'><strong>Erreur d'ajout !</strong></span></h2>";
            header("Refresh:2;url=ajouterAdmin.php");
            exit;
        }

        	
       
       
    } 
     public function afficherAdmins()
    {
        $db=config::getConnexion();
        $result ="SELECT * FROM Admin;";
        $sql=$db->query($result);
        return $sql;
       
    

    }
      public function supprimerAdmin()
    {
         $db=config::getConnexion();
        $sql=$db->prepare("DELETE FROM admin WHERE id= :id");
        $sql->bindValue(':id',$_GET ['id']);
        $sql->execute();

    }
public function modifierAdmin($admin,$id)
    {
       
       /* $sql=$db->prepare("UPDATE admin SET nom=:nom,prenom=:prenom,pseudo=:pseudo,email=:email,MotDePasse=:motDePasse,verifPass=:verifPass WHERE id=:id;");
        $sql->bindValue(':id',$_GET ['id']);
        $sql->bindValue(':cin',$admin->get_cin());
        $sql->bindValue(':nom',$admin->get_nom());
        $sql->bindValue(':prenom',$admin->get_prenom());
        $sql->bindValue(':pseudo',$admin->get_pseudo());
        $sql->bindValue(':email',$admin->get_email());
        $sql->bindValue(':motDePasse',$admin->get_motDePasse());
        $sql->bindValue(':verifPass',$admin->get_verifPass());
        
        $sql->execute();
        */
        $db =config::getConnexion();
       $sql="UPDATE admin SET nom=:nom,prenom=:prenom,pseudo=:pseudo,email=:email,MotDePasse=:MotDePasse WHERE id=$id";
       
       
        $req=$db->prepare($sql);

        $req=$db->prepare($sql);
      
  
        $req->bindValue(':nom',$admin->get_nom());
        $req->bindValue(':prenom',$admin->get_prenom());
        $req->bindValue(':pseudo',$admin->get_pseudo());
       $req->bindValue(':email',$admin->get_email());
       $req->bindValue(':MotDePasse',$admin->get_motDePasse());
     
       
        
        /*$req->bindValue(':idd',18);
        $req->bindValue(':id',18);
        $req->bindValue(':nom',"uauua");
        $req->bindValue(':prenom',"habha");
        $req->bindValue(':pseudo',"njan");
        $req->bindValue(':email',"lyes@firas.nizar");
        $req->bindValue(':MotDePasse',"yayaya");
        $req->bindValue(':verifPass',"yayayay");*/


  
        if ($req->execute())
        
        {
             header("Refresh:0;url=affichage-admin-back.php");
        }
        else 
        {
           echo "non";
        }
            
           // header('Location: index.php');
       // }
        /*catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }*/
        
    }
    function recupererAdmin($id)
    {
        $db = config::getConnexion();
        $sql="SELECT * from admin where id=$id";
        
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