<html>
<!--The ‘Add New User’ and ‘Edit User’ forms must have validation rules as follows:-->
<!--User ID is present-->
<!--First name and last name must have the first letter as capital-->
<!--Email address is present and of the proper form (asdf@asdf.abc)-->
<!--Phone is present and of the proper form (123-123-1234)-->
<!--Street must be present-->
<!--City must have the first letter capitalized-->
<!--State must be 2 character state, capitalized, validate that it is a real state-->
<!--Zip must be only digits, limited to 6 digits-->
<!--Date Added is present and of the proper form (01/01/1971), manual entry of date-->
<!--Validation is done when the user clicks on a Submit button and by the change/blur event. If an error is found, the input field that contains the invalid value(s) will change the border of the input field to color ‘red’.  The auto grader will look for the border color with the keyword of ‘red’.  If anything else is used, this will be marked incorrect, so please follow directions.-->
<?php
session_start();
$newvals = $_SESSION['newvals'];
$changevals = $_SESSION['changevals'];
$theaddress_id = $_SESSION['address_id'];

echo '<!--The ‘Add New User’ and ‘Edit User’ forms:-->';
echo '<head><title id = "page-title">';
if ($newvals)
{
echo "Add New User";
}
else
{
echo "Edit User";
}
echo '</title><script type = "text/JavaScript" src = "state.js"></script> <script type = "text/javascript"  src = "jschk.js" ></script></head><body>';
echo '<!--Must have a Title on the top of the page:-->';
echo '<!--Id of page-title-->';



$host = 'db1.cs.uakron.edu';
$user= 'bro2';
$pass = 'ieChooS7';
$dbname = "ISP_bro2";


$db = mysqli_connect($host, $user, $pass, $dbname);
if (!$db) {
     print "Error - Could not connect to MySQL - " . mysqli_error($db);
     exit;
}



if ($newvals)
{

echo '<h1 id = "page-title">Add New User</h1>


<form  method = "POST" >
<!--The user data that you will need to enter is: (if not denoted, then use input type of text)-->
<!--User ID (name=”userid”) onsubmit = "chkeverything();" -->
<input type="text" id="myid" name="userid" onblur ="chkid(true);"/>User ID<br />

<!--First Name (name=”fname”) ID = "myid" onblur ="chkid(true);" -->
<input type="text" id="myfname" name="fname" onblur ="chkfname(true);"/>First Name<br />


<!--Last Name (name = “lname”)-->
<input type="text" id="mylname" name="lname" onblur ="chklname(true);"/>Last Name<br />



<!--Email (name=”email”)-->
<input type="text" id="myemail" name="email" onblur ="chkemail(true);"/>Email<br />


<!--Phone (name=”phone”)-->
<input type="text" id="myphone" name="phone" onblur ="chkphone(true);"/>Phone<br />


<!--Street (name=”street”)-->
<input type="text" id="mystreet" name="street" onblur ="chkstreet(true);"/>Street<br />



<!--City (name=”city”)-->
<input type="text" id="mycity" name="city" onblur ="chkcity(true);"/>City<br />


<!--State (name=”state”)-->
<input type="text" id="mystate" name="state" onblur = "chkstate(true);getPlace(this.value);"/>State <input type="text" id="mystatename" readonly/>the ajax part here <br />


<!--Zip (name=”zip”)-->
<input type="text" id="myzip" name="zip" onblur ="chkzip(true);"/>Zip<br />


<!--Date Added (name=”add-date”)-->
<input type="text" id="mydate" name="add-date" onblur ="chkeverything()"/>Date Added<br />

<!--Male/Female (name=”sex”, input type radio button)-->
<input type="radio" name="sex" value="male">Male<br/>
<input type="radio" name="sex" value="female">Female<br/>
<br>


<input type="submit" name = "Submit" value="Submit" onclick="chkeverything();" /></input>
<input type="reset" name = "reset" value="reset" /></input>
</form>';


	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
	

		$userid = $_POST['userid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$street= $_POST['street'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$adddate = $_POST['add-date'];
		$sex = $_POST['sex'];

		// make sure user id is unique before inserting
		$useridq = "SELECT * from users WHERE user_id =" . $userid;
		$useridqresult = mysqli_query($db, $useridq);
   		if (!$useridqresult)
  		{
 			 print "Error - cant connect to database to look up user_id.  MySQL error - "  . mysqli_error($db);
   			 exit;
  		}
		if(mysqli_num_rows($useridqresult) == 0)
		{
		echo "no match";
		
		}
		else
		{
		echo " error, User id already in database, data not stored";
		exit;
		}

		// insert info into tables
		$address ="INSERT INTO address(street,city,state,zip)VALUES(\"$street\",\"$city\",\"$state\",\"$zip\")";

		//echo $user;
		//echo $address;


		$addressResult = mysqli_query($db, $address);
   		 if (!$addressResult)
  		{
 			 print "Error - Could not insert into address table.  MySQL error - "  . mysqli_error($db);
   			 exit;
  		}
	
		$addressId = mysqli_insert_id($db);
		//echo "the address id is " . $addressId;

		$user = "INSERT INTO users(fname,lname,email,date,sex, address_id, phone,user_id)VALUES(\"$fname\",\"$lname\",\"$email\",\"$adddate\",\"$sex\", $addressId,\"$phone\",\"$userid\")";

		$userResult = mysqli_query($db, $user);
  		if (!$userResult)
 		{
  		 	print "Error - Could not insert into user table.  MySQL error - "  . mysqli_error($db);
   			 exit;
  		}	
		header('Location: userlisting.php');
	}


}



if ($changevals)
{

// join users
$query = "SELECT * from users JOIN address ON (users.address_id = '$theaddress_id' AND users.address_id = address.address_id )";
$result = mysqli_query($db, $query);
if (!$result) {
     print "Error - Could not connect to MySQL - " . mysqli_error($db);
     exit;
}
$row = mysqli_fetch_assoc($result);


// to check make or female in radio button 
$the_male = 'unchecked';
$the_female = 'unchecked';
if($row['sex'] === male)
{
 $the_male = 'checked';
}
else
{
$the_female = 'checked';
}




echo '<h1 id = "page-title">Edit User</h1>


<form  method = "POST">
<!--The user data that you will need to enter is: (if not denoted, then use input type of text)-->
<!--User ID (name=”userid”)  -->
<input type="text" id="myid" name="userid" value = "' . $row['user_id'] . '"/>User ID<br />';


echo
'<!--First Name (name=”fname”) ID = "fname" onblur ="chkfname(true);" -->
<input type="text" id="myfname" name="fname" onblur ="chkfname(true);" value ="' . $row['fname'] . '"/>First Name<br />';

echo
'<!--Last Name (name = “lname”)-->
<input type="text" id="mylname" name="lname" onblur ="chklname(true);" value ="' . $row['lname'] . '"/>Last Name<br />';


echo
'<!--Email (name=”email”)-->
<input type="text" id="myemail" name="email" onblur ="chkemail(true);"  value ="' . $row['email'] . '"/>Email<br />';

echo
'<!--Phone (name=”phone”)-->
<input type="text" id="myphone" name="phone" onblur ="chkphone(true);"  value ="' . $row['phone'] . '"/>Phone<br />';

echo
'<!--Street (name=”street”)-->
<input type="text" id="mystreet" name="street" onblur ="chkstreet(true);"  value ="' . $row['street'] . '"/>Street<br />';

echo
'<!--City (name=”city”)-->
<input type="text" id="mycity" name="city" onblur ="chkcity(true);"  value ="' . $row['city'] . '"/>City<br />';

echo
'<!--State (name=”state”)-->
<input type="text" id="mystate" name="state" onblur ="chkstate(true);"  value ="' . $row['state'] . '"/>State<br />';

echo
'<!--Zip (name=”zip”)-->
<input type="text" id="myzip" name="zip" onblur ="chkzip(true);"  value ="' . $row['zip'] . '"/>Zip<br />';

echo
'<!--Date Added (name=”add-date”)-->
<input type="text" id="mydate" name="add-date" onblur ="chkdate(true);"  value ="' . $row['date'] . '"/>Date Added<br />';

echo
'<!--Male/Female (name=”sex”, input type radio button)-->
<input type="radio" name="sex" value="male"'. $the_male . '>Male<br/>';
echo
'<input type="radio" name="sex" value="female"' .$the_female . '>Female<br/>';
echo
'<br>


<input type="submit" name = "Submit" value="Submit" onclick="chkeverything();" /></input>
<input type="reset" name = "reset" value="reset" /></input>
<input type="submit" name = "delete" value="delete" /></input>
</form>';




	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		//if delete button clicked
		
		if (isset($_POST['delete'])) 
		{
			//echo delete;
			

			$addressdelete = "DELETE FROM address WHERE address_id='$theaddress_id'";
			$addressResultdelete = mysqli_query($db, $addressdelete);
  			if (!$addressResultdelete)
 			{
  				print "Error - Could not delete.  MySQL error - "  . mysqli_error($db);
   	      		 	 exit;
  			}


			$userdelete = "DELETE FROM users WHERE address_id='$theaddress_id'";
			$userResultdelete = mysqli_query($db, $userdelete);
  			if (!$userResultdelete)
 			{
  				 print "Error - Could not delete  MySQL error - "  . mysqli_error($db);
   				 exit;
  			}


			header('Location: userlisting.php');


		}
		else // if submit button clicked
		{
		$userid = $_POST['userid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$street= $_POST['street'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$adddate = $_POST['add-date'];
		$sex = $_POST['sex'];

			$addressupdate = "UPDATE address SET street='$street', city='$city', state='$state', zip='$zip' WHERE address_id='$theaddress_id'";
			$addressResultup = mysqli_query($db, $addressupdate);
  			if (!$addressResultup)
 			{
  				print "Error - Could not update into user table.  MySQL error - "  . mysqli_error($db);
   	      		  exit;
  			}


			$userupdate = "UPDATE users SET fname='$fname', lname = '$lname', email = '$email', date = '$adddate', sex = '$sex', phone = '$phone', user_id = '$userid' WHERE address_id='$theaddress_id'";
			$userupdateResult = mysqli_query($db, $userupdate);
  			if (!$userupdateResult)
 			{
  				 print "Error - Could not update into user table.  MySQL error - "  . mysqli_error($db);
   				 exit;
  			}


			header('Location: userlisting.php');

		
		}
		
	}

	

}

mysqli_close($db);

?>








<!--‘Add New User’ or ‘Edit User’ based on what mode you are in-->
<!--Must have a submit button, input type ‘submit’ and clear button, input type ‘reset’-->
<!--On submission an HTTP POST will be sent to the server with either the command to update or insert a new record based on what mode your are in.-->
<!--Go back to the ‘User Listing’ page after successful submission of the data-->
<!--Gracefully handle errors from the server-->
<!--On error of the HTTP POST, show the user an error message.-->
</body>
</html>