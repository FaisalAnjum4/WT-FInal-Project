<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $fname = $_POST["fname"];
   
    $dob = $_POST["dob"];
    $paddress = $_POST["paddress"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$conn = new mysqli("localhost", "user", "123", "finalproject");

	if(empty($fname) ||empty($dob) || empty($paddress)||empty($phone)||empty($email)  || empty($username) || empty($password)) {
		echo "Fill up the form properly";
	}
	else {

		if($conn -> connect_error) {
			echo "Failed to connect database!";
		}
		else {

			$stmt = $conn -> prepare("INSERT into admin (name,dob,address,phone,email,username,password) values (?, ?, ?, ?, ?, ?, ?)");
			 mysqli_stmt_bind_param($stmt, "sssssss", $fname,  $dob , $paddress ,$phone, $email ,$username, $password);
     
			$status = $stmt -> execute();

			if($status) {
				echo "Successfully saved!";
			}
			else {
				echo "Username already existed!";
			}
			
		}
		$conn -> close();	
	}	
	
}

?>