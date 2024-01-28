<?php 
include('../connect_db/connection.php');
if(isset($_POST['send_password'])){
    $token = $_POST["token"];
    $new_password = password_hash($_POST["new_password"], PASSWORD_BCRYPT);

    // Validate the token and update the password in the database
    // For example, you can update the 'password' column in your 'users' table where the 'reset_token' matches
   // Validate the token and update the password in the database
   $sql = "UPDATE user_tb SET password = ? WHERE token = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("ss", $new_password, $token);

if ($stmt->execute()) {
    echo "Password updated successfully.";
} else {
    echo "Error updating password: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
} else {
// echo "Invalid request.";
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
                        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>" style="margin-left: 170px;" class="mt-2 form-control w-75 ">
                        <input type="password" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="New Password" name="new_password" required>
                        <input type="submit" class="submit-btn mx-5 m-2 p-2 rounded-3 " name="send_password" value="New Password">
                        <p class="">Return <a href="./initiate_with_email.php" class="see_me ">back</a></p>
                        
                     </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>