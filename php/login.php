<html>
<head>
	<meta charset="UTF-8">
	<title>Log In</title>
	<script type="text/javascript">
	</script>
	<style type="text/css">
</style>
</head>
<body>
	<?php
	$username = null;
	$password = null;

		//Using php $_POST array, accesses the input values in "Log in" form.
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
			// above works.. all the way down to w.e the columns are in the input
	};

		// connecting user to database
	$db_handle_name = mysqli_connect( "localhost", "webphp", "password" );

		// choose database
	mysqli_select_db( $db_handle_name, "finaldb" );
	if ( !(  $db_handle_name = mysqli_connect( "localhost",
		"webphp", "password" ) ) )
		die( "Could not connect to database </body></html>" );

		// open finaldb database
	if ( !mysqli_select_db(  $db_handle_name, "finaldb" ) )
		die( "Could not open products database </body></html>" );
		// query finaldb database
		//	Using a select query looks for a record in the DB which matches the entered value in "username" input box
	$query = "SELECT username FROM auth WHERE username='$username' AND password='$password' ";

	if ( !( $result = mysqli_query( $db_handle_name,$query ) ) )
	{
		print( "<p>Could not execute query!</p>");
		die( mysqli_error($db_handle_name) . "</body></html>" );

		} // end if

		// if user doesnt exist in database
		$counter = mysqli_num_rows($result);

		echo $counter;

		// if counter < 1, then user isn't in database
		if ($counter < 1 ) {
			echo "Incorrect username or wrong password";
			die( mysqli_error($db_handle_name) . "</body></html>" );
		} else {
		// correct user
			echo "successful";
		}

		//If the record is found, checks if the password entered by the user matches the password stored in the record.
		//mysqli_query($db_handle_name, $query);
		
		if ( $result = mysqli_query( $db_handle_name,$query ) )
		{
			//If it is not a match displays an error message "Incorrect username or password."
			$query = "SELECT password FROM auth WHERE username = '$username' AND password = '$password' ";
			if(!( $result = mysqli_query( $db_handle_name,$query ) ))
			{
				print( "<p>Incorrect username or password.</p>" );
				die( mysqli_error($db_handle_name) . "</body></html>" );
			}
			//If it is a match, display a success message such as " Welcome back <username>! Login was successful". Then display the user's firstname, lastname, email and phone in a table with headers.
			else
			{
				print( "<p> Welcome back $username ! Login was successful</p>" );
				$query = "SELECT  firstname,lastname,email,phone from auth where username = '$username' AND password = '$password'";
				print("<table> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Phone</th>");
				$result = mysqli_query($db_handle_name,$query) ;
				//…
				while ( $row = mysqli_fetch_row( $result ) )
				{ 
					print( "<tr>" );
					foreach ( $row as $value )
						print( "<td>$value</td>" );
					print( "</tr>" );
				}	

			}
		} 

		mysqli_close( $db_handle_name );

		?>

	</body>
	</html>