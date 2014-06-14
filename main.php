<?php
  class htmlPage 
  {
  	
  private topPage() {
   echo "<html>";
  }
  
  private headOpenTag() {
  	echo "<head>";
  }
  
  private headContents() {
  	echo "<meta ....>";
  }
  
  private headCloseTag() {
  	echo "</head>";
  }
  
  private bodyOpenTag() { 
  	echo "<body>";
  }
  
  private bodyContents() 
  {
  	echo "  ";
  }

  private bodyCloseTag() {
  	echo "</body>"
  }
  
  private htmlCloseTag() {
  	echo "</html>";
  }
  
  public __construct() {
  	topPage();
  	headOpenTag();
  	headContents();
  	headCloseTag();
  	bodyOpenTag();
  	bodyContents();
  	bodyCloseTag();
  	htmlCloseTag();
  }
?>