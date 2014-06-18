/**
 * Script to make the current page selected on the main menu to be highlighted
 * Author: Konstantin Grigorov
 * Last Modified: 17.06.2014
 * toDo: line 15, string which is appended might need to be generated automatically
 */
//short had for document ready event
$(function () {
    setNavigation();
});

function setNavigation() {
	//get current URL
    var path = window.location.pathname;
    //remove final backslash
    path = path.replace(/\/$/, "");
    path = "http://localhost" + path
    path = decodeURIComponent(path);;

    $(" #menuMain a").each(function () {
    	//get hyperlink from a tag
        var href = $(this).attr('href');
        if (path.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
        }
    });
}