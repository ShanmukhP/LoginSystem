<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $showAlert = false;
    $showError = false;
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
  
    if($numExistRows > 0)
    {
        $showError = "Username already exists";
    }
    else
    {


            if($password == $cpassword)
            {
               $hash = password_hash($password, PASSWORD_DEFAULT);
               $sql = "INSERT INTO `users` (`username`,`password`,`dt`) VALUES ('$username','$hash',current_timestamp())";
               $result = mysqli_query($conn,$sql);
               if($result)
               {
                    $showAlert = true;
               }
            }
            else
            {
              $showError = "Passwords do not match";
            }

    }
}



?>





<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fbe33da513.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>

    <style>
    .signup {
        margin-top: 15vh;
    }

    #pswd_info {
        margin: auto;
        margin-top: 20px;
        padding: 0;
        list-style-type: none;
        width: 350px;
        padding: 15px;
        background: #fefefe;
        font-size: .875em;
        border-radius: 5px;
        box-shadow: 0 1px 3px #ccc;
        border: 1px solid #ddd;
        display: none;
    }

    #pswd_info h4 {
        margin: 0 0 10px 0;
        padding: 0;
        font-weight: normal;
    }

    #pswd_info ul {
        list-style-type: none;
        padding-left: 0;
    }


    .invalid {
        padding-left: 22px;
        line-height: 24px;
        color: #ec3f41;
    }

    .valid {
        padding-left: 22px;
        line-height: 24px;
        color: #3a7d34;
    }

    .fas {
        margin: 0 10px 0 0;
    }
    </style>
    <title>Signup</title>
</head>

<body>
    <?php
          require 'partials/_nav.php';
    ?>

    <?php
    if($showAlert)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You have been signed in successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    if($showError)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    

    ?>


    <div class="container col-md-4 signup">
        <h1 class="text-center">Signup to our website</h1>
        <form action="/loginsystem/signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="20" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="30" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                <small class="form-text text-muted">Make sure you type the same password</small>
            </div>
            <button type="submit" class="btn btn-primary submit disabled">SignUp</button>
        </form>


        <div id="pswd_info">
            <h4>Password must meet the following requirements:</h4>
            <ul>
                <li id="letter" class="invalid"><i class="fas fa-times"></i> At least <strong>one letter</strong>
                </li>
                <li id="capital" class="invalid"><i class="fas fa-times"></i> At least <strong>one capital
                        letter</strong></li>
                <li id="number" class="invalid"><i class="fas fa-times"></i> At least <strong>one number</strong></li>
                <li id="schar" class="invalid"><i class="fas fa-times"></i> At least <strong> one special
                        character</strong></li>
                <li id="length" class="invalid"><i class="fas fa-times"></i> Be at least <strong>8 characters</strong>
                </li>
            </ul>
        </div>






    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

</html>