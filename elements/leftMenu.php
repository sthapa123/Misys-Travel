<?php
/* This class represents a left-side menu
 * For now, has only name (in the orange head section and link
 * 
 *  Author Yordan Yordanov
 */
class leftMenu
{
	private $name; 
	private $link;
	private $id
	
	public function __construct($req_id, $req_name, $req_link)
	{
		$this->id = $req_id;
		$this->name = $req_name;
		$this->link = $req_link;
	}
	
	public function getName() 
	{
		return $this->name;
	}
	
	public function getLink()
	{
		return $this->link;
	}
	
	public function getId()
	{
		return $this->id;
	}
}

?>