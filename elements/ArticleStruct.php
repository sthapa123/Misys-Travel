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
	private $gen_description;
	private $day_description; 
	private $parent_subM_Ref;
	private $page_Ref_Id; 
	
	public function __construct($req_id, $req_offer_title, $req_route, $req_gen, $req_day,
			                    $req_parent, $req_page)
	{ 
		$this->id = $req_id;
		$this->offer_title = $req_offer_title;
		$this->route = $req_route;
		$this->gen_description = $req_gen;
		$this->day_description = $req_day;
		$this->parent_subM_Ref = $req_parent;
		$this->page_Ref_Id = $req_page;
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
	
	public function getGenDescription()
	{
		return $this->gen_description;
	}
	
	public function getDayToDayDescription()
	{
		return $this->day_description();
	}
	
	public function getParentRef()
	{
		return $this->parent_subM_Ref;
	}
	
	public function getPageRefId()
	{
		return $this->page_Ref_Id;
	}
}