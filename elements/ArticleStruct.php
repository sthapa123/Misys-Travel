<?php

/*
 * This class represents an article as it appears in database table ex_articles
 * 
 * Author: Yordan Yordanov 
 * Last Modified: 20-06-2014
 */

class ArticleStruct
{
	private $id; 
	private $offer_title;
	private $route;
	private $image;
	private $price;
	private $gen_description;
	private $day_description; 
	private $offerBox_Ref;
	private $page_Ref_Id; 
	
	public function __construct($req_id, $req_offer_title, $req_route, $req_price,
			                    $req_image, $req_gen, $req_day, $req_box)
	{ 
		$this->id = $req_id;
		$this->offer_title = $req_offer_title;
		$this->route = $req_route;
		$this->price = $req_price;
		$this->image = $req_image; 
		$this->gen_description = $req_gen;
		$this->day_description = $req_day;
		$this->offerBox_Ref = $req_box;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getOfferTitle()
	{
		return $this->offer_title;
	}
	
	public function getRoute()
	{
		return $this->route;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getImage()
	{
		return "./articles/" . $this->id . "/" . $this->image;
	}
	
	public function getGenDescription()
	{
		return "./articles/" . $this->id . "/" . $this->gen_description;
	}
	
	public function getDayToDayDescription()
	{
		return "./articles/" . $this->id . "/" . $this->day_description;
	}
	
	public function getOfferBox_Ref()
	{
		return $this->offerBox_Ref;
	}
	
	public function getPageRefId()
	{
		return $this->page_Ref_Id;
	}
}