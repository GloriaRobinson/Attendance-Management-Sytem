<?php
include("./connect_db/connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_student'])) {
        // Your code to insert new student data into the database
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['mark_attendance'])) {
        // Your code to mark attendance and insert records into the new database
        $stmt = $conn->prepare("SELECT * FROM add_student_tb");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student_name = $row['student_name'];
                $reg_number = $row['reg_number'];
                $course_code = $row['course_code'];
                $semester = $row['semester'];
                $department_code = $row['department_code'];
                $attendance_status = $_POST['attendance_' . $reg_number]; // Assuming you have checkboxes for each student's attendance

                // Insert attendance record into the new database table
                $insert_stmt = $conn->prepare("INSERT INTO add_records_student (student_name, reg_number, course_code, semester, department_code, status) VALUES (?, ?, ?, ?, ?, ?)");
                $insert_stmt->bind_param("ssssss", $student_name, $reg_number, $course_code, $semester, $department_code, $status);
                $insert_stmt->execute();
                
            }
            $insert_stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<!-- Your HTML form -->
<form action="" method="POST">
    <!-- Your existing form fields -->
    <!-- Example: -->
    <input type="checkbox" name="attendance_1" value="Present"> Present
    <input type="checkbox" name="attendance_2" value="Absent"> Absent

    <input type="submit" class="btn btn-lg btn-primary btn-start" value="Mark Attendance" name="mark_attendance">
</form>


    
</body>
</html>