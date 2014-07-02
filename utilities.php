<?php
/* 
 * This class provides/will provide functionality concerned with extracting and manipulat-
 * ing data, providing page features etc. It creates a connection with the database upon 
 * construction and closes it with the destructor. main.php has an protected instance of it
 * 
 * Author: Yordan Yordanov
 * Last Modified: 19.06.2014
 */

class Utilities
{
	// database connection
	private $s_query;
	
	// constructor establishes connection
	public function __construct()
	{
		$this->s_query = new selectQuery();
	}
	
	public function putMainMenu()
	{
		$menus = $this->s_query->selectMainMenu();
		
		//$num_menus = count($menus);
		
		new menuMain($menus);
	}
	
	// This function puts the Left side menus with its submenus on a given (as argument
	// page. To be used inside insLeftMenu() function in all pages with submenus
    public function putLeftSideMenus($ref_page)
    {
    	// Get names/titles of all available left side menus of that page
    	$menus = $this->s_query->selectLeftMenus($ref_page);
    	
    	// count them
    	$num_menus = count($menus);
    	
    	// for each of them, find all their subMenus and put them in orange head box
    	for ($i = 0; $i < $num_menus; $i++)
    	{
       		$sub = $this->s_query->selectSubMenus($menus[$i]->getId());
    		new ORHBox($menus[$i]->getName(), $sub);
    	}
    	/* Important note: $menus and $sub are and must be of types 
    	 * leftMenu and submenus respectively
    	 */

    }
    /*
     * This function gets all OfferBoxStructs available for given submenu id(as argument)
     * and puts it in OfferBoxes, printing them out
     */
    public function putOffers($subM_Id)
    {
    	// Get all children pubs associated with this sub menu to $all_offers
    	$all_offers = $this->seekChildren($subM_Id);
    	
    	// if there are none, assign only this sub menu id to $all_offers
    	if (count($all_offers) == 0)
    		$all_offers[0] = $subM_Id; 
    	
    	for ($k = 0; $k < count($all_offers); $k++)
    	{
    	  // get all OfferBox structs for a particular id
    	  $offers = $this->s_query->selectOfferBoxes($all_offers[$k]);
    	
    	  // count them
    	  $num_offers = count($offers);
    	
    	  // put each one of them in OfferBox
    	  for ($i = 0; $i < $num_offers; $i++)
    	  {
    		// Get all starting dates for current offer
    		$dates = $this->s_query->selectStartingDates($offers[$i]->getId());
    		
    		// Get first and last and make a string for the period
    		$period = "от " . $dates[0] . " до " . $dates[count($dates)-1];
    		
    		new OfferBox($offers[$i]->getTitle(),
    				     $period,
    				     $offers[$i]->getImage(),
    				     $offers[$i]->getPrice(), 
    				     "http://kolygri.eu/pages/ArticlePage.php?" .
    				     "menuId=" . $_GET['menuId'] .
    				     "&articleId=" . $offers[$i]->getId());
    	  }
    	}
    }
    
    private function seekChildren($parent)
    {
    	return $this->s_query->selectMenuChildren($parent);
    }
    
    public function putPublication($offer_id)
    {
    	$pub = $this->s_query->selectArticle($offer_id);
    	
    	$dates = $this->s_query->selectStartingDates($pub->getId());
    	
    	new Article($pub->getOfferTitle(),
    			    $pub->getRoute(),
    			    $pub->getDuration(),
    			    $dates,
    			    $pub->getPrice(),
    			    $pub->getImage(),
    				$pub->getGenDescription(),
    			    $pub->getDayToDayDescription(),
    			    $pub->getPriceInfo());
    }
}
?>