/**
 * A program to calculate the height of the content part ot the site. 
 * Example: article height increases as the description in it increases.
 * Author: Konstantin Grigorov
 * Last Modified: 20.06.2014
 */

$(window).load(function() {
  var body = document.body,
  html = document.documentElement;

  var maxHeight = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );	
  console.log(maxHeight);
  var headerHeight = $("#header_image").outerHeight();
  console.log(headerHeight);
  var emptyTopHeight = $("#content_part").offset().top;
  console.log(emptyTopHeight);
  var newHeight = maxHeight; //- headerHeight;
  console.log(newHeight);
 $("#left_menu_and_content").css("height",newHeight+"px");
});
