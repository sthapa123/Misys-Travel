<?php
/* 
 * Structure for offer box data. Upon construction, needs id, image link, and submenu id to
 * which it belongs. 
 * 
 * Later, when querying the ex_article table, offer title and offer price can be assigned
 * 
 * Author: Yordan Yordanov
 * Last Modified: 20-06-2014
 */
class OfferBoxStruct
{
	private $id;
	private $image_link;
	private $subM_Id;
	private $title;
	private $price;
	
	public function __construct($req_id, $req_image, $req_subM)
	{
		$this->id = $req_id;
		$this->image_link = $req_image;
		$this->subM_Id = $req_subM;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getImage()
	{
		return $this->image_link;
	}
	
	public function getSubM()
	{
		return $this->subM_Id;
	}
	
	public function setTitle($req_title)
	{
		$this->title = $req_title;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setPrice($req_price)
	{
		$this->price = $req_price;
	}
	
	public function getPrice()
	{
		return $this->price;
	}

}

?>