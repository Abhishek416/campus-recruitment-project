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
                <li class="active"><a href="index.html">Home</a></li>
                <li class="active"><a href="index.html">Logout</a></li>
                <li class="active"><a href="delete_company.php">Delete Account</a></li>
            </ul>
        </div>
    </nav>

    <?php
        session_start();
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="project";

        $conn = new mysqli($servername,$username, $password, $dbname);

        if(!$conn){
            die("Connection failed: ".$conn->connect_error);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $job_title=$_POST['job_title'];
            $salary=$_POST['salary'];
            $location=$_POST['location'];
            $deadline=$_POST['deadline'];
            $bond=$_POST['bond'];
            $tenp=$_POST['tenp'];
            $twp=$_POST['twp'];
            $year=$_POST['yr'];
            $cpi=$_POST['cpi'];
            $degree=$_POST['degree'];                        
            $branch=$_POST['branch'];
            $age=$_POST['age'];
            
            

            $sql="INSERT INTO VACANCY(company_name,job_title,salary,deadline,bond,yr_e,cpi_e,twp_e,tenp_e,branch,age_e,degree_e,location)
                Values(\"".$_SESSION['name']."\",'$job_title', '$salary', '$deadline', '$bond', '$year', '$cpi', '$twp', '$tenp', '$branch', '$age', '$degree', '$location'); ";

            if($conn->query($sql)===TRUE){
                $GLOBALS['conn']->close();
                echo "<script type='text/javascript'>
                    alert('Vacancy Created Successfully!!');
                    window.location.replace('company_dash.php');
                </script>";
            }else{
                echo "Error: ".$sql. "<br>" . $conn->error;
            }
        }
    ?>


</head>
<body>

    <div class="container-fluid" id="dash">
        <h2>CREATE VACANCY</h2>
        <form action="vacancy.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h3>Job Details</h3>
                <hr>
                <ol>
                    <li>
                        <label for="job_title"><b>Job Title:</b></label>
                        <input type="text" name="job_title" required>                    
                    </li>
                    <li>
                        <label for="salary"><b>Salary:</b></label>
                        <input type="decimal" placeholder="in LPA" name="salary" required>
                    </li>
                    <li>
                        <label for="location"><b>Location: </b></label>
                        <input type="text" placeholder="Ex. Delhi" name="location">
                    </li>
                    <li>
                        <label for="deadline"><b>Deadline: </b></label>
                        <input type="date" placeholder=" " name="deadline">
                    </li>
                    <li>
                        <label for="bond"><b>Bond: </b></label>
                        <input type="number" placeholder=" " name="bond">
                    </li>
                    <li>
                        <label for="tenp"><b>10th Percentage: </b></label>
                        <input type="decimal" placeholder="Ex.85.5" name="tenp">
                    </li>
                    <li>
                        <label for="twp"><b>12th Percentage: </b></label>
                        <input type="decmial" placeholder="Ex. 85.5" name="twp">
                    </li>
                    <li>
                        <label for="yr"><b>Year: </b></label>
                        <input type="number" placeholder="Ex. 2019" name="yr">
                    </li>
                    <li>
                        <label for="cpi"><b>CPI: </b></label>
                        <input type="decimal" placeholder="Enter minimum cpi required" name="cpi">
                    </li>
                    <li>
                        <label for="degree"><b>Course: </b></label>
                        <select name="degree" >
                            <option label="btech">BTech</option>
                            <option value="mtech">MTech</option>
                            <option label="be">BE</option>
                            <option label="me">ME</option>
                            <option label="bca">BCA</option>
                            <option label="mca">MCA</option>                           
                        </select>
                    </li>
                    <li>
                        <label for="branch"><b>Branch: </b></label> 
                        <select name="branch" >
                            <option label="cse">CSE</option>
                            <option label="it">IT</option>
                            <option label="ece">ECE</option>
                            <option label="me">ME</option>
                        </select>
                    </li>

                    <li>
                        <label for="age"><b>Maximum age:</b></label>
                        <input type="number" name="age" placeholder=" ">
                    </li>
                </ol>
                <hr>
            </div>
            <p>By create an account you agree to our  <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="registerbtn">Create Vacancy</button>
        </form>

        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
    </div>
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