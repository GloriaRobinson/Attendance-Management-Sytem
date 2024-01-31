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
                                        <td>
                                        <a class='btn btn-success attendance-trigger' data-status='present' onclick='toggleButtons_p($id)'>P</a>
                                        <a class='btn btn-danger attendance-trigger' data-status='absent' onclick='toggleButtons_a($id)'>A</a>
                                        <button class='btn btn-success present-btn' style='display: none;'>Present</button>
                                        <button class='btn btn-danger absent-btn' style='display: none;'>Absent</button>
                                    </td>


                                      
                                        
                                    </tr>
                                    <br>";
    }
} else {
}

// Close connections
$stmt->close();
$conn->close();
                
             
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    // Function to save attendance using AJAX
    function saveAttendance(regNumber, status) {
    console.log('Saving attendance for:', regNumber, 'with status:', status);
        const date = new Date().toISOString().slice(0, 10);

        // Use AJAX to send data to the server
        $.ajax({
            url: 'php_logic/save_attendance.php', // Replace with the actual server-side script
            method: 'POST',
            data: { regNumber, status, date },
            success: function (response) {
                console.log(response); // Log the server response (for debugging)
                // You can add additional logic here based on the server response

                // Optionally, you can perform additional actions after saving to the database
            },
            error: function (error) {
                console.error(error); // Log any errors (for debugging)
            }
        });
    }
</script>

