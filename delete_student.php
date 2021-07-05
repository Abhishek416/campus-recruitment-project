<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">

    <nav class="navbar navbar-fixed-top" id="top-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" >Campus Recruitment System</a>
            </div>
            <ul id="list1" class="nav navbar-nav" >
                <li class="active"><a href="student_dash.php">Home</a></li>
                <li class="active"><a href="index.html">Logout</a></li>
            </ul>
        </div>
    </nav>

    <?php
        session_start();
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="project";

        function phpAlert($msg){
            echo '<script type="text/javascript">alert("'.$msg.'")</script>';
        }

        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $uname = $_POST['uname'];
            $pwd = $_POST['pwd'];
            $sql1="SELECT pwd from STUDENTS WHERE Email='$uname'";

            $result = $GLOBALS['conn']->query($sql1);
            if($result->num_rows == 0){
                phpAlert("Wrong username entered! ");
            }else{
                $row=$result->fetch_assoc();
                if($row['pwd']==$pwd){
                    $sql2="DELETE FROM STUDENTS WHERE Email='$uname'";
                    $result2 = $GLOBALS['conn']->query($sql2);
                    
                    $sql3 = "DELETE FROM APPLICATIONS WHERE s_mail='$uname'";

                    $result3 = $GLOBALS['conn']->query($sql3);

                    echo "<script type='text/javascript'>
                            alert('Deleted');
                            window.location.replace('index.html')
                        </script>";
                
                   
                }else{
                    phpAlert("Wrong Password! ");
                }
            }
            
        }

        $conn->close();
    ?>
</head>
<body>
    
        <div class="well text-center" id="main">
            <img src="images/bye.png" alt="" class="img-responsive" height="200" width="700">
            <div>
                <div class="well container-fluid text-center" id="frm1">
                    <form action="" method="POST">
                        <div>
                            <label for="usrnm"><b>Enter Username</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" id="usrnm" required">
                        </div>
                        <div>
                            <label for="pswrd"><b>Enter Password</b></label>
                            <input type="text"  placeholder="Enter Password" name="pwd" id="pswrd" required>
                        </div>
                        <div>
                            <button type="submit">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

    <footer>
        <nav class="navbar navbar-fixed-bottom navbad-default" id="bottom-nav">
            <div class="container-fluid">
                <div id="col1" >
                    <ul id="blist1">
                        <li><a href='#'>About Us</a></li>
                        <li><a href='#'>FAQs</a></li>
                        <li><a href='#'>Contact Us</a></li>
                    </ul>
                </div>
                
                <div id="col2" >
                    <ul id="blist1">
                        <li><a href='#'>Privacy Policy</a></li>
                        <li><a href='#'>Legal</a></li>
                        <li><a href='#'>Work With Us</a></li>
                    </ul>
                </div>
                
                <div id="col3">
                
                    <ul id="blist3" >
                        <li><i class="fab fa-facebook fa-2x" ><a href='#'></a></i></li>
                        <li><i class="fa fa-twitter fa-2x"><a href='#'></a></i></li>
                        <li><i class="fa fa-instagram fa-2x"><a href='#'></a></i></li>
                        <li><i class="fa fa-linkedin fa-2x"><a href='#'></a></i></li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>
</html>