<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$phone = $_POST["phone"];
	$lname = $_POST["lname"];
	$mi = $_POST["mi"];
	$fname = $_POST["fname"];
	$account = $_POST["account"];
	$customer = array('lname' => $lname, 'mi' => $mi, 'fname' => $fname, 'account' => $account);
	$_SESSION['arr'][$phone] = json_encode($customer);
}

?>

<html>
<head>

<!--Page title of ‘Assignment 5’-->
<title>Assignment 5</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="A5js.js"></script>
</head>
<body>

<!--your name in a span tag with an id of name --> 
<span id="name">Brian O'Briskie</span>
<!--the time and date it is finished in a paragraph tag with an id of date-->
<p id="date">10/29/2015</p>
<!--h1 tag with the content of ‘Assignment 5’, id of assignment -->
<h1 id="assignment">Assignment 5</h1>
<!--h2 tag with the content of ‘Internet Systems Programming’, id of class-title -->
<h2 id="class-title">Internet Systems Programming</h2>

<!-- Create a form with five input fields :-->
<!-- (please adhere to these names or auto-grader will mark incorrect) -->
<!-- Three fields for name -->
<!-- First Name, input type text, name=”fname” -->
<!-- Middle Initial, input type text, name=”mi” -->
<!-- Last Name, input type text, name=”lname” -->
<!-- Phone, input type text, name=”phone”  -->
<!-- Account, input type text, name=”account”  -->

<form method="POST">
      <label for="phone">Phone: </label><input type="text" id="phone" name="phone"/><br />
      <label for="phone">First Name: </label><input type="text" id="fname" name="fname" /><br />
      <label for="phone">Middle Initial: </label><input type="text" id="mi" name="mi" /><br />
      <label for="phone">Last Name: </label><input type="text" id="lname" name="lname" /><br />
      <label for="phone">Account: </label><input type="text" id="account" name="account" /><br />
      <input type="submit" name="submit" value="Submit" />
      <input type="reset" name="reset" value="Clear" />
</form>

<!-- onblur of the phone number, Using jQuery, make an Ajax request to look up the customer on the server (PHP file) -->
<!-- For a repeat customer, the server will have his or her phone number, name, and account number.  The application must fill in the name and account number -->
<!-- For new customers, on submit of the form, the phone number, name and account number, must be added to the hash (use session) -->
<!-- Last name, middle initial, and first name  -->
<!--  The phone numbers are simple seven-digit numbers -->
<!--  The account numbers are four-digit numbers that do not begin with zeros -->
<!--  Example JSON Object as Hash value: -->
<!-- “1239876” => '{"lname": "McFly", "mi": "A", "fname": "George", "account": "1234"}'-->
<!-- The server-side response must return JSON data that contains the names and account numbers as properties -->

</body>
</html>
