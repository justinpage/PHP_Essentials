<?php
	 // 1. Create a database connection
	$dbhost = 'localhost';
	$dbuser = 'widget_cms';
	$dbpass = 'battosai';
	$dbname = 'widget_corp';
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Test if connection occured
	if(mysqli_connect_error()) {
		die("Databasew connection failed: " . 
			mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" 
		);
	}

	// 2. Perform database query
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";

	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if(!$result) {
		die("Database query failed");
	}
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Database</title>
</head>
<body>
	
	<ul>
		<?php while($subject = mysqli_fetch_assoc($result)) : ?>
			<li><?=$subject["menu_name"]?></li>
			<li><?=$subject["id"]?></li>
		<?php endwhile; ?>
	</ul>

	<?php 

		// 4. Release returned data
		mysqli_free_result($result);

	 ?>

</body>
</html>
<?php 

// 5. Close database connection
mysqli_close($connection);
 ?>