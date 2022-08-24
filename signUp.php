<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <?php include("cdn.php"); ?>
</head>

<body>
<div class="background">
    <div class="container">
      
        <form class="needs-validation" method="post" enctype="multipart/form-data"   action="" novalidate>
          <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="number">Mobile Number:</label>
          <input type="tel" class="form-control" id="number" name="number" placeholder="Enter your mobile number"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="gender">Gender:</label> <br/>
          <input type="radio"  id="gender" name="gender" value="1" required>Male  <br/>
          <input type="radio"  id="gender" name="gender" value="2" required>Female
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please select one.</div>
          </div>
          <label>
            Upload your picture <input type="file" name="filetoupload" id="filetoupload" alt="No picture uploaded">
          </label> <br/>
          <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form> 

            <script>
            // Disable form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
            }, false);
            });
            }, false);
            })();
            </script>
    



 <?php
     include("connection.php");

     if(isset($_POST["email"])){
        extract($_POST);
        $password = md5($password);
        $file = null;

        if(isset($_FILES["filetoupload"]) && !empty($_FILES["filetoupload"]["name"])){
            $filename = $_FILES["filetoupload"]["name"];
            $newfilename = renamefile($filename);
            move_uploaded_file($_FILES["filetoupload"]["tmp_name"], "profilePics/$newfilename");
            $file = $newfilename;
        }

        $query = "INSERT into users_login (Email,user_Password,First_name,Last_name,Mobile,Gender,filename) values ('$email','$password','$fname','$lname','$number','$gender','$file');";

        if(mysqli_query($connection,$query)){
            echo "<div class='text-success'>You have successfully Signed Up. Click on Log in to access your dashboard</div>";
        }else{
            echo mysqli_error($connection);
        }
     }

     


?> 
    <br/>
    <a href="logIn.php" id="loginbtn" class="btn btn-primary btn-block">Log In</a>

<style>
    *{
      background-color: #D9EEE1;
    }

</style>

    </div>
</div>   
</body>
</html>

