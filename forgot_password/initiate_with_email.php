<?php 
include('../connect_db/connection.php');
if(isset($_POST['send_email'])){
    $email=$_POST['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $token=bin2hex(random_bytes(32));
        $timestamp=date('YY:MM:DD');
        $sql="INSERT INTO forgot_password_tb(email,token,timestamp) VALUES ('$email','$token','$timestamp')";
        // $stmt->$conn->prepare($sql);
        // $stmt->execute();
        $result=mysqli_query($conn, $sql);

        $reset_link="https://127.0.0.1:443/GloriaRobinson/Attendance-Management-Sytem/forgot_password/reset_password_form.php?=token=$token";
        $message="click the following link to reset password:$reset_link";
        mail($email,"PASSWWORD RESET",$message);
    }

    
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Smart College</title>
</head>
<body>
    <!-- nav section rule -->
    <section class="text-center">
    <div class="nav-container text-center fw-bold ">
         <header class="fst-italic fs-3 nav-header">Attendance Management System</header>
        </div>
    </section>
    <!-- welcome section view -->
    <section>
        <div class="container text-center fw-bold fs-5 m-4">
           <header>FORGOT PASSWORD </header>          
        </div>
    </section>
    <!-- main section -->
    <section>
        <div class="container  mt-5">
            <div class="row">
               
                <div class="col-sm text-center ">
                        <form method="POST">
                        <input type="email" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Email Address" name="email" required>
                        <input type="submit" class="submit-btn mx-5 m-2 p-2 rounded-3 " name="send_email" value="Send Email">
                        <p class="">Return <a href="../index.php" class="see_me ">back</a></p>
                        
                     </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>