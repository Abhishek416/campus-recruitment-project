<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    
    <?php

        $job_id = $_GET['job_id'];
        $s_mail = $_GET['s_mail'];
        $c_name = $_GET['c_name'];

        $conn = new mysqli('localhost','root','','project');
        if(!$conn){
            die('Could not connect: '.mysqli_error($conn));
        }

        $sql1="SELECT Email FROM COMPANY WHERE Name='$c_name'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $c_mail = $row1['Email'];
   

        $sql3 = "SELECT * FROM APPLICATIONS Where job_id='$job_id' AND s_mail='$s_mail'";
        $result3 = $conn->query($sql3);

        if($result3->num_rows != 0){
            echo "<h3> Already Applied! </h3><br>";
            $row = $result3->fetch_assoc();
            if($row['status'] == 0){
                echo "<h3> Status Pending! </h3>";    
            }elseif($row['status'] == 1){
                echo "<h3> Accepted! </h3>";
            }else{
                echo "<h3> Rejected! </h3>";
            }
        }else {
            
            $sql2 = "INSERT into APPLICATIONS(c_mail,s_mail,job_id,status) values('$c_mail','$s_mail','$job_id', 0)";
            $result2 = $conn->query($sql2);
            echo " <h3> Applied successfully!! </h3>";
        }
        
    ?>

</body>
</html>