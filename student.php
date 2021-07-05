<?php

$servername="localhost";
$username = "root";
$password = "";
$dbname="project";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$dob=$_POST['dob'];
		$branch=$_POST['branch'];
		$year=$_POST['year'];
		$cpi=$_POST['cpi'];
		$twp=$_POST['twp'];
		$tenp=$_POST['tenp'];
		$pwd=$_POST['pwd'];
		$phone=$_POST['phone'];
		$degree=$_POST['degree'];

	$sql = "INSERT into STUDENTS(Name, Email, DOB, Branch, Yr, CPI, Twp, Tenp, pwd, Phone, Degree) VALUES('$name', '$email', '$dob', '$branch', '$year', '$cpi', '$twp', '$tenp', '$pwd', '$phone', '$degree')";

	if($conn->query($sql) === TRUE){
			$GLOBALS['conn']->close();
			echo "<script type='text/javascript'>
							alert('Account Created!');
							window.location.replace(\"index.html\");
						</script>";
			
		} else {
			echo "Error: " . $sql . '<br>' . $conn->error;
			}
	
	}

?>
