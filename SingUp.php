<?php
session_start();
if($_SESSION['LS_ACCESS']['LS_USER']['ID'] != null)
{
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>

<div class="container">
    <div class="registration">
        <form action="index.php" class="registration-form" method="post">
            <span>Create Account </span>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="pass" placeholder="Password" minlength="8" required><br>
            <input type="submit" name="Create" value="Create">
            <a href="LogIn.php">I have an account</a>
        </form>
    </div>
</div>