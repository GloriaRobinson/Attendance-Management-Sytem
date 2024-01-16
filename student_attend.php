<?php
include("./connect_db/connection.php");
// include("./php_logic/login_logic.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


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
                    <header>Welcome
                        <?php
                        // Check if the "username" key is set in the session
                        echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
                        ?>
                    </header>
                </div>
                <div class="col-sm-4 text-end">
                    <p class=""><a href="./php_logic/logout_logic.php" class="see_me rounded-3 py-2 px-3 bg-primary text-white">Logout</a></p>
                    <p class=""><a href="./php_logic/details_retrive_logic.php" class="see_me rounded-3 py-2 px-3 bg-primary text-white">Attendance Book</a></p>
                </div>

            </div><br><br>


        </div>
    </section>
    <!-- main section -->
    <section>

        <div class="container p-3 p-md-4 card mt-5">
            <div class="container   mx-10 mt-4">
                <div class="fw-bold text-center fs-5">
                    <header>Add new student</header>
                </div>
            </div>

            <form action="./php_logic/register_student_logic.php" method="POST">

                <div class="row">
                    <div class="col-sm-8">
                        <label class="mt-2" for="course_code">Student Name</label>
                        <input type="text" class="mt-2 form-control" placeholder="Student name" name="student_name" required>
                    </div>

                    <div class="col-sm-4">
                        <label class="mt-2" for="course_code">Registration number</label>
                        <input type="text" class="mt-2 form-control" placeholder="Reg Number" name="reg_number" required>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <label class="mt-2" for="course_code">Course Code</label>
                        <select type="text" class="mt-2 form-control" placeholder="Course Code" name="course_code" required>
                            <?php
                            $sql = "SELECT DISTINCT course_code FROM user_tb";
                            $st = $conn->prepare($sql);
                            $st->execute();

                            // Get result
                            $result = $st->get_result();
                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {
                                // $id = 0;
                                // Fetch data
                                while ($row = $result->fetch_assoc()) {


                                    $course_code = $row['course_code'];






                                    // Process retrieved data as needed
                                    echo "                 
                  <option value='$course_code'>$course_code</option>
              
                  <br>";
                                }
                            } else {
                                echo "No results found";
                            }

                            // Close connections
                            $st->close();
                            //   $conn->close();


                            ?>


                        </select>
                    </div>
                    <div class="col">
                        <label class="mt-2" for="semester">Semester</label>
                        <select type="text" class="mt-2 form-control" placeholder="Semester" name="semester" required>
                            <?php
                            $sql = "SELECT DISTINCT semester FROM user_tb";
                            $st = $conn->prepare($sql);
                            $st->execute();

                            // Get result
                            $result = $st->get_result();
                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {
                                // $id = 0;
                                // Fetch data
                                while ($row = $result->fetch_assoc()) {


                                    $semester = $row['semester'];






                                    // Process retrieved data as needed
                                    echo "                 
                  <option value='$semester'>$semester</option>
              
                  <br>";
                                }
                            } else {
                                echo "No results found";
                            }

                            // Close connections
                            $st->close();
                            //   $conn->close();


                            ?>

                        </select>
                    </div>
                    <div class="col">
                        <label class="mt-2" for="department_code">Department Code</label>
                        <select type="text" class="mt-2 form-control" placeholder="Department Code" name="department_code" required>

                            <?php
                            $sql = "SELECT DISTINCT department_code FROM user_tb";
                            $st = $conn->prepare($sql);
                            $st->execute();

                            // Get result
                            $result = $st->get_result();
                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {
                                // $id = 0;
                                // Fetch data
                                while ($row = $result->fetch_assoc()) {


                                    $department_code = $row['department_code'];






                                    // Process retrieved data as needed
                                    echo "                 
                  <option value='$department_code'>$department_code</option>
              
                  <br>";
                                }
                            } else {
                                echo "No results found";
                            }

                            // Close connections
                            $st->close();
                            //   $conn->close();


                            ?>


                        </select>
                    </div>
                    <input type="submit" class="submit-btn mx-1 m-2 p-2 rounded-3  " value="Add Student" name="add_student">
                </div>
        </div>
        </form>

        </div>
    </section>
    <!-- attendance section -->
    <section>
        <div class="container text-center fw-bold fs-5 m-4">
            <header>Mark Attendance
                <?php
                $current_date = date('Y-m-d:H:i:s');
                echo $current_date;

                ?>
            </header>
        </div>
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg">
                <table class="table table-striped table-hover">
            <caption>list and brief detail of house</caption>
            <thead>
                <tr>
                    <th>S/No</th>
                    <th>Student Name</th>
                    <th>Reg Number</th>
                    <th>Course Code</th>
                    <th>Semester</th>
                    <th>Department Code</th>
                    <th>Attendance</th>

                </tr>
            </thead>
            <tbody>
                <?php

                include("./php_logic/student_retrive_logic.php");


                ?>

            </tbody>
                    </table>
            </div>
        </div>
    </div>
    </section>
</body>

</html>