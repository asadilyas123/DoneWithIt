<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
<?php    include("cdn.php");
    include("middlewares/isLoggedIn.php");  ?>
</head>
<body>






<?php

   extract($_GET);
   require_once("connection.php");

   $query = "SELECT* from uploads where image = '$image';";
   $result = mysqli_query($connection,$query);
   if(mysqli_num_rows($result) <= 0){
       echo "Wrong information Please try to use website controls";
       die;
   }
   $row = mysqli_fetch_assoc($result);
   $otherimagestr = $row["other_images"];
   $otherimage = explode(" , ", $otherimagestr);
//    print_r($otherimage);
//    die;
   

?>

<div class="container-fluid">
<a href="browse.php" class="btn btn-info" id="browsebtn" style="font-weight:bold">Browse</a>
    <div class="header">
        <div class="card">
            <img class="card-img-top" src="uploads/<?= $image ?>" alt="" alt="Card image"> 
        <!-- <div class="card-body">
            <a href="#" class="btn btn-primary ">Buy Now</a>
        </div> -->
        </div>
        <h1 class="text-primary">Description</h1>
        <p>
            <?= $row["description"] ?>
        </p>
    </div> <br/> <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <hr/>
    <div class="body">
        <h1>Other Gallery Images</h1>

<?php
     $files = scandir("otherimages");
     array_splice($files,0,2);
     foreach($otherimage as $file) :
     
?>
   
  <div class="otherimages">
    <img src="otherimages/<?= $file ?>" alt="">
  </div>
  <?php endforeach; ?>
    </div>

</div>

  <style>
    *{
        background-color: #D9EEE1;
    }
    #browsebtn{
      display:grid;
      margin: 5px 550px;
    }
    .header{
        margin-top: 20px;
    }
    .header h1{
        font-size:3.5rem;
        margin-top: 30px;
        line-height:6.8rem;
        text-decoration:underline;
    }   
    .header p{
        margin-top: 30px;
        font-size:1.5rem;
    }
    .card{
        float:left;
        margin: 35px 20px;
        height:350px;
        width: 350px;
    }
    .card-img-top{
        height:350px;
        width: 350px;
    }
    .card a{
        display:grid;
    }
    .body{
        display: inline-block;
    }
    .otherimages{
        float:left;
        margin: 35px 20px;
        height:250px;
        width: 250px;
    }
    .otherimages img{
        height:250px;
        width: 250px;
    }
    


</style>
    
</body>
</html>