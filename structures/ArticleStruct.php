<?php

/*
 * This class represents an article as it appears in database table ex_articles
 * 
 * List of constructor arguments
 *   $req_id - id of the article
 *   $req_offer_title - title of the article
 *   $req_route - route 
 *   $req_duration - offer duration
 *   $req_price - price of the offer
 *   $req_image - name of the image file 
 *   $req_gen - general description file name
 *   $req_day - day by day description file name
 *   $req_pri - price info file name
 *   
 * Author: Yordan Yordanov 
 * Last Modified: 20-06-2014
 */

class ArticleStruct
{
	// fields------------------------------------------------------------------
	private $id; 
	private $offer_title;
	private $route;
	private $duration;
	private $image;
	private $price;
	private $gen_description;
	private $day_description;
	private $price_info; 
	private $path;
	//-------------------------------------------------------------------------
	
	public function __construct($req_id,
			                    $req_offer_title, 
			                    $req_route,
			                    $req_dur, 
			                    $req_price,
			                    $req_image,
			                    $req_gen,
			                    $req_day, 
			                    $req_pri)
	{ 
		$this->id = $req_id;
		$this->offer_title = $req_offer_title;
		$this->route = $req_route;
		$this->duration = $req_dur;
		$this->price = $req_price;
		$this->image = $req_image; 
		$this->gen_description = $req_gen;
		$this->day_description = $req_day;
		$this->price_info = $req_pri;
		
		// this will generate relative path for file searching
		$this->path = "./articles/" . $this->id . "/";
	}
	
	// Get functions ----------------------------------------------------------
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
	
	public function getDuration()
	{
		return $this->duration;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	// returns relative path to image
	public function getImage()
	{
		return $this->path . $this->image;
	}
	
	// returns relative path to general description file
	public function getGenDescription()
	{
		return $this->path . $this->gen_description;
	}
	
	// returns relative path to day by day description file
	public function getDayToDayDescription()
	{
		return $this->path . $this->day_description;
	}
	
	// // returns relative path to price info file
	public function getPriceInfo()
	{
		return $this->path . $this->price_info;
	}
}