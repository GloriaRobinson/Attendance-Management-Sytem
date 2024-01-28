
<?php
include("../connect_db/connection.php");

if(isset($_GET['i'])){
$reg=$_GET['i'];
// echo $reg;
$sql = "UPDATE add_student_tb SET status = 0 WHERE reg_number='$reg'";
// echo $sql;
$rst=mysqli_query($conn,$sql);
if($rst){
    // echo "success   ";
    header('location:../student_attend.php');

}
// Close database connection
$conn->close();
}
?>