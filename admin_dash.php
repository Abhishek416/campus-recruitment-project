<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
                <li class="active"><a href="delete_student_a.php">Delete Student</a></li>
                <li class="active"><a href="delete_company_a.php">Delete Company</a></li>
                <li class="active"><a href="index.html">Logout</a></li>
            </ul>
        </div>
    </nav>

</head>
<body>
    <h2 align="center">ADMIN DASHBOARD</h2>
    <div class="container-fluid" id="dash">
        <div class="row">
            <div class="well col-sm-12" style="background-color: #aed4f1; height:auto; margin:10px;">
                <br><br>
                <?php
                    session_start();
                    $servername='localhost';
                    $username='root';
                    $password='';
                    $dbname='project';

                    $conn = new mysqli($servername,$username, $password, $dbname);

                    if(!$conn){
                        die("Connection failed: " . $conn->connect_error);
                    }

                    echo "<style>
                        table, th, td {
                            border: 2px solid black;
                            border-collapse: collapse;
                        }

                        th, td {
                            padding: 5px;
                            text-align: left;
                        }
                        </style>";

                    echo "
                        <form method='POST' action=''>
                            <select type='text' name='name' placeholder='Select'>
                                <option label='Select To Check'>SELECT TO CHECK</option>
                                <option label='Total Registered Students'>TOTAL REGISTERED STUDENTS</option>
                                <option label='Total Placed Students'>TOTAL PLACED STUDENTS</option>
                                <option label='Total Registered Companies'>TOTAL REGISTERED COMPANIES</option>
                                <option label='Students Placed in Banglore'>STUDENTS PLACED IN BANGLORE</option>
                                <option label='Students Placed As Developers'>STUDENTS PLACED AS DEVELOPERS</option>
                                <option label='Total Vacancies'>TOTAL VACANCIES</option>
                                <input type='submit'></input>
                            </select>
                        </form>        
                    ";

                    if( isset($_POST['name']) && $_POST['name']=="TOTAL REGISTERED STUDENTS" ){
                        $sql="SELECT * FROM STUDENTS";  
                        $result = $conn->query($sql);

                        echo "<h4 align='center'>REGISTERED STUDENTS</h4>";
                        echo "<br>";
                        
                        if($result->num_rows > 0){
                            echo "
                                <table class='table table-hover'>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>D.O.B</th>
                                    <th>Degree</th>
                                    <th>Branch</th>
                                    <th>Year of Passing</th>
                                    <th>12th Percentage</th>
                                    <th>10th Percentage</th>
                                </tr>
                            ";

                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>".$row['Name']."</td>
                                        <td>".$row['Email']."</td>
                                        <td>".$row['Phone']."</td>
                                        <td>".$row['DOB']."</td>
                                        <td>".$row['Degree']."</td>
                                        <td>".$row['Branch']."</td>
                                        <td>".$row['Yr']."</td>
                                        <td>".$row['Twp']."</td>
                                        <td>".$row['Tenp']."</td>
                                    </tr>
                                ";
                            }
                            echo "</table>";
                        }else {
                            echo "0 results";
                        }
                    }


                    if(isset($_POST['name']) && $_POST['name'] == "TOTAL VACANCIES"){
                        $sql = "SELECT * FROM VACANCY";
                        $result = $conn->query($sql);

                        echo "<h4 align='center'>TOTAL VACANCIES</h4>";
                        echo "<br>";

                        if($result->num_rows > 0){
                            echo "
                                <table class='table table-hover'>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Job Title</th>
                                    <th>Salary</th>
                                    <th>Location</th>
                                    <th>Bond</th> 
                                </tr>                             
                            ";

                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>".$row['company_name']."</td>
                                        <td>".$row['job_title']."</td>
                                        <td>".$row['salary']."</td>
                                        <td>".$row['location']."</td>
                                        <td>".$row['bond']."</td>                        
                                    </tr>
                                ";
                            }
                            echo "</table>";
                        }else {
                            echo "0 results";
                        }
                    }

                    if( isset($_POST['name']) && $_POST['name']=="TOTAL REGISTERED COMPANIES" ){
                        $sql="SELECT * FROM COMPANY";  
                        $result = $conn->query($sql);

                        echo "<h4 align='center'>REGISTERED COMPANIES</h4>";
                        echo "<br>";
                        
                        if($result->num_rows > 0){
                            echo "
                                <table class='table table-hover'>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>C.E.O</th>
                                    <th>C.T.O</th>
                                    <th>H.R</th>
                                    <th>Worth</th>
                                    <th>Founded on</th>
                                    <th>Founder</th>
                            ";

                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>".$row['Name']."</td>
                                        <td>".$row['Email']."</td>
                                        <td>".$row['Phone']."</td>
                                        <td>".$row['Location']."</td>
                                        <td>".$row['CEO']."</td>
                                        <td>".$row['CTO']."</td>
                                        <td>".$row['HR']."</td>
                                        <td>".$row['Worth']."</td>
                                        <td>".$row['Founder']."</td>
                                        <td>".$row['Founder']."</td>
                                    </tr>
                                ";
                            }
                            echo "</table>";
                        }else {
                            echo "0 results";
                        }
                    }      
                    
                    if(isset($_POST['name']) && $_POST['name']=="TOTAL PLACED STUDENTS") {
                        $sql = "SELECT * FROM STUDENTS as S,APPLICATIONS as A,VACANCY as V where S.Email=A.s_mail and A.job_id=V.job_id and A.status=1 ";
                        $result = $conn->query($sql);
                    
                        echo "<h4 align=\"center\">PLACED STUDENTS</h4>";
                        echo "<br>";
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-hover'>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Degree</th>
                                            <th>Branch</th>
                                            <th>C.P.I.</th>
                                            <th>12th Percentage</th>
                                            <th>10th Percentage</th>
                                            <th>Company</th>
                                            <th>Job Title</th>
                                            <th>Salary (LPA)</th>
                                            <th>Location</th>
                                        </tr>";
         
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>".$row["Name"]."</td>
                                        <td>".$row["Email"]."</td>
                                        <td>".$row["Phone"]."</td>
                                        <td>".$row["Degree"]."</td>
                                        <td> ".$row["Branch"]."</td>
                                        <td>".$row["CPI"]."</td>
                                        <td>".$row["Twp"]."</td>
                                        <td>".$row["Tenp"]."</td>
                                        <td>".$row["company_name"]."</td>
                                        <td>".$row["job_title"]."</td>
                                        <td>".$row["salary"]."</td>
                                        <td>".$row["location"]."</td>
                                    </tr>";
                            }
                            echo "</table>";
                        }  else {
                            echo "0 results";
                        }
                    }

                    if(isset($_POST['name']) && $_POST['name']=="STUDENTS PLACED AS DEVELOPERS") {                     
                        $sql = "SELECT * FROM STUDENTS as S,APPLICATIONS as A,VACANCY as V where S.email=A.s_mail and A.job_id=V.job_id and A.status=1 and V.job_title='Developer'";
                        $result = $conn->query($sql);
                    
                        echo "<h4 align=\"center\">STUDENTS PLACED AS DEVELOPERS</h4>";
                        echo "<br>";
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-hover' >
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Degree</th>
                                        <th>Branch</th>
                                        <th>C.P.I.</th>
                                        <th>12th Percentage</th>
                                        <th>10th Percentage</th>
                                        <th>Company</th>
                                        <th>Job Title</th>
                                        <th>Salary (LPA)</th>
                                        <th>Location</th>
                                    </tr>";
         
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>".$row["Name"]."</td>
                                        <td>".$row["Email"]."</td>
                                        <td>".$row["Phone"]."</td>
                                        <td>".$row["Degree"]."</td>
                                        <td>".$row["Branch"]."</td>
                                        <td>".$row["CPI"]."</td>
                                        <td>".$row["Twp"]."</td>
                                        <td>".$row["Tenp"]."</td>
                                        <td>".$row["company_name"]."</td>
                                        <td>".$row["job_title"]."</td>
                                        <td>".$row["salary"]."</td>
                                        <td>".$row["location"]."</td>
                                    </tr>";
                            }
                            echo "</table>";
                        }  else {
                            echo "0 results";
                        }
                    }




                ?>
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
                        <li><i class="fab fa-twitter fa-2x"><a href='#'></a></i></li>
                        <li><i class="fab fa-instagram fa-2x"><a href='#'></a></i></li>
                        <li><i class="fab fa-linkedin fa-2x"><a href='#'></a></i></li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>
</html>