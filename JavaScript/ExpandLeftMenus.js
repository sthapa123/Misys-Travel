/*$(window).load(function() {  
  var uls = document.getElementsByClassName("submenus");
  for(i = 0; i< uls.length;i++)
	$(uls[i]).each(function() { optionTexts.push($(this).text()) });
});
*/
$('.options > ul > li').click(function() {
  $('.options li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('.options ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});