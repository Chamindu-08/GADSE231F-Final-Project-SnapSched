<?php
	
	session_start();

	$sname="localhost";
	$uname="root";
	$passw="";
	$dbName="sujathavidyalaya";

	$conn=mysqli_connect($sname,$uname,$passw,$dbName);

	if (!$conn) {
		echo "Connection failed";
	}

	if(isset($_POST['textUserName']) && isset($_POST['textPassword'])){

		function Validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$userName = Validate($_POST['textUserName']);
		$password = Validate($_POST['textPassword']);

		if(empty($userName)){
			echo "error";
		}
		else if (empty($password)) {
			echo "error";
		}
		else{
			$sql="SELECT * FROM tblstudent WHERE StudentEmail='$userName' AND StudentPassword='$password'";

			$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result)==1) {
				$_SESSION['userName']=$userName;
				$_SESSION['password']=$password;
                
                header("Location: StudentDashBoard.html");
                exit();
			}
		}
	}
	else{
		echo "error";
	}

?>