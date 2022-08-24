<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php    include("cdn.php");
    include("middlewares/isLoggedIn.php");  ?>
</head>
<body>
    
<?php
    extract($_GET);
    $activeuser = $_SESSION["onlineuser"]["Email"];
    require_once("connection.php");

    $query = "UPDATE uploads set sold=1 where image = '$image';";
    $result = mysqli_query($connection,$query);

    $query2 = "UPDATE uploads set buyer='$activeuser' where image = '$image';";
    $result2 = mysqli_query($connection,$query2);
    if($result2){
        header("location:browse.php");
    }else{
        echo "something went wrong, Please contact administration";
        echo mysqli_error($connection);
    }




?>
</body>
</html>