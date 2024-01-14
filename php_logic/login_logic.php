<?php
include("../connect_db/connection.php");
session_start();
if(isset($_POST['login'])){
	function test($da){
		$da=htmlspecialchars($da);
		$da=stripslashes($da);
		$da=trim($da);
		return $da;
	}
	$uname=test($_POST['username']);
	$password=$_POST['password'];

	$sql="SELECT * FROM `user_tb` WHERE username='$uname' AND password='$password'";
	$sts=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sts)==0){
		echo "<script>alert('the user not registered');</script>";
        header("location:./login.php");
	}else{
		if(mysqli_num_rows($sts)== 1){
			
			header("location:../student_attend.php");
	}else{
		echo "<script>alert('the user register new account');</script>";
        header("location:./login.php");
	}
}

}




?>
