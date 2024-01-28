<?php
include("../connect_db/connection.php");

if (isset($_POST["add_student"])) {
    function validateAndEscape($conn, $input)
    {
        return mysqli_real_escape_string($conn, $input);
    }

    $student_name = validateAndEscape($conn, $_POST['student_name']);
    $reg_number = validateAndEscape($conn, $_POST['reg_number']);
    $course_code = validateAndEscape($conn, $_POST['course_code']);
    $semester = validateAndEscape($conn, $_POST['semester']);
    $department_code = validateAndEscape($conn, $_POST['department_code']);

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM `add_student_tb` WHERE reg_number=? AND student_name=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $reg_number, $student_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        // No matching records found, proceed with insertion
        $insertQuery = "INSERT INTO `add_student_tb`(`student_name`, `reg_number`, `course_code`, `semester`, `department_code`) 
                        VALUES (?, ?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "sssss", $student_name, $reg_number, $course_code, $semester, $department_code);

        if (mysqli_stmt_execute($insertStmt)) {
            header('location:../student_attend.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    } else {
        echo "The user already exists";
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($insertStmt);
    mysqli_close($conn);
}
?>