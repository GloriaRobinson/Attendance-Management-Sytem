<?php
include("./connect_db/connection.php");
session_start();

// Fetch unique dates from the database
$date_query = "SELECT DISTINCT attendence_date FROM attendence_records";
$date_result = mysqli_query($conn, $date_query);
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
    <p class=""><a href="./student_attend.php" class="btn btn-primary">back</a></p>

    <!-- attendance section -->
    <section>
        <?php
        // Loop through each unique date
        while ($date_row = mysqli_fetch_assoc($date_result)) {
            $current_date = $date_row['attendence_date'];
        ?>
            <div class="container text-center fw-bold fs-5 m-4">
                <header>Marked Attendance for <?php echo $current_date; ?></header>
            </div>
            <table class="table table-striped table-hover">
                 
                <caption>Attendance List</caption>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Reg Number</th>
                        <th>Course Code</th>
                        <th>Semester</th>
                        <th>Department Code</th>
                        <th>Attendance Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Fetch attendance records for the current date
                    $stmt = $conn->prepare("
                        SELECT add_student_tb.student_name AS student_name, add_student_tb.reg_number AS reg_number, add_student_tb.course_code AS course_code, add_student_tb.semester AS semester, add_student_tb.department_code AS department_code, attendence_records.status AS status, attendence_records.attendence_date AS attendence_date
                        FROM add_student_tb
                        JOIN attendence_records ON add_student_tb.reg_number = attendence_records.reg_number
                        WHERE attendence_records.attendence_date = ?
                    ");
                    $stmt->bind_param("s", $current_date);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['student_name'] . "</td>";
                            echo "<td>" . $row['reg_number'] . "</td>";
                            echo "<td>" . $row['course_code'] . "</td>";
                            echo "<td>" . $row['semester'] . "</td>";
                            echo "<td>" . $row['department_code'] . "</td>";
                            echo "<td>" . ($row['status'] ? 'Present' : 'Absent') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No attendance records found for this date.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </section>
</body>

</html>
