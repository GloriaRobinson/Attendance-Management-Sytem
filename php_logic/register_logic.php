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
    $username = validateAndEscape($conn, $_POST['username']);
    $password = validateAndEscape($conn, $_POST['password']);

    $full_name_valid = preg_match("/^[a-zA-Z\s]+$/", $full_name);
    $lecturer_id_valid = preg_match("/^[a-zA-Z\s]+$/", $lecturer_id);
    $course_name_valid = preg_match("/^[a-zA-Z\s]+$/", $course_name);
    $course_code_valid = preg_match("/^[a-zA-Z\s]+$/", $course_code);
    $semester_valid = preg_match("/^[a-zA-Z\s]+$/", $semester);
    $class_name_valid = preg_match("/^[a-zA-Z\s]+$/", $class_name);
    $username_valid = preg_match("/^[a-zA-Z\s]+$/", $username);
    $password_valid = preg_match("/^[a-zA-Z\s]+$/", $password);
    $email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
    $phone_number_valid = preg_match("/^[0-9]{10}$/", $phone_number);

    $qy = "SELECT * FROM `user_tb` WHERE username='$username_valid' AND email='$email_valid'";
    $result = mysqli_query($conn, $qy);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO `user_tb`(`full_name`, `email`, `phone_number`, `lecturer_id`, `course_name`, `course_code`, `semester`,`class_name`,`username`,`password`) 
    VALUES ('$full_name_valid','$email_valid','$phone_number_valid','$lecturer_id_valid','$course_name_valid','$course_code_valid','$semester_valid','$class_name_valid','$username_valid','$password_valid')";
        // echo $sql;
        $rst = mysqli_query($conn, $sql);
        if ($rst) {
            header('location:../register.php');
        }

    }

}
?>
