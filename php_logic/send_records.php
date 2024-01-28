<?php
include("../connect_db/connection.php");
session_start();

if(isset($_POST['attendance'])) {
    $reg_number = $_POST['reg_number'];
    $status = $_POST['attendance'];
    $attendance_date = date("Y-m-d"); // Get current date

    // Check if the student is already registered on the same date
    $check_stmt = $conn->prepare("SELECT reg_number FROM attendence_records WHERE reg_number = ? AND attendence_date = ?");
    $check_stmt->bind_param("ss", $reg_number, $attendance_date);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if($check_result->num_rows > 0) {
        // Student is already registered on the same date, update the status
        $update_stmt = $conn->prepare("UPDATE attendence_records SET status = ? WHERE reg_number = ? AND attendence_date = ?");
        $update_stmt->bind_param("sss", $status, $reg_number, $attendance_date);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        // Student is not registered on the same date, insert a new registration entry
        $insert_stmt = $conn->prepare("INSERT INTO attendence_records (reg_number, attendence_date, status) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("sss", $reg_number, $attendance_date, $status);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    // Redirect back to the attendance page or wherever you want after marking attendance
    header("Location: ../student_attend.php");
    exit();
} else {
    // Handle if the form data is not properly submitted
    echo "Form data not submitted correctly.";
}
?>
