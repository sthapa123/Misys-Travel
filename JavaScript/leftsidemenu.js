function showMenu(level, parentId, show)
{
  level += 1; 
  
  var elems = document.getElementsByClassName("level" + level 
		                                      + " par-" + parentId);
  
  if (show)
  {
	  for (k = 0; k < elems.length; k++)
		  elems[k].style.display = "block";
  }
  else
  {
	  for (k = 0; k < elems.length; k++)
		  elems[k].style.display = "none";
  }

}


