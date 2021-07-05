<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php
        $email=$_GET['email'];
        $servername = "localhost";
        $username = "root";
        $password="";
        $dbname="project";

        $conn = new mysqli($servername,$username,$password,$dbname);
        if(!$conn){
            die('Could not connect: '.mysqli_error($conn));
        }

        $sql1 = "SELECT * FROM STUDENTS Where Email='$email'";
        $result = $conn->query($sql1);
        $row1 = $result->fetch_assoc();

        echo "
            <img class='img-responsive' src='images/c1.jpg' height='120px' width='120px' align='center' style='border-radius:50%'></img>
            <br><br>
            <div class='table-responsive table-bordered'>
                <table class='table table-hover'>
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>".$row1['Name']."</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>".$row1['Email']."</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>".$row1['DOB']."</td>
                        </tr>
                        <tr>
                            <th>Branch</th>
                            <td>".$row1['Branch']."</td>
                        </tr>
                        <tr>
                            <th>Year of Passing out</th>
                            <td>".$row1['Yr']."</th>
                        </tr>
                        <tr>
                            <th>CPI</th>
                            <td>".$row1['CPI']."</td>
                        </tr>
                        <tr>
                            <th>12th Percentage</th>
                            <td>".$row1['Twp']."</td>
                        </tr>
                        <tr>
                            <th>10th Percentage</th>
                            <td>".$row1['Tenp']."</td>
                        </tr>
                        <tr>
                            <th>Contact No</th>
                            <td>".$row1['Phone']."</td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td>".$row1['Degree']."</td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        ";
    ?>
</body>
</html>