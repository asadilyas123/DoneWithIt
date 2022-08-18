<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include("cdn.php"); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h1>Dashboard</h1>
            <h3>Your Statistics</h3> <br>
          <ul class="list-group">
             <li class="list-group-item d-flex justify-content-between align-items-center">
               Number of items you have uploaded
               <span class="badge badge-primary badge-pill">12</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-center">
               Number of items you have purchased
               <span class="badge badge-primary badge-pill">50</span>
            </li>
             <li class="list-group-item d-flex justify-content-between align-items-center">
               Number of items you have sold
               <span class="badge badge-primary badge-pill">99</span>
            </li>
          </ul>
            
            </div>
            <div class="col-md-3">
                <h2>My Profile</h2>
                <div class="card" style="width:400px">
                <img class="card-img-top" src="" alt="image" style="width:100%">
                <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <a href="#" class="btn btn-primary">See Profile</a>
            </div>
        </div>
    </div>
        


    </div>
    
</body>
</html>