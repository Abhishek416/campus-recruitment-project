<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="project";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if(!$conn){
        die("Connection failed: ".$conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $job_title = $_POST['job_id'];

        $sql="DELETE FROM VACANCY WHERE job_id='$job_title'";
        $result=$conn->query($sql);
        $conn->close();

        header('Location: company_dash.php');
    }
?>