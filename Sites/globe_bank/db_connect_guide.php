<?php 

// this guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'password';
$dbname = 'global_bank';

// 1. Create a database connection
// 2. Perform database query
// 3. Use returned data (if any)
// 4. Release returned data
// 5. Close database connection

//1.
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// extra: Test if connection succeeded
if(mysqli_connect_errno()) {
	$msg = "Database connection failed: ";
	$msg .= mysqli_connect_error();
	$msg .= " (" . mysqli_connect_errno() . ")";
	exit($msg);
}

//2.
$query = "SELECT * FROM table_name";
$result_set = mysqli_query($connection, $query);

// extra: Test if quesucceeded
if (!result_set) {
	exit("Database query failed.");
}

//3.
while($subject = mysqli_fetch_assoc($result_set)) {
	echo $subject['menu_name'] . "<br />";
}

//4.
mysqli_free_result($result_set);

//5.
mysqli_close($connection);

?>