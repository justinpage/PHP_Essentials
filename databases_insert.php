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
	$menu_name = "Today's Widget Trivia";
	$position = 4;
	$visible = 1;

	// Escape all strings
	$menu_name = mysqli_real_escape_string($connection, $menu_name);

	// 2. Perform database query
	$query = "INSERT INTO subjects (menu_name, position, visible) 
				VALUES ('{$menu_name}', {$position}, {$visible})";

	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if($result) {
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