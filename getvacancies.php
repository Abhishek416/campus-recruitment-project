<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php
        session_start();
        $name = $_GET['name'];
        $servername = "localhost";
        $username="root";
        $password="";
        $dbname="project";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if(!$conn){
            die('Could not connect: ' . mysqli_error($conn));
        }

        $sql = "SELECT * FROM VACANCY WHERE company_name = '$name'";
        $result = $conn->query($sql);
        
        echo "<div class='table-responsive table-bordered'>
                <table class='table table-hover'>
                    <tr>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
            ";
            while($row = $result->fetch_assoc()){
                echo "<tr>
                            <td>".$row['job_title']."</td>
                            <td>".$row['salary']."</td>
                            <td>".$row['location']."</td>
                ";
                
                $sql1 = "SELECT * FROM APPLICATIONS WHERE s_mail='".$_SESSION['Email']."' AND job_id=".$row['job_id']." ";
                $result1 = $conn->query($sql1);

                if($result1 ->num_rows != 0){
                    $row1 = $result1->fetch_assoc();        
                    if($row1['status'] == 0){
                        echo "<td>Status: Pending</td>";
                    }elseif($row1['status'] == 1){
                        echo "<td>Status: Accepted!</td>";
                    }else {
                        echo "<td>Status: Rejected!</td>";
                    }
                }else {
                    echo "
                        <td><input type=\"button\" value=\"Check eligiblity\" onclick=\"msg('".$row['job_id']."','".$_SESSION['Email']."',this)\">
                        </td>";
                }

                echo "</tr>";
            }
                echo "</table>
        </div>";
    ?>

</body>
</html>