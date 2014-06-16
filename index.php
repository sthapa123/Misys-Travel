<?php
  include 'main.php';
  
  class indexPage extends htmlPage
  {
    public function __construct($title) {
  	parent::__construct($title);
  }
	
  	protected function bodyContents() {
  		parent::bodyContents();
  		//echo "<B> This is the index page </B>\n";

  	}
  	
  }
  
  $index_page = new indexPage("Index page");
?>
