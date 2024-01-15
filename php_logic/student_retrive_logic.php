<?php
// include("../connect_db/connection.php");
// session_start();
$stmt = $conn->prepare("SELECT * FROM add_student_tb");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $id = 0;
    while ($row = $result->fetch_assoc()) {
        $id = $id + 1;
        $student_name = $row['student_name'];
        $reg_number = $row['reg_number'];
        $course_code = $row['course_code'];
        $semester = $row['semester'];
        $department_code = $row['department_code'];

        echo " <tr>
                                        <td>$id</td>
                                        <td>$student_name</td>
                                        <td>$reg_number</td>
                                        <td>$course_code</td>
                                        <td>$semester</td>
                                        <td>$department_code</td>
                                      
                                        <td><a class='btn btn-primary' href='./present_logic.php?id={$reg_number}'>P</a> <a class='btn btn-primary' href='absence_logic.php?id={$reg_number}'>A</a></td>
                                    </tr><br>";
    }
} else {
}

// Close connections
$stmt->close();
$conn->close();
                
             
?>