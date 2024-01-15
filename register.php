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
           <header>FACULTY REGISTRATION </header>          
        </div>
    </section>
    <!-- main section -->
    <section>
        <div class="container  mt-5">
            <div class="row">
               
                <div class="col-sm text-center ">
                        <form action="./php_logic/register_logic.php"method="POST">
                        <input type="text"style="margin-left:170px;" class="mt-2 form-control w-75" placeholder="Full Name" name="full_name" required>    
                        <input type="email" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Email Address" name="email" required>
                        <input type="number" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Phone Number" name="phone_number" required>
                        <input type="text" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Lecture Id" name="lecturer_id" required>
                        <input type="text" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Course Name" name="course_name" required>
                        <input type="text" style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Course Code" name="course_code" required>
                        <input type="text"style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Semester" name="semester" required>
                        <input type="text"style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Class Address" name="class_name" required>
                        <input type="text"style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Department Code" name="department_code" required>
                        <input type="text"style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Username" name="username" required>
                        <input type="password"style="margin-left: 170px;" class="mt-2 form-control w-75 "  placeholder="Password" name="password" required>
                        <input type="submit" class="submit-btn mx-5 m-2 p-2 rounded-3 " name="register" value="Register">
                        <p class="">Return <a href="./index.php" class="see_me ">back</a></p>
                        
                     </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>