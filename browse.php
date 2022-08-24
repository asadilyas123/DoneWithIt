<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <?php  
     include("cdn.php");
    include("middlewares/isLoggedIn.php"); ?>
</head>
<body>
    <div class="header">
    <h1>Click on any item for more information</h1>
    <a href="index.php" id="dashboardbtn" class="btn btn-primary">Dashboard</a>
    </div>




<?php
    $activeuser = $_SESSION["onlineuser"]["Email"];

    require_once("connection.php");

     

       $query = "SELECT* from uploads where email != '$activeuser' and sold != 1;";    
       $result = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($result)){
        $image[] = $row["image"];

       }
       

       $files = scandir("uploads");
       array_splice($files,0,2);
       
       foreach($image as $file):

        $query = "SELECT * from uploads where image = '$file';";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result); 
        $item = $row["item_title"];
        
       
?>
  <div class="card">
    <a href="itemDetails.php?image=<?= $file ?>" class="stretched-link"> <img class="card-img-top" src="uploads/<?= $file ?>" alt="" alt="Card image"> </a>
    <div class="card-body">
      <h4 class="card-title"><?= $item ?></h4>
    </div>
  </div>
<?php endforeach; ?>


<style>
    *{
        background-color: #D9EEE1;
    }
    .header a{
        display:grid;
      margin: 5px 450px;
    }
    .card{
        float:left;
        margin: 35px 20px;
        height:250px;
        width: 250px;
    }
    .card-img-top{
        height:250px;
        width: 250px;
    }
    


</style>

    
</body>
</html>