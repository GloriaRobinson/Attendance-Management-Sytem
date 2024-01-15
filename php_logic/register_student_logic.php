<?php
include("../connect_db/connection.php");
if (isset($_POST["add_student"])) {
    function validateAndEscape($conn, $input)
    {
        $escapedInput = mysqli_real_escape_string($conn, $input);
        return $escapedInput;

    }
    $student_name = validateAndEscape($conn, $_POST['student_name']);
    $reg_number = validateAndEscape($conn, $_POST['reg_number']);
    $course_code = validateAndEscape($conn, $_POST['course_code']);
    $semester = validateAndEscape($conn, $_POST['semester']);
    $department_code = validateAndEscape($conn, $_POST['department_code']);


    $qy = "SELECT * FROM `add_student_tb` WHERE reg_number='$reg_number' AND student_name='$student_name'";
    $result = mysqli_query($conn, $qy);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO `add_student_tb`(`student_name`, `reg_number`, `course_code`, `semester`, `department_code`) 
    VALUES ('$student_name','$reg_number','$course_code','$semester','$department_code')";
        // echo $sql;
        $rst = mysqli_query($conn, $sql);
        if ($rst) {
            header('location:../student_attend.php');
        }else{
            echo "NOT";
        }

    }else{
        echo "there user already exists";
    }

}
?>
