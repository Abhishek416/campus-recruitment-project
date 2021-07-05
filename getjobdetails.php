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
        $job_id = $_GET['job_id'];
        $conn = new mysqli('localhost','root','','project');

        if(!$conn){
            die('Could not connect: '.mysqli_error($conn));
        }

        $sql = "SELECT * FROM VACANCY Where job_id='$job_id'";
        $result = $conn->query($sql);

        echo "
            <div class='table-responsive table-bordered'>
                <table class='table table-hover'>
                    <tr>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Location</th>
                    </tr>
        ";
                    while($row = $result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>".$row['job_title']."</td>
                                <td>".$row['salary']."</td>
                                <td>".$row['location']."</td>
                            </tr>
                        ";                             
                    }
                echo "</table>";
            echo "</div>";

        
    ?>

</body>
</html>