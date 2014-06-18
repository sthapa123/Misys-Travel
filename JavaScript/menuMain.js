/**
 * Script to make the current page selected on the main menu to be highlighted
 * Author: Konstantin Grigorov
 * Last Modified: 17.06.2014
 */
//short had for document ready event
$(function () {
    setNavigation();
});

function setNavigation() {
	//get current URL
    var path = document.URL;

    $(" #menuMain a").each(function () {
    	//get hyperlink from a tag
        var href = $(this).attr('href');
        if (path.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
        }
    });

