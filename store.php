<?php 
        require("conn.php");
		
		$name = $_POST['name'];
        $suggestion = $_POST['suggestion'];
        $experience = $_POST['experience'];
        $complain = $_POST['complain'];
        $city= $_POST['city'];

                
        $sql = "INSERT INTO feedback(name, suggestion, experience, complain, city) VALUES(?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($conn, $sql)){
	 
        mysqli_stmt_bind_param($stmt, "sssss", $name, $suggestion, $experience, $complain, $city);
        
		
		if(mysqli_stmt_execute($stmt)){
				echo "Records inserted successfully.";
				header("Location: feedbackconfirm.html");
			} else{
				echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
			}
		} else {
			echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
		}
        ?>