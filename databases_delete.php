<?php
	 // 1. Create a database connection
	$dbhost = 'localhost';
	$dbuser = 'widget_cms';
	$dbpass = 'battosai';
	$dbname = 'widget_corp';
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Test if connection occured
	if(mysqli_connect_error()) {
		die("Database connection failed: " . 
			mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" 
		);
	}

	// Often these are form values in $_POST
	$id = 4;

	// 2. Perform database query
	$query = "DELETE FROM subjects ";
	$query .= "WHERE id = {$id} ";
	$query .= "LIMIT 1";

	$result = mysqli_query($connection, $query);
	// Test if there was a query error

	if($result && mysqli_affected_rows($connection ) == 1) {
		// success
		echo "Success!";
	} else {
		die("Database query failed. " .  mysqli_error($connection));
	}
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Database</title>
</head>
<body>



</body>
</html>
<?php 

// 5. Close database connection
mysqli_close($connection);
 ?>