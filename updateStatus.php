<?php
    $conn = new mysqli('localhost','root','', 'project');

    if(!$conn){
        die("connection failed: ".$conn->connection_error);
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $app_id = $_POST['app_id'];
        $status = $_POST['status'];

        $sql = "UPDATE APPLICATIONS set status='$status' where app_id='$app_id'";
        $result=$conn->query($sql);
        $conn->close();
        header('Location: company_dash.php');
    }
?>