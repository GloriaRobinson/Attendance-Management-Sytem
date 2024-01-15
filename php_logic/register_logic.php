<?php
include("../connect_db/connection.php");
if (isset($_POST["register"])) {
    function validateAndEscape($conn, $input)
    {
        $escapedInput = mysqli_real_escape_string($conn, $input);
        return $escapedInput;

    }
    $full_name = validateAndEscape($conn, $_POST['full_name']);
    $email = validateAndEscape($conn, $_POST['email']);
    $phone_number = validateAndEscape($conn, $_POST['phone_number']);
    $lecturer_id = validateAndEscape($conn, $_POST['lecturer_id']);
    $course_name = validateAndEscape($conn, $_POST['course_name']);
    $course_code = validateAndEscape($conn, $_POST['course_code']);
    $semester = validateAndEscape($conn, $_POST['semester']);
    $class_name = validateAndEscape($conn, $_POST['class_name']);
    $department_code = validateAndEscape($conn, $_POST['department_code']);
    $username = validateAndEscape($conn, $_POST['username']);
    $password = validateAndEscape($conn, $_POST['password']);
    $email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);


   
    $qy = "SELECT * FROM `user_tb` WHERE username='$username_valid' AND email='$email_valid'";
    $result = mysqli_query($conn, $qy);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO `user_tb`(`full_name`, `email`, `phone_number`, `lecturer_id`, `course_name`, `course_code`, `semester`,`class_name`,`username`,`password`,`department_code`) 
    VALUES ('$full_name','$email_valid','$phone_number','$lecturer_id','$course_name','$course_code','$semester','$class_name','$username','$password','$department_code')";
        // echo $sql;
        $rst = mysqli_query($conn, $sql);
        if ($rst) {
            header('location:../register.php');
        }else{
            echo "NOT";
        }

    }else{
        echo "there user already exists";
    }

}
?>
