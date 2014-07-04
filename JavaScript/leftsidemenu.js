



$(document).ready(function() {
    
   
	hideLevels();    

	
	var subM = getSubMenu();
	console.log(subM);

	
	$('.par-' + subM).show(); 
	
	/*
	$("#mid-2").on("click", function(event){
		window.location.assign("http://kolygri.eu/pages/Offers.php?menuId=2&subMenu=2");
		$(document).ready(function() {
		$(".par-2").toggle();
		});
	 	return false;
	});
	*/
});

function hideLevels()
{
	 var level_counter = 1;
		
	 while (true)
	 {
	   if ($(".level" + level_counter).length < 1) 
			break; 
	   else
	   {
		  $(".level" + level_counter).hide();
		  level_counter++;
	   }
	 }
}

function getSubMenu()
{
	var subM;
	var sPageURL = window.location.search.substring(1);
	var params = sPageURL.split('&');
	for (i = 0; i < params.length; i++)
	{
		var cur_par = params[i].split("=");
		if (cur_par[0] == "subMenu")
			subM = cur_par[1];
	}
	
	return subM;
}