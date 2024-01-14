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
                <div class="col-sm-8"><header>Welcome Kululinda Mlekwa </header> </div>
                <div class="col-sm-4 "><p class=""><a href="index.html" class="see_me rounded-3 py-2 px-3 bg-primary text-white">Logout</a></p></div>
            </div>
            <div class="container text-center fw-bold fs-5 ">
                <header>Add new student</header>
                </div>      
        </div>
    </section>
    <!-- main section -->
    <section>
        <div class="container  mt-5">
            <div class="row">
                <div class="col-sm-8"><input type="text" class="mt-2 form-control w-75" placeholder="Student name" required></div>
                <div class="col-sm-4"> <input type="text"  class="mt-2 form-control w-75 "  placeholder="Reg Number" required></div>
                    
               
                <div class="row text-center ">
                        <div class="col">
                        <input type="text"  class="mt-2 form-control w-75 "  placeholder="Birth Date" required>
                        </div>
                        <div class="col">
                        <input type="text"  class="mt-2 form-control w-75 "  placeholder="Qualification" required>
                       </div>
                       <div class="col">
                        <input type="text"  class="mt-2 form-control w-75 "  placeholder="username" required>
                       </div>
                       <input type="submit" class="submit-btn mx-5 m-2 p-2 rounded-3  " value="Add Student" href="student_attend.html">
                  </div>     
            </div>
        </div>
    </section>
    <!-- attendance section -->
    <section>
        <div class="container text-center fw-bold fs-5 m-4">
        <header>Mark Attendance 09-01-2024</header>
        </div>
        <table class="table table-striped table-hover">
            <caption>list and brief detail of house</caption>
            <thead>
                <tr>
                    <th>S/No</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Course</th>
                    <th>semister</th>
                    <th>branch</th>
                    <th>Attendance</th>
                    
                </tr>
             </thead>
              <tbody>
                    <tr>
                        <td>1</td>
                        <td>hezekiel mjuber</td>
                        <td>T21-03-0987</td>
                        <td>IDIT</td>
                        <td>TWO</td>
                        <td>cive</td>
                        <td>
                                <a href="#">delete</a>
                                <a href="#">update</a>
                            </td>
                     </tr><tr>
                        <td>2</td>
                        <td>hezekiel mjuber</td>
                        <td>T21-03-0987</td>
                        <td>IDIT</td>
                        <td>TWO</td>
                        <td>cive</td>
                        <td>
                                <a href="#">delete</a>
                                <a href="#">update</a>
                            </td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>hezekiel mjuber</td>
                        <td>T21-03-0987</td>
                        <td>IDIT</td>
                        <td>TWO</td>
                        <td>cive</td>
                        <td>
                                <a href="#">delete</a>
                                <a href="#">update</a>
                            </td>
                     </tr><tr>
                        <td>4</td>
                        <td>hezekiel mjuber</td>
                        <td>T21-03-0987</td>
                        <td>IDIT</td>
                        <td>TWO</td>
                        <td>cive</td>
                        <td>
                                <a href="#">delete</a>
                                <a href="#">update</a>
                            </td>
                     </tr>
              </tbody>
        </table>
    </section>
</body>
</html>