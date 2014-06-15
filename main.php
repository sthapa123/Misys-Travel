<?php
/* 		This class represents the basic structure of an html file. 
 * 	
 * 		Each function echoes the part of the html document stated. The functions are 
 * invoked by the constructor in the right order
 * 
 * 		This is to be inherited by all page classes.
 * 
 * Authors:		 	Yordan Yordanov, Konstantin Grigorov 
 * Last Modified: 	16 June 2014
 */

  class htmlPage 
  {
  // This function sets the document to be HTML 5 file ana opens the <html> tag
  protected function topPage() {
    echo "<!DOCTYPE html>\n";
    echo "<html lang=\"bg\">\n";
  }
  
  // This just opens the head
  protected function headOpenTag() {
  	echo "<head>\n";
  }
  
  // Things to put in the head part of the document - title, meta tags, scripts
  // argument $tit - required page name
  protected function headContents($tit) {
  	// sets the page title
  	$this->titlePage($tit);
  	// meta information: authors, keywords and description of the website, encoding
  	echo "<meta name=\"author\" contents=\"Konstantin Grigorov, Yordan Yordanov\">\n";
  	echo "<meta name=\"description\" contents=\"Website of MissyTravel agency\">\n";
  	echo "<meta name=\"keywords\" contents=\"holidays\">\n";
  	echo "<meta charset=\"UTF-8\">"; 
  }
  
  // Closes the <head> tag
  protected function headCloseTag() {
  	echo "</head>";
  }
  
  // Sets the title of the page
  private function titlePage($tit) {
  	echo "<title> " + $tit + "</title>\n";
  }
  
  // Opens the body tag --- this function is probably to be modified in the nearest future for more functionality
  protected function bodyOpenTag() { 
  	echo "<body>";
  }
  
  // The body part
  protected function bodyContents() 
  {
  	echo "  ";
  }
  
  // closes the body
  protected function bodyCloseTag() {
  	echo "</body>";
  }
  
  // Closes the html tag
  protected function htmlCloseTag() {
  	echo "</html>";
  }
  
  // Class constructor -- invokes the former functions in the correct order to produce a 
  // basic and valid HTML 5 document
  // argument &title - page title
  public function __construct($title) {
  	$this->topPage();
  	$this->headOpenTag();
  	$this->headContents($title);
  	$this->headCloseTag();
  	$this->bodyOpenTag();
  	$this->bodyContents();
  	$this->bodyCloseTag();
  	$this->htmlCloseTag();
  }
} 

?>