<?php

    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="project";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }   
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $type=$_POST['type'];
        $sql="";
        function phpAlert($msg){
            echo '<script type="text/javascript">
                alert("' . $msg . '")
                </script>';
        }

        if($type === "Student"){
            $sql="SELECT pwd FROM STUDENTS WHERE Email='$uname'";
            $result = mysqli_query($conn,$sql);
        }elseif($type === "Company"){
            $sql="SELECT pwd from COMPANY WHERE Email='$uname'";
            $result= mysqli_query($conn, $sql);
        }elseif($type=== "Admin" && $pwd==="admin" && $uname==="admin@gmail.com"){
            header('Location: admin_dash.php');
        }else{
            echo "<script type='text/javascript'>
                alert('Wrong username or password to continue as admin');
                window.location.replace(\"index.html\");
                </script>";
        }


        if($type==="Student" || $type==="Company"){
            if($result->num_rows > 0){
                $row=$result->fetch_assoc();
                if($row["pwd"]===$pwd){
                    if($GLOBALS['type'] === "Student"){
                        $_SESSION['Email']=$GLOBALS['uname'];
                        echo "<script type='text/javascript'>
                            window.location.replace(\"student_dash.php\");
                            </script>";
                    }elseif($GLOBALS['type'] ==="Company"){
                        echo "hello";
                        $_SESSION['email']=$GLOBALS['uname'];
                        echo "<script type='text/javascript'>
                            window.location.replace('company_dash.php');
                            </script>";
                    }else{
                        echo "<script type='text/javascript'>
                            alert('Wrong password!');
                            window.location.replace(\"index.html\");
                            </script>";
                    }
                }else{
                    echo "<script type='text/javascript'>
                            alert('User Does not exist!');
                            window.location.replace(\"index.html\");
                        </script>";
                }

            }
        }

    }

    $conn->close();

?>