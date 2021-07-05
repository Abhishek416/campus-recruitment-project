<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

    <?php
        $job_id = $_GET['job_id'];
        $s_mail = $_GET['s_mail'];

        $conn = new mysqli('localhost', 'root', '', 'project');
        if(!$conn){
            die('Could not connect: '. mysqli_error($conn));
        }

        $sql1="SELECT * FROM STUDENTS Where Email='$s_mail'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();

        $sql2 = "SELECT * FROM VACANCY Where job_id = '$job_id'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();

        
        if($row1['Degree'] == $row2['degree_e']){
            echo "Degree required ";
            echo $row2['degree_e']; echo " ";
            echo "<img src='images/tick.png' height='18' width='18'><br>";
        }else{
            echo "Degree required ". $row2['degree_e']."<img scr='images/cross.png' height='18' width='18'><br>";
        }

        if($row1['CPI']>=$row2['cpi_e']){
            echo "CPI required greater than "; echo $row2['cpi_e']; echo " ";
            echo " <img src='images/tick.png' height='18' width='18'><br>";
        }else {
            echo "CPI required greater than "; echo $row2['cpi_e']; echo " ";
            echo " <img src='images/cross.png' height='18' width='18'><br>";
        }

        if($row1['Yr']>=$row2['yr_e']){
            echo "Year of passing required greater than "; echo $row2['yr_e']; echo " ";
            echo " <img src='images/tick.png' height='18' width='18'><br>";
        }else {
            echo "Year of passing required greater than "; echo $row2['yr_e']; echo " ";
            echo " <img src='images/cross.png' height='18' width='18'><br>";
        }

        if($row1['Twp']>=$row2['twp_e']){
            echo "12th %age required greater than "; echo $row2['twp_e']; echo " ";
            echo " <img src='images/tick.png' height='18' width='18'><br>";
        }else {
            echo "12th %age required greater than "; echo $row2['twp_e']; echo " ";
            echo " <img src='images/cross.png' height='18' width='18'><br>";
        }

        if($row1['Tenp']>=$row2['tenp_e']){
            echo "10th %age required greater than "; echo $row2['tenp_e']; echo " ";
            echo " <img src='images/tick.png' height='18' width='18'><br>";
        }else {
            echo "10th %age required greater than "; echo $row2['tenp_e']; echo " ";
            echo " <img src='images/cross.png' height='18' width='18'><br>";
        }

       if($row1['Degree']==$row2['degree_e'] && $row1['CPI']>=$row2['cpi_e'] && $row1['Yr']>=$row2['yr_e'] && $row1['Twp']>=$row2['twp_e'] && $row1['Tenp']>=$row2['tenp_e']){
           echo " <h3> You're eligible!</h3><br>";
           echo " <input type='button' value='Apply' onclick=\"apply_fun('".$job_id."', '".$s_mail."', '".$row2['company_name']."', this)\">";
       }else{
           echo " <h3> You're not eligible!</h3><br>";
       }
        
        
    ?>

</body>
</html>