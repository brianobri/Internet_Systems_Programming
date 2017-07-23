//Validate the following fields of your page/form before sending off the content to a server: (8 points)  
//Name is present and is of the form (capital first letter, first name, capital first letter of last name, last name, Ex: George Smith)
function chkname(donotprint)
{
	var name = document.getElementById("myname"); 
	var thename = name.value.search(/^[A-Z][a-z]+ ?[A-Z][a-z]+$/);
    	if(!thename)
    	{
    		return true;
    	}
    	else
    	{
    		document.getElementById("myname").style.borderColor = "red";
		if (donotprint)
		{
    			alert("name needs to be present and in the form (capital first letter, first name, capital first letter of last name, last name, Ex: George Smith)");
   		}
 		return false;
    }
}

//Password is present and at least 8 characters including at least one number
function chkpassword(donotprint)
{
	var pass= document.getElementById("mypass"); 
	var thepass= pass.value.search(/^\D{8}\D*\d+$/);
 	if(!thepass)
	{
		return true;
	}
        else
        {
   		document.getElementById("mypass").style.borderColor = "red";
    		if (donotprint)
		{
    			alert("Password needs to be present and at least 8 characters including at least one number");
		}
    		return false;
    	}
}

//e-mail address is present and of the proper form (asdf@asdf.abc) 
function chkemail(donotprint)
{
	var myem= document.getElementById("myemail"); 
	var theemail= myem.value.search(/^\w+@\w+.\w+$/);
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

//phone is present and of the proper form (123-123-1234)
function chkphone(donotprint)
{
	var myph= document.getElementById("myphone"); 
	var thephone = myph.value.search(/^\d{3}-\d{3}-\d{4}$/);
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

//address is present
function chkaddress(donotprint)
{
	var myad= document.getElementById("myaddress"); 
	var theaddress = myad.value;
	if(theaddress !== "")
	{
		return true;
	}
	else
	{
		document.getElementById("myaddress").style.borderColor = "red";
		if (donotprint)
		{
			alert("address needs to be present");
		}
		return false;
	}
}
 
//date is present and of the proper form (01/01/1971, should show the current date)
function chkdate(donotprint)
{
var today = new Date();
var day = today.getDate();
var month = today.getMonth()+1; 
var year  = today.getFullYear();

if(day < 10) 
{
    day = "0"+ day;
} 

if(month < 10)
{
    month = "0" + month;
} 

today = month + '/' + day + '/' + year; 
	var myda= document.getElementById("mydate");
	var thedate = myda.value.search(/^\d{2}\/\d{2}\/\d{4}$/);
  	if((!thedate) && (myda.value === today))
	{
   		 return true;     
	}
	else
	{
    		document.getElementById("mydate").style.borderColor = "red";
		if (donotprint)
		{
  			  alert("Date needs to be present and of the proper form (01/01/1971, should show the current date)");
		}
  		return false;
   	 }
}

//time is present and of the proper form (10:00 am) 
function chktime(donotprint)
{
	var myti= document.getElementById("mytime"); 
	var thetime = myti.value.search(/^\d{2}\:\d{2}$/);
	if(!thetime)
	{
		return true;
	}
	else
	{
		document.getElementById("mytime").style.borderColor = "red";
		if (donotprint)
		{
			alert("Time needs to be present and of the proper form (10:00 am) ");
		}
		return false;
	}
}

//numeric field is numeric, no alpha characters
function chknumeric(donotprint)
{
	var mynu= document.getElementById("mynumeric"); 
	var thenumeric = mynu.value.search(/^\d+$/);
	if(!thenumeric)
	{
		return true;
	}
	else
	{
		document.getElementById("mynumeric").style.borderColor = "red";
		if (donotprint)
		{
			alert("numeric needs to be present and no alpha characters ");
		}
		return false;
	}
}

function chkeverything()
{
	
var chkna = chkname(false);
var chkpa =chkpassword(false);
var chkem =chkemail(false);
var chkph =chkphone(false);
var chkad =chkaddress(false);
var chkda =chkdate(false);
var chkti =chktime(false);
var chknu =chknumeric(false);
if(!chkna || !chkpa || !chkem || !chkph || !chkad || !chkda || !chkti || !chknu )
{
alert("If false that line needs to be in proper form.\n" +
	"Name:     "+ chkna +"\n"+
	"Password: "+ chkpa +"\n"+
	"Email:    "+ chkem +"\n"+
	"Phone:    "+ chkph +"\n"+
	"Address:  "+ chkad +"\n"+
	"Date:     "+ chkda +"\n"+
	"Time:     "+ chkti +"\n"+
	"Numeric:  "+ chknu +"\n"
 );
}
}