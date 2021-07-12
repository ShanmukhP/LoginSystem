<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}


?>



<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
    .welcome {
        margin-top: 10vh;
    }
    </style>
    <title>Welcome -
        <?php echo $_SESSION['username']?>
    </title>
</head>

<body>
    <?php
          require 'partials/_nav.php';
    ?>


    <div class="container welcome">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
            <p>Hey~ welcome to Kohli Media you have been logged in.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout using <a href="logout.php">this</a> link.</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>


</body>

</html>