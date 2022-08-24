<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Item</title>
    <?php include("cdn.php");
    include("middlewares/isLoggedIn.php"); ?>
</head>
<body>

<?php  extract($_GET);  ?>
<div class="background">
<div class="container">
      
      <form class="needs-validation" method="post" enctype="multipart/form-data" action="" novalidate>
      <div class="form-group">
        <label for="email">Adding Item as:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $Email ?>" readonly>
        </div>
        <div class="form-group">
        <label for="title">Item Title:</label>
        <input type="text" class="form-control" id="item_title" name="item_title" placeholder="Enter title for your item" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter brief description of item (e.g. Condition, Quality, Type etc.)"  required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
        <label for="price">Price Offered:</label>
        <input type="number" class="form-control" id="price_offered" name="price_offered" placeholder="Enter price for your item"  required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
        </div> <br/>
        <label>
          Upload main image <input type="file" name="filetoupload" id="filetoupload" alt="No picture uploaded">
        </label> <br/> <br/>
        <label>
          Other images (if any) <input type="file" name="filestoupload[]" id="filestoupload" multiple alt="No picture uploaded">
        </label> <br/>
        <button type="submit" class="btn btn-primary btn-block">Add</button>
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
    require_once("connection.php");

    if(isset($_POST["item_title"])){
        extract($_POST);
        $file = null;
        $files = array();

        if(isset($_FILES["filetoupload"]) && !empty($_FILES["filetoupload"]["name"]) ){


            $filename = $_FILES["filetoupload"]["name"];
            $newfilename = renamefile($filename);
            move_uploaded_file($_FILES["filetoupload"]["tmp_name"], "uploads/$newfilename");
            $file = $newfilename;
          }
        
    
     // for multiple files   
        if(isset($_FILES["filestoupload"]) && !empty($_FILES["filestoupload"]["name"])){

          for($i=0;$i<count($_FILES["filestoupload"]["name"]);$i++){

          $filename = $_FILES["filestoupload"]["name"][$i];
          $newfilename = renamefile($filename);
          move_uploaded_file($_FILES["filestoupload"]["tmp_name"][$i], "otherimages/$newfilename");
          $files[] = $newfilename;
        }
          $files = implode(" , ",$files);
      }



        $query = "INSERT into uploads (email,item_title,description,price_offered,image,other_images) values ('$email','$item_title','$description','$price_offered','$file','$files');";

        if(mysqli_query($connection,$query)){
            echo "<div class='text-success'>Successfully added an item. You can add another item or click on dashboard to go back.</div>";
        }else{
            echo mysqli_error($connection);
        }
    }


?>

<br/>
    <a href="index.php" id="dashboardbtn" class="btn btn-primary btn-block">Dashboard</a>
    

    <style>
      *{
      background-color: #D9EEE1;
    }

    </style>

  </div>
  </div>
</body>
</html>