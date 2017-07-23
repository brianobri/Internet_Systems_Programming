//	User ID is present
function chkid(donotprint)
{
	var myid = document.getElementById("myid"); 
	var theid = myid.value;
	if (theid !== "")
    	{
    		return true;
    	}
    	else
    	{
    		document.getElementById("myid").style.borderColor = "red";
		if (donotprint)
		{
    			alert("id needs to be present");
   		}
 		return false;
    }
}



// 	First name and last name must have the first letter as capital
function chkfname(donotprint)
{
	var myfname = document.getElementById("myfname"); 
	var thefname = myfname.value.substr(0,1).search(/^[A-Z]$/);
    	if(!thefname)
    	{
    		return true;
    	}
    	else
    	{
    		document.getElementById("myfname").style.borderColor = "red";
		if (donotprint)
		{
    			alert("First name needs a captial at the start");
   		}
 		return false;
    }
}


// 	First name and last name must have the first letter as capital
function chklname(donotprint)
{
	var mylname = document.getElementById("mylname"); 
	var thelname = mylname.value.substr(0,1).search(/^[A-Z]$/);
    	if(!thelname)
    	{
    		return true;
    	}
    	else
    	{
    		document.getElementById("mylname").style.borderColor = "red";
		if (donotprint)
		{
    			alert("Last name needs a captial at the start");
   		}
 		return false;
    }
}


//  Email address is present and of the proper form (asdf@asdf.abc)
function chkemail(donotprint)
{
	var myemail = document.getElementById("myemail"); 
	var theemail= myemail.value.search(/^\w+@\w+.\w+$/);
	if(!theemail)
	{
		return true;
	}
	else
	{
		document.getElementById("myemail").style.borderColor = "red";
		if (donotprint)
		{
			alert("email needs to be present and of the proper form (asdf@asdf.abc)");
		}
		return false;
	}
}


// 	Phone is present and of the proper form (123-123-1234)
function chkphone(donotprint)
{
	var myphone= document.getElementById("myphone"); 
	var thephone = myphone.value.search(/^\d{3}-\d{3}-\d{4}$/);
	if(!thephone)
	{
		return true;
	}
	else
	{
		document.getElementById("myphone").style.borderColor = "red";
		if (donotprint)
		{
			alert("phone number needs to be present and of the proper form (123-123-1234)");
		}
		return false;
	}
}


// 	Street must be present
function chkstreet(donotprint)
{
	var mystreet= document.getElementById("mystreet"); 
	var thestreet = mystreet.value;
	if(thestreet !== "")
	{
		return true;
	}
	else
	{
		document.getElementById("mystreet").style.borderColor = "red";
		if (donotprint)
		{
			alert("street needs to be present");
		}
		return false;
	}
}


//	City must have the first letter capitalized
function chkcity(donotprint)
{
	var mycity = document.getElementById("mycity"); 
	var thecity = mycity.value.substr(0, 1).search(/^[A-Z]$/);
    	if(!thecity)
    	{
    		return true;
    	}
    	else
    	{
    		document.getElementById("mycity").style.borderColor = "red";
		if (donotprint)
		{
    			alert("City name needs a captial at the start)");
   		}
 		return false;
    }
}


// 	State must be 2 character state, capitalized, validate that it is a real state
function chkstate(donotprint)
{
	var mystate = document.getElementById("mystate"); 
	var thestate = mystate.value.search(/^[A-Z]{2}$/);
    	if(!thestate)
    	{
    		return true;
    	}
    	else
    	{
    		document.getElementById("mystate").style.borderColor = "red";
		if (donotprint)
		{
    			alert("state needs to be 2 captial letters ");
   		}
 		return false;
    }
}

//	Zip must be only digits, limited to 6 digits
function chkzip(donotprint)
{
	var myzip= document.getElementById("myzip");
	var thezip = myzip.value.search(/^\d{6}$/);
  	if((!thezip))
	{
   		 return true;     
	}
	else
	{
    		document.getElementById("myzip").style.borderColor = "red";
		if (donotprint)
		{
  			  alert("Zip needs to be 6 digits long");
		}
  		return false;
   	 }
}



// 	Date Added is present and of the proper form (01/01/1971), manual entry of date
function chkdate(donotprint)
{
	var myda= document.getElementById("mydate");
	var thedate = myda.value.search(/^\d{2}\/\d{2}\/\d{4}$/);
  	if((!thedate))
	{
   		 return true;     
	}
	else
	{
    		document.getElementById("mydate").style.borderColor = "red";
		if (donotprint)
		{
  			  alert("Date needs to be present and of the proper form (01/01/1971, manual entry of date)");
		}
  		return false;
   	 }
}







function chkeverything()
{
	
alert("here");
}

