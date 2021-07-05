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
    
    <script>
        function trclick(s_mail,job_id,object){
            if(s_mail == ""){
                return;
            }else{
                xmlhttp1 = new XMLHttpRequest();
                xmlhttp2 = new XMLHttpRequest();

                xmlhttp1.onreadystatechange = function() {
                    if(xmlhttp1.readyState == 4 && xmlhttp1.status == 200){
                        document.getElementById("display").innerHTML = xmlhttp1.responseText;
                    }                    
                }

                xmlhttp2.onreadystatechange = function(){
                    if(xmlhttp2.readyState == 4 && xmlhttp2.status == 200){
                        document.getElementById("dispjob").innerHTML = xmlhttp2.responseText;
                    }
                }
                xmlhttp1.open("GET","getstudent.php?email="+s_mail,true);
                xmlhttp2.open("GET","getjobdetails.php?job_id="+job_id,true);
                xmlhttp1.send();
                xmlhttp2.send();
            }
        }
    </script>
</head>
<body>

    <nav class="navbar navbar-fixed-top" id="top-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" >Campus Recruitment System</a>
            </div>
            <ul id="list1" class="nav navbar-nav" >
                <li class="active"><a href="index.html">Home</a></li>
                <li class="active"><a href="index.html">Logout</a></li>
                <li class="active"><a href="delete_company.html">Delete Account</a></li>
            </ul>
        </div>
    </nav>

    <h2 align="center" style="font-family:Nova Square">COMPANY DASHBOARD</h2>
    <div class="container-fluid" id="dash">
        <div class="row">
            <div class="col-sm-3" style="margin: 10px">
                <div class="well row" style="background-color: #AED4F1; height: auto;">
                    <img src="images/c1.jpg" alt="" class="img-responsive" height="120px" width="120px" align="center" style="border-radius:50%"></img>
                    <br><br>
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
                        $sql="Select * FROM COMPANY WHERE Email=\"".$_SESSION['email']."\"";

                        $result = $conn->query($sql);
                        $row=$result->fetch_assoc();
                        
                        $_SESSION['name']=$row['Name'];
                        echo "<div class=\"table-responsive table-bordered\">
                                <table class=\"table table-hover\">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>".$row['Name']."</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>".$row['Email']."</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>".$row['Phone']."</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
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
                                        <th>H.R</th>
                                        <td>".$row['HR']."</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>";
                    ?>
                </div>

                <div class="well row" style="background-color: #AED4F1; height:auto;">
                        <h3>Company Jobs</h3>
                        <?php
                            $servername="localhost";
                            $username="root";
                            $dbname="project";
                            $password="";

                            $conn = new mysqli($servername,$username,$password,$dbname);
                            if(!$conn){
                                die('Could not connect: '.mysqli_error($conn));
                            }


                            $sql="SELECT * FROM VACANCY WHERE company_name='".$_SESSION['name']."' ";
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
                                    echo "<form action=\"deleteVacancy.php\" method=\"POST\">";
                                        echo "
                                            <tr>
                                                <td><input type=\"number\" name=\"job_id\" value=\"".$row['job_id']."\" readonly style='width:40px';></td>                                    
                                                <td>".$row['salary']."</td>
                                                <td>".$row['location']." <button type=\"submit\"> X </button></td>";                
                                        echo "</tr>";
                                    echo "</form>";
                                }
                                echo "</table>
                            </div>";
                        ?>
                        <a href="vacancy.php" style="color: black">CREATE VACANCY</a>
                </div>
            </div>
            <div class="well col-sm-4" style="background: color #aed4f1; height:auto; margin: 10px;">
                <h3>DETAILS ABOUT THE STUDENT</h3>
                <div id="display">
                    <img class="img-responsive" src="images/c1.jpg" height="120px" width="120px" align="center" style="border-radius:50%"></img>
                    <br><br>
                    <div class="table-responsive table-bordered">
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>Branch</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>Year of Passing out</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>CPI</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>12th Percentage</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>10th Pecentage</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>Contact No.</th>
                                <td>___</td>
                            </tr>
                            <tr>
                                <th>Course</th>
                                <td>___</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id='dispjob'></div>
            </div>
            
            <div class="well col-sm-4" style="background-color: #aed4f1; height:auto; margin:10px;">
                <h2>Name of Students APPLIED!</h2>
                <p>Click for more details about the student</p>
                <div id="sapp"></div>
                <?php
                    $servername="localhost";
                    $username="root";
                    $password='';
                    $dbname='project';

                    $conn = new mysqli($servername,$username,$password,$dbname);

                    if($conn->connect_error){
                        die("Connection failed: ".$conn->connect_error);
                    }

                    $sql="SELECT * FROM APPLICATIONS where c_mail='".$_SESSION['email']."'";
                    $result=$conn->query($sql);                                                       

                    echo "<div class='table-responsive table-bordered'>
                            <table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <th>App Id</th>
                                        <th>Name of Students</th>
                                        <th>Job_id</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>";

                                    while($row=$result->fetch_assoc()){                                
                                        $sql2="SELECT * FROM STUDENTS WHERE Email='".$row['s_mail']."'";
                                        $result2=$conn->query($sql2);
                                        $row2=$result2->fetch_assoc();
                                        echo "<form action=\"updateStatus.php\" method=\"POST\">";            
                                            echo "<tr onclick=\"trclick('".$row['s_mail']."','".$row['job_id']."',this)\"> ";                                                                                                
                                                echo "
                                                    <td><input type='number' name='app_id' value='".$row['app_id']."' readonly maxlength='4' size='4' style='width:40px;'></td>
                                                    <td>".$row2['Name']."</td>
                                                    <td>".$row['job_id']."</td>                                                                                                    
                                                    <td>
                                                ";
                                                echo "<select name='status' >";
                                                        if($row['status'] == 0){
                                                            echo "<option value='0'>Pending</option>
                                                            <option value='1'>Accept</option>
                                                            <option value='-1'>Reject</option>";
                                                        }elseif($row['status'] == 1){
                                                            echo "
                                                            <option value='1'>Accept</option>
                                                            <option value='0'>Pending</option>
                                                            <option value='-1'>Reject</option>                                                                                                                        
                                                            ";
                                                        }else{
                                                            echo "<option value='-1'>Reject</option>                                                            
                                                            <option value='0'>Pending</option>
                                                            <option value='1'>Accept</option>                                                                                                                  
                                                            ";
                                                        }   
                                                echo "</select>"; echo " ";
                                                echo "<button type='submit'>Update</button>
                                                    </td>";
                                            echo "</tr>";
                                        echo "</form>";                                                                       
                                    } 
                                echo "</tbody>
                            </table>
                    </div>";               
                ?>
            </div>
        </div>
            
    </div>

    
</body>
    <footer>
        <nav class="navbar navbar-footer navbar-fixed-bottom" id="bottom-nav">
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
						<li><i class="fa fa-facebook fa-2x" ><a href='#'></a></i></li>
						<li><i class="fa fa-twitter fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-instagram fa-2x"><a href='#'></a></i></li>
						<li><i class="fa fa-linkedin fa-2x"><a href='#'></a></i></li>
                    </ul>
				</div>
            </div>
        </nav>
    </footer>
</html>