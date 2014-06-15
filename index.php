<?php
  include 'main.php';
  class indexPage extends htmlPage
  {
    public function __construct() {
  	parent::__construct();
  }
	
  	protected function bodyContents() {
  		echo "<B> This is the index page </B>";
  	}
  }
  
  $index_page = new indexPage();
?>