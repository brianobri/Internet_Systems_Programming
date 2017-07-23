<!document html>
<!--Page title of ‘Assignment 4’-->

<head>
<title>Assignment 4</title>
</head>


<body>
<!--your name in a span tag with an id of name-->
<span id = "name"> Brian O'Briskie</span>
<!--the time and date it is finished in a paragraph tag with an id of date-->
<p id = "date">Time: 2:22 am Date: 10/25/2015 </p>
<!--h1 tag with the content of ‘Assignment 4’, id of assignment-->
<h1 id = "assignment">Assignment 4</h1>
<!--h2 tag with the content of ‘Internet Systems Programming’, id of class-title-->
<h2 id = "class-title">Internet Systems Programming</h2>

<?php 

$forminformation = "0.0";
if((isSet($_POST['add']) || isSet($_POST['subtract']) || isSet($_POST['multiply']) || isSet($_POST['divide']) || isSet($_POST['equal'])) && isSet($_POST['input'])){   
	if ($_POST['add'] == '+'){
		$forminformation = $_POST['output'] + $_POST['input'];
	}
	else if ($_POST['subtract'] == '-'){
		$forminformation = $_POST['output'] - $_POST['input'];
	}
	else if ($_POST['multiply'] == '*'){
		$forminformation = $_POST['output'] * $_POST['input'];
	}
	else if ($_POST['divide'] == '/'){
		$forminformation = $_POST['output'] / $_POST['input'];
	}
	else if ($_POST['equal'] == '='){
		$forminformation =  $_POST['input'];
	}
}

?>

<!--A read only output field showing the current value of the calculator (starting with 0.0) with a name of output.-->
<!--An input field to accept a new value, with a name of input.-->
<!--+ : to add the new value to the current value, with a name of add.-->
<!--- : to subtract the new value from the current value, with a name of subtract.-->
<!--* : to multiply the current value by the new value, with a name of multiply.-->
<!--/ : to divide the current value by the new value, with a name of divide.-->
<!--= : to assign the new value to the current value , with a name of equal.-->

<form method="post">
<?php print '<input type="text" name="output" value ="' . $forminformation . '" readonly>';  ?>
</br>
<input type="text" name="input">
</br>
<input type="submit" name="add" value="+">
<input type="submit" name="subtract" value="-"> 
<input type="submit" name="multiply" value="*"> 
<input type="submit" name="divide" value="/" > 
<input type="submit" name="equal" value="=" > 

</form>

</body>
</html>