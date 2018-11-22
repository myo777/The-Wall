<?php include('connection.php') ?>
<?php
 session_start();

 if (!isset($_SESSION['username'])) {
     $_SESSION['msg'] = "You must log in first";
     header('location: facbookhome.php');
 }
 if (isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['username']);
     header("location: facbookhome.php");
 }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <title>USER Registration system </title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
    </style>

    <link rel="stylesheet" media="all" type="text/css" href="Cs/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" media="all" type="text/css" href="Style.css" />
    <script src="js/jquery-3.2.1.min.js"></script>
</head>
<body> 
    <div class="header">
        <h2>Facebook Home page</h2>
        <a href="register.php">Sign up</a>
        <a href="login.php">Sign in</a>
    </div>
</body>
</html>
    