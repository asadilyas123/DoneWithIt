<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
   <?php require_once("cdn.php"); ?>
</head>
<body>
    <div class="background">
<div class="container">
    <h1 class="text-primary">Welcome to DoneWithIt</h1> <br/> <br/>
        <form method="post" action="">
            <label for="email">Enter Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <label for="password">Enter Password</label>
            <input type="password" name="password" id="password" class="form-control"> <br>
            <input type="submit" value="Log in" class="btn btn-primary btn-block" > <br>
            <a href="signUp.php" class="btn btn-primary btn-block" >First time here? Sign Up</a>
        </form>

<?php
    if(isset($_POST["email"])){
        require_once("connection.php");
        extract($_POST);

        $query = "SELECT* from users_login where email = '$email';";
        $resultSet = mysqli_query($connection,$query);
          
        if(mysqli_num_rows($resultSet) >= 1){
            $row = mysqli_fetch_assoc($resultSet);
            $hashed_password = $row["user_Password"];
            $password = md5($password);
            if($password == $hashed_password){
            session_start();
            $_SESSION["onlineuser"] = $row;
            header("location:index.php");  }
        
        }

        echo "<div class='alert alert-danger'>Wrong username or password</div>";
    }
        
    
    
?>

<style>
    *{
      background-color: #D9EEE1;
    }
    h1{
        font-size: 3.5rem;
    }

</style>

</div>
</div>
    
</body>
</html>