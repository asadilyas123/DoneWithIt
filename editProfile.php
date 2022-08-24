<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <?php include("cdn.php");
    include("middlewares/isLoggedIn.php"); ?>
</head>
<body>

<?php 
    extract($_GET);
    include("connection.php");

    $activeemail = $_SESSION["onlineuser"]["Email"];
    $query = "SELECT * from users_login where Email = '$activeemail';";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) <= 0){
        echo "Wrong information Please try to use website controls";
        die;
    }
    $profile = mysqli_fetch_assoc($result);
    extract($profile);


    if(isset($_POST["email"])){
        extract($_POST);
        $password = md5($password);
        $file = $filename;

        if(isset($_FILES["filetoupload"]) && !empty($_FILES["filetoupload"]["name"])){
            $filename = $_FILES["filetoupload"]["name"];
            $newfilename = renamefile($filename);
            move_uploaded_file($_FILES["filetoupload"]["tmp_name"], "profilePics/$newfilename");
            $file = $newfilename;
        }

        $query = "UPDATE users_login set Email='$email',user_Password='$password',First_name='$fname',Last_name='$lname',Mobile='$number',Gender='$gender',filename='$file' where email = '$activeemail';";
        $result = mysqli_query($connection,$query);

        if($result){
            header("location:index.php");
        }else{
            echo "Something went wrong, Please contact administration";
            echo mysqli_error($connection);
        }
    }
    

?>
<div class="background">
<div class="container">
      
        <form class="needs-validation" method="post" enctype="multipart/form-data"   action="" novalidate>
          <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email" name="email" value="<?= $profile['Email'] ?>" placeholder="Enter your Email"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter new password or old passward in case of no change to confirm identity"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" value="<?= $profile['First_name'] ?>" placeholder="Enter your first name"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" value="<?= $profile['Last_name'] ?>" placeholder="Enter your last name"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="number">Mobile Number:</label>
          <input type="tel" class="form-control" id="number" name="number" value="<?= $profile['Mobile'] ?>" placeholder="Enter your mobile number"  required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
          <label for="gender">Gender:</label> <br/>
          <input type="radio"  id="gender" name="gender" value="1" <?= $profile['Gender'] == 1 ? 'checked' : '' ?> required>Male  <br/>
          <input type="radio"  id="gender" name="gender" value="2" <?= $profile['Gender'] == 2 ? 'checked' : '' ?> required>Female
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please select one.</div>
          </div>
          <label>
           <?php if ($profile['filename']): ?>
                <img src="profilePics/<?= $profile['filename'] ?>" style="width:100px">
            <?php else: ?>
                Picture not available
            <?php endif; ?>
            Change Profile picture <input type="file" name="filetoupload" id="filetoupload">
          </label> <br/>
          <button type="submit" class="btn btn-primary btn-block">Confirm</button>
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


<style>
    *{
      background-color: #D9EEE1;
    }

</style>
</div>
</div>
    
</body>
</html>