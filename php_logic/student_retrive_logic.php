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

        echo "<tr>
                <td>$id</td>
                <td>$student_name</td>
                <td>$reg_number</td>
                <td>$course_code</td>
                <td>$semester</td>
                <td>$department_code</td>
                <td id='actionColumn_$id'>
                    <div id='buttonGroup_$id'>
                        <a class='btn btn-success' href='#' onclick='showPresentButton($id)'>P</a>
                        <a class='btn btn-danger' href='#' onclick='showAbsenceButton($id)'>A</a>
                    </div>
                    <button class='btn btn-success' id='presentButton_$id' style='display:none' onclick='openConfirmationModal(\"markPresent\", $id)'>Present</button>
                    <button class='btn btn-danger' id='absenceButton_$id' style='display:none' onclick='openConfirmationModal(\"markAbsence\", $id)'>Absent</button>
                </td>
            </tr>";
    }
} else {
}

// Close connections
$stmt->close();
$conn->close();
?>



<script>
    function showPresentButton(id) {
        document.getElementById(`buttonGroup_${id}`).style.display = 'none';
        document.getElementById(`presentButton_${id}`).style.display = 'block';
        document.getElementById(`absenceButton_${id}`).style.display = 'none'; // Hide the absence button if shown
    }

    function showAbsenceButton(id) {
        document.getElementById(`buttonGroup_${id}`).style.display = 'none';
        document.getElementById(`absenceButton_${id}`).style.display = 'block';
        document.getElementById(`presentButton_${id}`).style.display = 'none'; // Hide the present button if shown
    }

    function markPresent(id) {
        var confirmation = prompt("Are you sure you want to mark this student as present? Type 'yes' to confirm.");

        if (confirmation && confirmation.toLowerCase() === 'yes') {
            // Handle the logic to mark the student as present
            // You can use AJAX to send a request to present_logic.php

            // For demonstration, let's show an alert for now
            alert('Student marked as present');
        }
    }

    function markAbsence(id) {
        var confirmation = prompt("Are you sure you want to mark this student as absent? Type 'yes' to confirm.");

        if (confirmation && confirmation.toLowerCase() === 'yes') {
            // Handle the logic to mark the student as absent
            // You can use AJAX to send a request to absence_logic.php

            // For demonstration, let's show an alert for now
            alert('Student marked as absent');
        }
    }
</script>
