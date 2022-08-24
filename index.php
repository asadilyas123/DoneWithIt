<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include("cdn.php");
    include("middlewares/isLoggedIn.php") ?>
</head>



<body>

<?php
    include("connection.php");
    $query = "SELECT* from users_login";
    $resultSet = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($resultSet);
    extract($row);

    $activeemail = $_SESSION["onlineuser"]["Email"];
    $query2 = "SELECT* from users_login where Email = '$activeemail';";
    $resultSet2 = mysqli_query($connection,$query2);
    $row2 = mysqli_fetch_assoc($resultSet2);
    $activefilename = $row2["filename"];
    $activeFname = $row2["First_name"];
    $activeLname = $row2["Last_name"];
    $fullname = $activeFname .' '. $activeLname;


    $query3 ="SELECT* from uploads where email = '$activeemail';";
    $resultSet3 = mysqli_query($connection,$query3);
    $totaluploads = mysqli_num_rows($resultSet3);

    $query4 = "SELECT* from uploads where buyer = '$activeemail';";
    $resultSet4 = mysqli_query($connection,$query4);
    $totalpurchased = mysqli_num_rows($resultSet4);

    $query5 = "SELECT* from uploads where email = '$activeemail' and sold = 1;";
    $resultSet5 = mysqli_query($connection,$query5);
    $totalsold = mysqli_num_rows($resultSet5);    
?>
 <div class="background">
       <a href="browse.php" class="btn btn-info" id="browsebtn" style="font-weight:bold">Browse</a>
    <div class="container">
        <div class="row">
            <div class="col-md-8"> <br/>
            <h1>Dashboard</h1> <br/> <br/>
            <h3>Your Statistics</h3> <br>
          <ul class="list-group">
             <li class="list-group-item d-flex justify-content-between align-items-center">
               Number of items you have uploaded
               <span class="badge badge-primary badge-pill"><?= $totaluploads ?></span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-center">
               Number of items you have purchased
               <span class="badge badge-primary badge-pill"><?= $totalpurchased ?></span>
            </li>
             <li class="list-group-item d-flex justify-content-between align-items-center">
               Number of items you have sold
               <span class="badge badge-primary badge-pill"><?= $totalsold ?></span>
            </li>
          </ul>
                <div class="upload_buttons">
                   <a href="uploadItem.php?Email=<?= $activeemail ?>" class="btn btn-success" id="uploadbtn">Upload Item</a>
                   <a href="myItems.php?Email=<?= $activeemail ?>" class="btn btn-success" id="myitemsbtn">My Items</a> </div>
                </div>
            <div class="col-md-4">
            <a class="btn btn-warning" id="logoutbtn" href="logout.php">Log Out</a> <br/> <br/>
                <h2>My Profile</h2>
            <div class="card" style="width:100%">

            <img class="card-img-top" src="profilePics/<?= $activefilename ?>" alt="Click on Edit Profile to upload your profile picture" style="width:100%">
            <div class="card-body">
            <h4 class="card-title" style="font-weight:bolder;"><?php echo $fullname  ?></h4>
            <p class="card-text">To update your profile or change password, Click the button below:</p>
            <a href="editProfile.php?Email=<?= $activeemail ?>" class="btn btn-primary">Edit Profile</a>
            </div>
            </div>
                
        </div>
    </div>
        


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
    .container{
      margin-top: 40px; 
      border: 1px solid black;
      background-color: #F4EFE8;
      
    }
    .col-md-8{
    background-color: #3F84FC;
    }
    .col-md-4{
    background-color: #D9EEE1;
    }
    .upload_buttons{
      background-color:#3F84FC;
      float: right;
      margin:10px 10px;
    }
    #uploadbtn{
      
    }
    #logoutbtn{
      float:right;
    }

    .card-img-top{
        height: 270px;
        background-color:
    }
    h1{
      font-weight: 900;
      background-color: #3F84FC;
      color: white;
      text-decoration: underline;
    }
    h3{
      font-weight: 700;
      background-color: #3F84FC;
      color: white;
    }

</style>
    
</body>
</html>





