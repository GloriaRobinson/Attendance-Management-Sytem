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

    // Validate other fields as needed
    if (
        empty($full_name) || empty($email) || empty($phone_number) || empty($lecturer_id) || empty($course_name) ||
        empty($course_code) || empty($semester) || empty($class_name) || empty($department_code) || empty($username) || empty($password) || !$email_valid
    ) {
        echo "Invalid input. Please fill in all the required fields and provide a valid email address.";
        exit();
    }

    $qy = "SELECT * FROM `user_tb` WHERE username=? OR email=?";
    $stmt = mysqli_prepare($conn, $qy);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        $sql = "INSERT INTO `user_tb`(`full_name`, `email`, `phone_number`, `lecturer_id`, `course_name`, `course_code`, `semester`, `class_name`, `username`, `password`, `department_code`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($insertStmt, "sssssssssss", $full_name, $email, $phone_number, $lecturer_id, $course_name, $course_code, $semester, $class_name, $username, $password, $department_code);

        if (mysqli_stmt_execute($insertStmt)) {
            header('location:../register.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "User with the given username or email already exists.";
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($insertStmt);
    mysqli_close($conn);
}
?>