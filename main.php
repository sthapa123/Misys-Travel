<?php
  class htmlPage 
  {
  	
  protected function topPage() {
   echo "<html>";
  }
  
  protected function headOpenTag() {
  	echo "<head>";
  }
  
  protected function headContents() {
  	echo "<meta ....>";
  }
  
  protected function headCloseTag() {
  	echo "</head>";
  }
  
  protected function bodyOpenTag() { 
  	echo "<body>";
  }
  
  protected function bodyContents() 
  {
  	echo "  ";
  }

  protected function bodyCloseTag() {
  	echo "</body>";
  }
  
  protected function htmlCloseTag() {
  	echo "</html>";
  }
  
  public function __construct() {
  	$this->topPage();
  	$this->headOpenTag();
  	$this->headContents();
  	$this->headCloseTag();
  	$this->bodyOpenTag();
  	$this->bodyContents();
  	$this->bodyCloseTag();
  	$this->htmlCloseTag();
  }
} 
?>