<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<script type="text/javascript">
		
	</script>

	<style type="text/css">
			


	</style>
	<?php
	
	?>

</head>
<body>
	<?php

		$username = null;
		$password = null;
		$firstName = null;
		$lastName = null;
		$email = null;
		$phone = null;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			// above works.. all the way down to w.e the columns are in the input
			$username = $_POST["username"];
			$password = $_POST["password"];
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
		}

		/*
			echo $username;
				echo $password;
				echo $firstName;
				echo $lastName;
				echo $email;
				echo $phone;
		*/


		// connecting user to database
		if(!($db_handle_name = mysqli_connect( "localhost", "webphp", "password" )))
			die("Could not connect to database </body></html>");

		// choose database
		if(!mysqli_select_db( $db_handle_name, "finaldb"))
			die("Could not open database </body></html>");

		// saving values from html input into a bunch of inserts

		
/*
	//	$insert1 = $_POST["userid"];
		$insert2 = $_POST["username"];
		$insert3 = $_POST["password"];
		$insert4 = $_POST["firstName"];
		$insert5 = $_POST["lastName"];
		$insert6 = $_POST["email"];
		$insert7 = $_POST["phone"];

*/

		// inserting a new into db

		// add quotations "" into your inserts
		$query = "INSERT INTO auth (userid, username, password, firstName, lastName, email, phone) VALUES ('', '$username', '$password', '$firstName', '$lastName', '$email', '$phone')";

	//	echo $query;

		// Queries: updating the db...
//		$result = mysqli_query($db_handle_name, $query);

		if 	(!($result = mysqli_query($db_handle_name, $query))) {
				print( "<p>Could not execute query!</p>");

				die( mysqli_error($db_handle_name) . "</body></html>");

		}  else echo "You are registered";

/*
		function showTables($db_handle_name) {
			$query = "SELECT firstName, LastName FROM auth";
			print ("<table> <th>First Name</th> <th>Last Name</th>");	
			
		}
			if ( !( $result = mysqli_query($db_handle_name,$query ))){
			print( "<p>Could not execute query!</p>" );
			die( mysqli_error($db_handle_name) . "</body></html>" );
		} 
			else {
				while ( $row = mysqli_fetch_row( $result ) ){
				print( "<tr>" );
				foreach ( $row as $value )
					print( "<td>$value</td>" );
					print( "</tr>" );
			}
		}
		print ("</table>");
*/
		showTable($db_handle_name);
		mysqli_close($db_handle_name);

		function showTable($db_handle_name){
		$query = "SELECT firstName, lastName FROM auth";
		print ("<table> <th>First Name</th> <th>Last Name</th>");
		if (!($result = mysqli_query( $db_handle_name, $query))){
			print( "<p>Could not execute query!</p>" );
			die( mysqli_error($db_handle_name) . "</body></html>" );
		} else {
			while ($row = mysqli_fetch_row($result)){
				print( "<tr>" );
				foreach ( $row as $value )
					print( "<td>$value</td>" );
				print( "</tr>" );
			}
		}
		print ("</table>");

}



	?>

</body>
</html>