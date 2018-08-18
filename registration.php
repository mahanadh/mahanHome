<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 8/18/2018
 * Time: 3:50 PM
 */
include_once 'class.user.php';  $user = new User(); // Checking for user logged in or not

if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $register = $user->reg_user($fullname, $uname,$upass, $uemail);
    if ($register) {
        // Registration Success
        echo 'Registration successful <a href="startpage.php">Click here</a> to login';
    } else {
        // Registration Failed
        echo 'Registration failed. Email or Username already exits please try again';
    }
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


<style>
    body{
        margin: 0;
        padding: 0;
        background: url("255596.jpg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;

    }
    .box
    {
        width: 350px;
        height: 450px;
        position: absolute;
        transform: translate(-50%, -50%);
        color: #ec971f;
        background: #444;
        top: 50%;
        left: 50%;
        box-sizing: border-box;
    }
    .box input[type="text"], input[type="password"], input[type="email"]
    {
        border: none;
        border-bottom: 1px solid #ec971f;
        background: transparent;
        outline: none;
        height: 50px;
        color: #ec971f;
        font-size: 16px;
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
    h1{
        margin: 0;
        text-align: center;
        font-size: 22px;
    }
    .box a{
        text-decoration: none;
        font-size: 12px;
        line-height: 20px;
        color: #ec971f;
    }


</style>

<script type="text/javascript" language="javascript">
    function submitreg() {
        var form = document.reg;
        if(form.name.value == ""){
            alert( "Enter name." );
            return false;
        }
        else if(form.uname.value == ""){
            alert( "Enter username." );
            return false;
        }
        else if(form.upass.value == ""){
            alert( "Enter password." );
            return false;
        }
        else if(form.uemail.value == ""){
            alert( "Enter email." );
            return false;
        }
    }
</script>
<div class="box">
    <h1>Register Here!! </h1>
    <form action="" method="post" name="reg">
        <table>
            <tbody>
            <tr>
                <th><p>Full Name:</p></th>
                <td><input type="text" name="fullname" required="" /></td>
            </tr>
            <tr>
                <th><p>User Name:</p></th>
                <td><input type="text" name="uname" required="" /></td>
            </tr>
            <tr>
                <th><p>Email:</p></th>
                <td><input type="text" name="uemail" required="" /></td>
            </tr>
            <tr>
                <th><p>Password:</p></th>
                <td><input type="password" name="upass" required="" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="startpage.php">Already registered! Click Here!</a></td>
            </tr>
            </tbody>
        </table>
    </form></div>

