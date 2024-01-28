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
        <div class="container welcome-header">
            <div class="row ">
                <div class="col-sm-auto text-end"><img class="w-50 img-fluid" src="/images/logobrand.png"  alt=""></div>
                <div class="col-sm-auto text-center"> <h3 class="py-5">Smart College Of Engineering & Technology</h3></div>
            </div>          
        </div>
    </section>
    <!-- main section -->
    <section>
        <div class="container  ">
            <div class="row">
                <div class="col-sm-8 offset">
                    <img src="images/company.jpg " class="img-fluid float-end mx-5 img-thumbnail " alt="">
                </div>
                <div class="col-sm-4 box-container mt-5 ">
                     <img class="w-50 text-center mt-5 mb-5 mx-5" src="images/education.webp" alt="">
                      <form action="./php_logic/login_logic.php"method="POST">
                        <input type="text" class="mt-2 form-control w-75" placeholder="Enter Username" name="username" required>    
                        <input type="password"class="mt-2 form-control w-75 "  placeholder="Enter Password" name="password" required>
                        <input type="submit" class="submit-btn mx-5 m-2 p-2 rounded-3  " value="login" name="login">
                        <p class="">Forget Password<a href="forgot_password/initiate_with_email.php" class="see_me ">click here</a></p>
                        <p class="">Dont have an Account<a href="register.php" class="see_me">Sign Up</a></p>
                     </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>