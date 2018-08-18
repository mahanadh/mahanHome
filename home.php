<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 8/18/2018
 * Time: 3:50 PM
 */
session_start();
include_once 'class.user.php';
$user = new User(); $uid = $_SESSION['uid'];
if (!$user->get_session()){
    header("location:startpage.php");
}

if (isset($_GET['q'])){
    $user->user_logout();
    header("location:startpage.php");
}

$connect = mysqli_connect("localhost", "root", "", "php_class");
if(isset($_POST["insert"]))
{
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO tbl_images(name) VALUES ('$file')";
    if(mysqli_query($connect, $query))
    {
        echo '<script>alert("Image Inserted into Database")</script>';
    }
}

?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
Home
<style>
    body{
        font-family:Arial, Helvetica, sans-serif;
    }
    h1{
        font-family:'Georgia', Times New Roman, Times, serif;
    }
    </style>
<div id="container">
    <div id="header"><a href="home.php?q=logout">LOGOUT</a></div>
    <div id="main-body">
        <h1>Hello <?php $user->get_fullname($uid); ?></h1>
    </div>
    <div id="footer"></div>
</div>




<html>
<head>
    <title>My home page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script
</head>
<body>
<br /><br />
<div class="container" style="width:500px;">
    <h3 align="center">Your Photo Display </h3>
    <br />
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image" />
        <br />
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
    </form>
    <br />
    <br />
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
        </tr>
        <?php
        $query = "SELECT * FROM tbl_images ORDER BY id DESC";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="400" width="400" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';
        }
        ?>
    </table>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#insert').click(function(){
            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>