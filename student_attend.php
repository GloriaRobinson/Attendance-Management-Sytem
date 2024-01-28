<?php
include("./connect_db/connection.php");
session_start();
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
    
    <!-- welcome section view -->
    <section>
        <div class="container text-center fw-bold fs-5 m-4">
            <div class="row">
                <div class="col-sm-8">
                    <header>Welcome <?php echo $_SESSION['username']; ?></header>
                </div>
                <div class="col-sm-4 ">
                    <p class=""><a href="./php_logic/logout_logic.php" class="see_me rounded-3 py-2 px-3 bg-primary text-white">Logout</a></p>
                    <p class=""><a href="./attendance.php" class="see_me rounded-3 py-2 px-3 bg-primary text-white">Attendance Book</a></p>
                </div>
            </div>
            <div class="container text-center fw-bold fs-5 ">
                <header>Add new student</header>
            </div>
        </div>
    </section>

    <!-- main section -->
    <section>
        <div class="container mt-5">
            <form action="./php_logic/register_student_logic.php" method="POST">
                <div class="row">
                    <div class="col-sm-8"><input type="text" class="mt-2 form-control w-75" placeholder="Student name" name="student_name" required></div>
                    <div class="col-sm-4"> <input type="text" class="mt-2 form-control w-75 " placeholder="Reg Number" name="reg_number" required></div>
                    <div class="row text-center ">
                        <div class="col">
                            <label class="mt-2" for="course_code">Course Code</label>
                            <select type="text" class="mt-2 form-control w-75 " placeholder="Course Code" name="course_code" required>
                                <?php
                                $sql = "SELECT DISTINCT course_code FROM user_tb";
                                $st = $conn->prepare($sql);
                                $st->execute();
                                $result = $st->get_result();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $course_code = $row['course_code'];
                                        echo "<option value='$course_code'>$course_code</option>";
                                    }
                                } else {
                                    echo "No results found";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="mt-2" for="semester">Semester</label>
                            <select type="text" class="mt-2 form-control w-75 " placeholder="Semester" name="semester" required>
                                <?php
                                $sql = "SELECT DISTINCT semester FROM user_tb";
                                $st = $conn->prepare($sql);
                                $st->execute();
                                $result = $st->get_result();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $semester = $row['semester'];
                                        echo "<option value='$semester'>$semester</option>";
                                    }
                                } else {
                                    echo "No results found";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="mt-2" for="department_code">Department Code</label>
                            <select type="text" class="mt-2 form-control w-75 " placeholder="Department Code" name="department_code" required>
                                <?php
                                $sql = "SELECT DISTINCT department_code FROM user_tb";
                                $st = $conn->prepare($sql);
                                $st->execute();
                                $result = $st->get_result();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $department_code = $row['department_code'];
                                        echo "<option value='$department_code'>$department_code</option>";
                                    }
                                } else {
                                    echo "No results found";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" class="submit-btn mx-5 m-2 p-2 rounded-3  " value="Add Student" name="add_student">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- attendance section -->
    <section>
        <div class="container text-center fw-bold fs-5 m-4">
            <header>Mark Attendance <?php echo date('Y-m-d:H:i:s'); ?></header>
        </div>
        <table class="table table-striped table-hover">
            <caption>List and brief detail of house</caption>
            <thead>
                <tr>
                    <th>S/No</th>
                    <th>Student Name</th>
                    <th>Reg Number</th>
                    <th>Course Code</th>
                    <th>Semister</th>
                    <th>Department Code</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <?php 
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
                ?>






<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $student_name; ?></td>
    <td><?php echo $reg_number; ?></td>
    <td><?php echo $course_code; ?></td>
    <td><?php echo $semester; ?></td>
    <td><?php echo $department_code; ?></td>
    <td>
        <form action="./php_logic/send_records.php" method="post">
            <input type="hidden" name="reg_number" value="<?php echo $reg_number; ?>">
            <button id='btnp_'.$id type="submit" onclick="toggleButtons_p($id)" name="attendance" value="1" class="btn btn-primary">P</button>
            <button id='btna_'.$id type="submit" onclick="toggleButtons_p($id)" name="attendance" value="0" class="btn btn-primary">A</button>
        </form>
    </td>
</tr>
<!--  -->

<?php
    }
} else {
    echo "No results found";
}
$stmt->close();
// $conn->close();
?>

<?php

// $stmt->close();
$conn->close();
?>
   
   </tbody>
        </table>
        
            
    </section>
</body>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your PHP code here -->

<script>

function toggleButtons_p(id) {
        $('#btnp_' + id).show(); // Hide the 'P' button
        $('#btna_' + id).hide(); 
        $('#btnp_' + id).dblclick(
            function(){
                $('#btnp_' + id).show();
                $('#btna_' + id).show();
            }
        ); 
        // Show the 'A' button
    }
 

    function toggleButtons_a(id) {
        $('#btnp_' + id).hide(); // Show the 'P' button
        $('#btna_' + id).show();
        $('#btna_' + id).dblclick(
            function(){
                $('#btnp_' + id).show();
                $('#btna_' + id).show();
            }
        );  // Hide the 'A' button
    }  $(document).ready(function() {
        // AJAX form submission for adding new student
        $('#addStudentForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: './php_logic/register_student_logic.php',
                data: formData,
                success: function(response) {
                    // Reload student list after successful addition
                    loadStudentList();
                    // Clear form fields
                    $('#addStudentForm')[0].reset();
                }
            });
        });

        // Function to load student list
        function loadStudentList() {
            $.ajax({
                type: 'GET',
                url: 'fetch_student_list.php',
                success: function(response) {
                    $('#studentTable tbody').html(response);
                }
            });
        }

        // AJAX form submission for marking attendance
        $(document).on('click', '.attendanceBtn', function() {
            var regNumber = $(this).data('reg-number');
            var status = $(this).data('status');
            $.ajax({
                type: 'POST',
                url: './php_logic/send_records.php',
                data: {
                    reg_number: regNumber,
                    attendance: status
                },
                success: function(response) {
                    // Reload student list after marking attendance
                    loadStudentList();
                }
            });
        });

        // Initial load of student list
        loadStudentList();
    });

           
    </script>
</body>

</html>

</script>

</html>