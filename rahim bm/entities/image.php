<?php

class Images
{
	private $id_image,$url,$nom,$taille,$id_produit,$type/*,$produit_id*/;
	public function __construct(/*$id_image,*/$url,$nom,$taille,$id_produit,$type/*,$produit_id*/)
			{
				
				//$this->id_image=$id_image;
				$this->url=$url;
				$this->nom=$nom;
				$this->taille=$taille;
				$this->id_produit=$id_produit;
                $this->type=$type;
				//$this->produit_id=$produit_id;
				
			}


	public function get_idIm()
	{
		return $this->id_image;
	}
	public function get_url()
	{
		return $this->url;
	}
	public function get_nom()
	{
		return $this->nom;
	}
	public function get_taille()
	{
		return $this->taille;
	}
    public function get_type()
    {
        return $this->type;
    }

	public function set_nom($val)
	{
		$this->nom=$val;
	}

	
	


}

?>