<?php 
$uname = 'alphonce';
//check user existence
function CheckUser($uname){
	require 'dbconfig.php';
	
	$sql = "SELECT * FROM users WHERE uname =?";

	$stmt = mysqli_stmt_init($conn);

	if (mysqli_stmt_prepare($stmt, $sql)) {
		mysqli_stmt_bind_param($stmt, "s" ,$uname);
		mysqli_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			echo $count;
			//abort registration and call the form
			
			echo '<form action="" method="POST">
	<input type="text"name="fname" placeholder="Enter firstname" required="">
	<input type="text"name="lname" placeholder="Enter lastname" required="">
	<input type="text"name="uname" placeholder="Enter username" required="">
	<input type="email"name="umail" placeholder="Enter Email address" required="">
	<input type="submit" name="send" value="Register">
</form>';
exit('User exist');
		} else {
			//continue with process
			file_get_contents('index.php');
		}
		

	} else {
		echo "Function failed";
	}
	
}
?>