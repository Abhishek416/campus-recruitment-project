<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php
        $email = $_GET['email'];

        $conn = mysqli_connect('localhost', 'root', '', 'project');
        if(!$conn){
            die('Could not connect: ' . mysqli_error($conn));
        }
        $sql = "SELECT * FROM COMPANY WHERE Email = '$email'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);


        echo "<img class='img-responsive' src='images/c1.jpg' height='120px' width='120px' align='center' style='border-radius:50%'>
                <br><br>
                <div class='table-responsive table-bordered'>
                    <table class='table table-hover'>
                        <tr>
                            <th>Name</th>
                            <td>".$row['Name']."</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>".$row['Email']."</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>".$row['Phone']."</td>
                        </tr>
                        <tr>
                            <th>Locaion</th>
                            <td>".$row['Location']."</td>
                        </tr>
                        <tr>
                            <th>C.E.O</th>
                            <td>".$row['CEO']."</td>
                        </tr>
                        <tr>
                            <th>C.T.O</th>
                            <td>".$row['CTO']."</td>
                        </tr>
                        <tr>
                            <th>H.R.</th>
                            <td>".$row['HR']."</td>
                        </tr>
                        <tr>
                            <th>Net Worth</th>
                            <td>".$row['Worth']."</td>
                        </tr>
                        <tr>
                            <th>Founded on</th>
                            <td>".$row['Found']."</td>
                        </tr>
                        <tr>
                            <th>Founder</th>
                            <td>".$row['Founder']."</td>
                        </tr>
                    </table>
                </div>";
        
        mysqli_close($conn);
    ?>

</body>
</html>