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
  
  require 'menuMain.php';
  
  abstract class htmlPage 
  {
  // This function sets the document to be HTML 5 file and opens the <html> tag
  private function topPage() {
    echo "<!DOCTYPE html>\n";
    echo "<html lang=\"bg\">\n";
    echo '<link href="styles/menuMain.css" rel="stylesheet">';
  }
  
  // This just opens the head
  private function headOpenTag() {
  	echo "<head>\n";
  }
  
  // Things to put in the head part of the document - title, meta tags, scripts
  // argument $tit - required page name
  private function headContents($tit) {
  	// sets the page title
  	$this->titlePage($tit);
  	
  	// meta information: authors, keywords and description of the website, encoding
  	echo "<meta name=\"author\" contents=\"Konstantin Grigorov, Yordan Yordanov\">\n";
  	echo "<meta name=\"description\" contents=\"Website of MissyTravel agency\">\n";
  	echo "<meta name=\"keywords\" contents=\"holidays\">\n";
  	echo "<meta charset=\"UTF-8\">";
  	
  	// stylesheets
  	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/basic.css\">\n"; 
  	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/menuMain.css\">\n";
  	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/orhboxes.css\">\n";
  }
  
  // Closes the <head> tag
  private function headCloseTag() {
  	echo "</head>\n";
  }
  
  // Sets the title of the page
  private function titlePage($tit) {
  	echo "<title>" . $tit . "</title>\n";
  }
  
  // Opens the body tag --- this function is probably to be modified in the nearest future for more functionality
  private function bodyOpenTag() { 
  	echo "<body>\n";
  }
  
  // The body part
  private function bodyContents() 
  {
  	// Basic page division ---------------------------------------------------------------
  	echo "<div id=\"top_blue_gradient\"> </div> \n";
  	echo "<div id=\"under_top_gradient\"> \n";
  	echo "<div id=\"left_side_gradient\"> </div> \n";
  	
  	// this is the area inside the "blue borders"
  	echo "<div id=\"content_part\"> \n";
  	
  	// image header
  	echo "<div id=\"header_image\"> <img src=\"../img/header.png\"> </div> \n";
  	
  	//horizontal menu
  	echo "<div id=\"hor_Menu\">\n";
  	$menuTop = new menuMain();
  	echo "</div>\n"; // hor_Menu 
  	
  	// the area below the horizontal menu, combining the left menu and actual page contents
  	echo "<div id=\"left_menu_and_content\">\n";
  	
  	// the left menu; calling function to get its content
  	echo "<div id=\"left_menu\">\n";
  	$this->insLeftMenu();
  	echo "</div>\n";
  	
  	// actual page content; using function to get it
  	echo "<div id=\"content\"> \n";
  	$this->insContent(); 
  	echo "</div>\n";
  	
  	echo "</div>\n"; // left_menu_and_content;
  	
  	echo "</div>\n"; // content_part
  	
  	echo "<div id=\"right_side_gradient\">   </div> \n";
  	echo "</div>";
  	echo "<div id=\"bottom_gradient\"> </div>";
  }
  
  // Putting contents in left menu area
  // This function will be overriden by every child in order to determine what to printout
  public function insLeftMenu()
  {
  	echo "main class";
  }
  
  // Putting contents in left menu area
  // This function will be overriden by every child in order to determine what to printout
  public function insContent()
  {
  	echo "main class";
  }
  // closes the body
  private function bodyCloseTag() {
  	echo "</body>\n";
  }
  
  // Closes the html tag
  private function htmlCloseTag() {
  	echo "</html>\n";
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
