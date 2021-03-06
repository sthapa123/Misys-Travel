<?php 

class selectQuery
{
	private $dbConn; 
	
	public function __construct()
	{
		$this->dbConn = new mysqlConn;
	} 
	
    public function selectMainMenu()
    {
        $rs = $this->dbConn->selectFromQuery("mainMenu", "id, name");

        $menusFound = array();
        
        $counter = 0;
        
        $rs->data_seek(0);
        
        while ($row = $rs->fetch_assoc())
        {
        	$menusFound[$counter] = new MainMenuStruct($row["id"],
        			                                   $row["name"]);
        	$counter++;
        }
        
        return $menusFound;
    }
	
	/*
	 * This function retrieves which left side menus has a given page
	 * (as argument)
	 *
	 * Returns an array of subMenu structures
	 **/
	public function selectLeftMenus($pageRef)
	{
		/*
		 * Query
		 * SELECT id, subMenu FROM menus WHERE pageRef=$pageRef
		 */
		$rs = $this->dbConn->selectFromWhereQuery("menus", "id,subMenu",
				                                  "pageRef", $pageRef);
		 
		// array for the left side menus found
		$menusFound = array();
		 
		// Set starting position on first row found
		$rs->data_seek(0);
		// counts the rows ---- for the array
		$counter = 0;
		 
		// fetch every row, one by one, using column names as
		// reference and put it in th20e array
		while($row = $rs->fetch_assoc())
		{
			$menusFound[$counter] = new leftMenu($row['id'],
		                                	     $row['subMenu']);
			$counter++;
		}
		 
		// return result as an array of leftMenu structures
		return $menusFound;
	}
	
	/* This function retrieves all submenus of given left side menu of given page
	 * It requires the record id of that left side menu as an argument
	 *
	 * Returns all submenus found for that menu as an array of subMenus
	 * structures
	 */
	public function selectSubMenus($pageRefId)
	{
		/*
		 * Query
	     * SELECT id, label, parent, link FROM subMenus
		 * WHERE pageRefId=$pageRefId
		 */
		$rs = $this->dbConn->selectFromWhereQuery("subMenus", "id,label,parent",
												  "pageRefId", $pageRefId);
		
		/*
		 * Query to select the page reference
		 * SELECT pageRef FROM menus WHERE id = $pageRefId
		 */
		$rs_ref = $this->dbConn->selectFromWhereQuery("menus", "pageRef",
				                                      "id", $pageRefId);
		$menuId = $rs_ref->fetch_assoc(); 
		
		// Array for the submenus found
		$menusFound = array();
	
		// Set starting position on first row found
		$rs->data_seek(0);
		// counts the rows ---- for the array
		$counter = 0;
	
		// fetch every row, one by one, using column names as reference
		while($row = $rs->fetch_assoc())
		{
			$menusFound[$counter] = new subMenus($row['id'],
					                             $row['label'],
					                             $row['parent'],
					                             $menuId['pageRef']);
			$counter++;
		}
		 
		// return an array of subMenus (type!!!!)
		return $menusFound;
		 
	}
	
	/*
	 * This function gets all offer boxes' info from database with given
	 * submenu id.
	 *
	 * Returns array of OfferBoxStructs
	 */
	public function selectOfferBoxes($subM_Id)
	{
		/*
		 * Query
		 * SELECT id, image_link FROM offer_boxes
		 * WHERE subM_id=$subM_Id
		 */
		$rs = $this->dbConn->selectFromWhereQuery("offer_boxes", "id,image_link",
				                                  "subM_Id", $subM_Id);
		 
		// sets starting search position for fetched rows
		$rs->data_seek(0);
		 
		// will contain result of OfferBox structs
		$offersFound = array();
		 
		// counter for array current position in array
		$counter = 0;
		 
		// fetch all rows and assign them to the array
		while ($row = $rs->fetch_assoc())
		{
			$offersFound[$counter] = new OfferBoxStruct($row['id'],
					                                    $row['image_link'],
					                                    $subM_Id);
	
			$counter++;
		}
		 
		// once the box are fetched, get offer title and price from ex_article
		// table
		for ($i = 0; $i < $counter; $i++)
		{
		    /*
		     * Query
		     * SELECT offer_title, price FROM ex_articles
		     * WHERE id = $offersFound[$i]->getId()  // i.e.the curren offer's id
		     */
		     $rs2 = $this->dbConn->selectFromWhereQuery("ex_articles",
	 		                                            "offer_title,price",
			                                            "id",
			                                            $offersFound[$i]->getId());
			 // search at first position
			 $rs2->data_seek(0);
	
			 $row2 = $rs2->fetch_assoc();
			 $offersFound[$i]->setTitle($row2['offer_title']);
			 $offersFound[$i]->setPrice($row2['price']);
		}
		 
		return $offersFound;
	}
	
	/*
	 * This function seeks the children of a parent sub menus and 
	 * returns their ids as an array;
	 */
	public function selectMenuChildren($parent_Id)
	{
		$rs = $this->dbConn->selectFromWhereQuery("subMenus",
				                                  "id", 
				                                  "parent",
				                                  $parent_Id);
		
		$rs->data_seek(0);
		
		$ids = array();
		
		$counter = 0;
		
		while ($row = $rs->fetch_assoc())
		{
			$ids[$counter] = $row['id'];
			$counter++;
		}
		
		return $ids;
	}
	
	/*
	 * This function searches for all available starting dates of a offer
	 * (id given as an arg)
	 * Returns array of DateTime
	 */
    public function selectStartingDates($offer_Id)
	{
		/*
		 * Query
		 * SELECT startingDate FROM ex_starting_dates
		 * WHERE ex_articleId=$offer_id
		 */
		$rs = $this->dbConn->selectFromWhereQuery("ex_starting_dates",
				                                  "startingDate",
			                                      "ex_articleId",
				                                  $offer_Id);
		 
		// search position at 0
		$rs->data_seek(0);
			 
		// counter for the return array
		$counter = 0;
	
		//the array for results
		$datesFound = array();
			 
		// fetch results and assign them in the array
		while ($row = $rs->fetch_assoc())
		{
			$datesFound[$counter] = $row['startingDate'];
			$counter++;
		}
	
		return $datesFound;
	}
				 
	/*
 	 * This function selects an article from ex_articles by its id
	 *
	 * Returns it as AricleStruct
	 */
	
	public function selectArticle($id)
	{
	    /*
		 * Query
		 * SELECT offer_title, image, route, duration, day_by_day-desciption,
		 * price_Info FROM ex_articles WHERE id = $id
		 */
		$rs = $this->dbConn->selectFromWhereQuery("ex_articles",
				 						  "offer_title,image,route,duration," . //|
							              "price,gen_description," .            //|
						                  "day_by_day_description,price_Info",  //|
						                  "id", $id);
						 
		// search position zero
		$rs->data_seek(0);
								 
		// fetch article
		$row = $rs->fetch_assoc();
								 
		// put it in ArticleStruct
		$articleFound = new ArticleStruct($id,
										  $row["offer_title"],
						                  $row['route'],
					                      $row['duration'],
					                      $row['price'],
					                      $row['image'],
					                      $row['gen_description'],
					                      $row['day_by_day_description'],
					                      $row['price_Info']);
	
		return $articleFound;
					 
	}
	
}

?>