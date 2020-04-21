<?php
include_once "../config.php";
class cartefidelite
{
private $id_client,$codePromo,$achat,$pourcentage;

function __construct($id_client,$codePromo,$achat,$pourcentage)
    {
		$this->id_client=$id_client;
        $this->codePromo=$codePromo;
        $this->achat=$achat;
        $this->pourcentage=$pourcentage; 
    }
 public function get_id_client() 
    {
        return $this->id_client;}

    public function get_codePromo() 
    {
        return $this->codePromo;
    }   
    public function get_achat() 
    {
        return $this->achat;
    }   
     public function get_pourcentage() 
    {
        return $this->pourcentage;
    }   
    
     public function set_id_client($id_client) 
    {
         $this->id_client=$id_client;
    }  
        
    public function set_codePromo($codePromo) 
    {
         $this->codePromo=$codePromo;
    }   
    public function set_achat($achat) 
    {
         $this->achat=$achat;
    }  
    public function set_pourcentage($pourcentage)  
    {
    	$this->pourcentage=$pourcentage;
    }
    
}




?>