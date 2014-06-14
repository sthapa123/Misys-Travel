<?php
  class htmlPage 
  {
  	
  private function topofPage() {
   echo "<html>";
  }
  
  private function headOpenTag() {
  	echo "<head>";
  }
  
  private function headContents() {
  	echo "<meta ....>";
  }
  
  private function headCloseTag() {
  	echo "</head>";
  }
  
  private function bodyOpenTag() { 
  	echo "<body>";
  }
  
  private function bodyContents() 
  {
  	echo "  ";
  }

  private function bodyCloseTag() {
  	echo "</body>";
  }
  
  private function htmlCloseTag() {
  	echo "</html>";
  }
  
  public function __construct() {
  	topPage();
  	headOpenTag();
  	headContents();
  	headCloseTag();
  	bodyOpenTag();
  	bodyContents();
  	bodyCloseTag();
  	htmlCloseTag();
  }
}
?>