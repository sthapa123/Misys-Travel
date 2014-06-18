<?php 
class ORHBox 
{
	public function __construct($title, $options)
	{
		echo "<div class=\"ORHBWrapper\">\n";
		echo "<div class=\"orangeBox\">\n";
		echo "<div class=orangeHead>";
		echo $title;
		echo "</div>\n"; // orangeHead
		echo "<div class=\"options\">";
		echo $options;
		echo "</div>\n"; // options
		echo "</div>\n"; //orangeBox
		echo "</div>\n"; // ORHBWrapper
		
	}
}

?>