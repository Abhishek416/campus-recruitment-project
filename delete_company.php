<?php
    session_start();
    $servername = 'localhost';
    $username="root";
    $password='';
    $dbname = 'project';

    function phpAlert($msg){
        echo "<script type='text/javascript'>alert('$msg')</script>";
    }

    $conn = new mysqli($servername,$username, $password, $dbname);

    if(!$conn){
        die("Connection failed: ".$conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];

        $sql1 = "SELECT pwd from COMPANY WHERE Email='$uname'";
        $result = $GLOBALS['conn']->query($sql1);

        if($result->num_rows == 0){
            phpAlert("Wrong username entered!");
        }else{
            $row=$result->fetch_assoc();
            if($row['pwd']==$pwd){
                $sql2 = "DELETE FROM COMPANY WHERE Email='$uname'";
                $result2 = $GLOBALS['conn']->query($sql2);

                $sql3="DELETE FROM APPLICATIONS Where c_mail='$uname'";
                $result3 = $GLOBALS['conn']->query($sql3);

                $sql4 = "DELETE FROM VACANCY Where company_name='".$_SESSION['name']."' ";
                $result4 = $GLOBALS['conn']->query($sql4);

                echo "<script type='text/javascript'>
                        alert('Deleted');
                        window.location.replace('index.html');
                    </script>";
            }else{
                phpAlert("Wrong password!");
            }
        }
    }
    $conn->close();
?>