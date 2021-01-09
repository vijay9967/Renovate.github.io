<?php 

		require("conn.php");
			
		$name = $_POST['name'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        $email_id= $_POST['email'];	
			
		$sql = "INSERT INTO user(name, mobile_number, address, date, email_id) VALUES (?, ?, ?, ?, ?)";
		if($stmt = mysqli_prepare($conn, $sql)){
	    mysqli_stmt_bind_param($stmt, "sisss", $name, $mobile_number, $address, $date, $email_id);
	
			
		
			
			if(mysqli_stmt_execute($stmt)){
				echo "Records inserted successfully.";
				header("Location: confirm.html");
			} else{
				echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
			}
		} else {
			echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
		}