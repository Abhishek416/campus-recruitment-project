<?php
	$servername="localhost";
	$username = "root";
	$password = "";
	$dbname="project";

	$conn = new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name=$_POST['name'];
		$email=$_POST['Email'];
		$pwd=$_POST['pwd'];
		$phone=$_POST['phone'];
		$location=$_POST['location'];
		$ceo=$_POST['ceo'];
		$cto=$_POST['cto'];
		$hr=$_POST['hr'];
		$worth=$_POST['worth'];
		$found=$_POST['found'];
		$founder=$_POST['founder'];

		$sql = "INSERT INTO COMPANY Values('$name', '$email', '$pwd', '$phone', '$location', '$ceo', '$cto', '$hr', '$worth', '$found', '$founder')";

		if($conn->query($sql) === TRUE){
			$GLOBALS['conn']->close();
			echo "<script type='text/javascript'> 
			 		alert('Account Created!');
			 		window.location.replace(\"index.html\"); 
				</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
?>
