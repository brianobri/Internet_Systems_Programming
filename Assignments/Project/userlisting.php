
<html>

<head>
<title>User Listing</title>
</head>
<body>



<table border = 1>
<form method = "POST">
<thead> <th> ID </th>
	<th> fname </th>
	<th> lname </th>
	<th> email </th>
	<th> phone </th>
	<th> street </th>
	<th> city </th>
	<th> state </th>
	<th> zip </th>
	<th> date </th>
	<th> sex </th>
</thead>



<?php
session_start();

$host = 'db1.cs.uakron.edu';
$user= 'bro2';
$pass = 'ieChooS7';
$dbname = "ISP_bro2";


$db = mysqli_connect($host, $user, $pass, $dbname);
if (!$db) {
     print "Error - Could not connect to MySQL - " . mysqli_error($db);
     exit;
}





$query = "SELECT * from users JOIN address on users.address_id = address.address_id";

$result = mysqli_query($db, $query);



if (isset($_POST['addUser'])) {
	$_SESSION['newvals'] = true;
	$_SESSION['changevals'] = false;	
	header('Location: adduseredituser.php');
}

if(isset($_POST['editUser'])){
	$_SESSION['newvals'] = false;
	$_SESSION['changevals'] = true;
	$_SESSION['address_id'] = $_POST['editUser'];
	header('Location: adduseredituser.php');
}
	

mysqli_close($db);

while($row = mysqli_fetch_assoc($result))
{
	
	echo "<tr><td>" . $row['user_id'] . "</td> <td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td>	<td>" . $row['street'] . "</td><td>" . $row['city'] . "</td><td>" . $row['state'] . "</td><td>" . $row['zip'] . "</td><td>" . $row['date'] . "</td><td>" . $row['sex'] . "</td><td> <button type='submit' name='editUser' id='editUser' value=".$row['address_id'].">Edit User</button> </td></tr>";
}



?>


</table>
<button type="submit" name="addUser" id="addUser">Add User</button>
</form>

<!--Your second page, ‘User Listing’ page will have all the user data as defined in the above step-->
<!--You must also have an ‘Add New User’ button, id of new-user, that will take you to a screen where you will be able to fill in user data.-->
<!--You will also need an ‘Edit User’ button, id of edit-user + UserId, that will take you to a screen where you will be able to update user data. (Must be same screen as ‘Add New User’ page.-->
</body>
</html>