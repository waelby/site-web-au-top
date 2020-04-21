<?php
include_once '../config.php';
class Produit
{
	private $id_produit,$description,$prix,$quantite,$nom,$categorie,$marque;

	public function __construct($description,$prix,$quantite,$nom,$categorie,$marque)
			{
				
				
				$this->description=$description;
				$this->prix=$prix;
				$this->quantite=$quantite;
				$this->nom=$nom;
				$this->categorie=$categorie;
                $this->marque=$marque;
                
                
				
			}

	public function get_idproduit()
	{
		return $this->id_produit;
	}
	public function get_nom()
	{
		return $this->nom;
	}
	public function get_description()
	{
		return $this->description;
	}
	public function get_prix()
	{
		return $this->prix;
	}
	public function get_quantite()
	{
		return $this->quantite;
	}
	public function get_categorie()
	{
		return $this->categorie;
	}
    public function get_marque()
    {
        return $this->marque;
    }
    /*public function get_forme()
    {
        return $this->forme;
    }
    public function get_couleur()
    {
        return $this->couleur;
    }
	/*public function get_date_ajout()
	{
	date_default_timezone_get('GMT');
	$time=date("d-m-Y H:i:s");
		return $time;
	}*/


	public function set_idproduit($val)
	{
		$this->id_produit=$val;
	}
		public function set_description($val)
	{
		$this->description=$val;
	}
		public function set_prix($val)
	{
		$this->prix=$val;
	}
		public function set_quantite($val)
	{
		$this->quantite=$val;
	}




}


?>