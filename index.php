<?php
include "config.php";
include "obj/users.php";
session_start();
//$_SESSION['LS_ACCESS']['LS_USER']['ID']=null;
$Users = new Users();
if((isset($_POST['LogIn']))&&(isset($_POST['email'])&&($_POST['email']) != "")&&(isset($_POST['pass'])&&($_POST['pass']) != ""))
{
    $result = $Users->GetUserId($_POST['email'],md5($_POST['pass']));
    if($result != null)
    {
        $_SESSION['LS_ACCESS']['LS_USER']['ID'] = $result;
    } else {}
}
if((isset($_POST['Create']))&&(isset($_POST['email'])&&($_POST['email']) != "")&&(isset($_POST['pass'])&&($_POST['pass']) != ""))
{
    $result = $Users->CreateUser($_POST['email'],md5($_POST['pass']));
    if($result != null)
    {
        $_SESSION['LS_ACCESS']['LS_USER']['ID'] = $result;
    } else {}
}
if(!isset($_SESSION['LS_ACCESS']['LS_USER']['ID'])) {
    include "LogIn.php";
} else {
    include "main.php";
}
