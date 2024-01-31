<?php
include("../connect_db/connection.php"); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regNumber = $_POST['regNumber'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    // Update the 'attendence_records' table
    $stmt = $conn->prepare("INSERT INTO attendence_records (reg_number, attendence_date, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $regNumber, $date, $status);
    $stmt->execute();
    $stmt->close();

    // Update the 'add_student_tb' table if needed
    // ...

    echo "Attendance saved successfully!";
} else {
    echo "Invalid request method!";
}
?>
