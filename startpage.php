<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 8/18/2018
 * Time: 4:01 PM
 */

session_start();
include_once 'class.user.php';
$user = new User();

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $user->check_login($emailusername, $password);
    if ($login) {
        // Registration Success
        header("location:home.php");
    } else {
        // Registration Failed
        echo 'Wrong username or password';
    }
}
?>




<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/bootstrap.js"></script>
<style>
    body{
        margin: 0;
        padding: 0;
        background: url("255596.jpg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
    }
    .box{
        width: 350px;
        height: 400px;
        position: absolute;
        transform: translate(-50%, -50%);
        background: #000;
        color: #ec971f;
        top: 50%;
        left: 50%;
        box-sizing: border-box;

    }
    .avatar{
        width: 100px;
        height: 100px;
        position: absolute;
        top: -50px;
        left: calc(50% - 50px);
    }
    h1{
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 22px;
    }
    .box p{
        margin: 10px;
        padding: 0;
        font-weight: bold;
        color: #ec971f;
    }

    .box input{
        width: 90%;
        margin: 10px;

    }
    .box input[type="text"], input[type="password"]
    {
        border: none;
        border-bottom: 1px solid #ec971f;
        background: transparent;
        outline: none;
        height: 50px;
        color: #ec971f;
        font-size: 16px;
    }
    .box input[type="submit"]
    {
        border: none;
        outline: none;
        height: 40px;
        background: #e38d13;
        color: black;
        font-size: 18px;
        border-radius: 20px;
    }
    .box input[type="submit"]:hover
    {
        cursor: pointer;
        background: #e38d13;
        color: darkgrey;
    }
    .box a{
        text-decoration: none;
        font-size: 12px;
        line-height: 20px;
        color: darkgrey;
    }

    .box a:hover
    {
        color: #ec971f;
    }

    </style>

<script type="text/javascript" language="javascript">

    function submitlogin() {
        var form = document.login;
        if(form.emailusername.value == ""){
            alert( "Enter email or username." );
            return false;
        }
        else if(form.password.value == ""){
            alert( "Enter password." );
            return false;
        }
    }

</script>

<div class="box">
    <img src="login.png" class="avatar">
    <br><br><br><br><h1>Login Here</h1><br>
<form action="" method="post" name="login">
    <table>
        <tbody>
        <tr>
            <th><p>UserName or Email:</p></th>
            <td><input type="text" name="emailusername" required="" /></td>
        </tr>
        <tr>
            <th><p>Password:</p></th>
            <td><input type="password" name="password" required="" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="registration.php">Register new user</a></td>
        </tr>
        </tbody>
    </table>
</form>
</div>
</body>
</html>
