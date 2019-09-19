<?php
require 'dbconfig.php';
require 'checkuser.php';
/********
HANDLE POST METHOD
***********/

if (!empty($_POST['send'])) {
	
		if (isset($_POST['send'])) {
			
			// check data integrity
			$first = mysqli_real_escape_string($conn, $_POST['fname']);
			$lname = mysqli_real_escape_string($conn, $_POST['lname']);
			$uname = mysqli_real_escape_string($conn, $_POST['uname']);
			$umail = mysqli_real_escape_string($conn, $_POST['umail']);

			CheckUser($uname);

			$sql = "INSERT INTO `users`(`fname`, `lname`, `uname`, `umail`) VALUES (?,?,?,?);";
			

			$stmt = mysqli_stmt_init($conn); //initialize 
			if (mysqli_stmt_prepare($stmt, $sql)) {
				 
			mysqli_stmt_bind_param($stmt,"ssss", $first,$lname,$uname,$umail);
			$execute = mysqli_stmt_execute($stmt);

			if($execute == true){
				echo "data inserted succesfully";
			}else{
				echo "Insert failed";
			}

			} else {
				echo "Something went wrong ";
			}
				
		} 

} 
else 
{
	echo "Please fill in the form and submit";
}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>PREPARED PHP STATEMENTS</title>
</head>
<body>

<form action="" method="POST">
	<input type="text"name="fname" placeholder="Enter firstname" required="">
	<input type="text"name="lname" placeholder="Enter lastname" required="">
	<input type="text"name="uname" placeholder="Enter username" required="">
	<input type="email"name="umail" placeholder="Enter Email address" required="">
	<input type="submit" name="send" value="Register">
</form>
</body>
</html>