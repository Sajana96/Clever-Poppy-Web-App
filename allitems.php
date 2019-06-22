<?php
session_start();
if(!isset($_SESSION['name'])){
    exit( "<h1>Unauthorised Access<h1><a href='login.php'>Return</a>");
  
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Items</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/shop-homepage.css" rel="stylesheet" />

</head>

<body>
    <div class="sidepanel">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="viewitems.php">View Items</a>
            <a href="addItem.php">Add New Items</a>
            <a href="updateItem.php">Update or Delete Items</a>
        </div>
        <script src="js/openNav.js"></script>

        <span style="font-size:40px;cursor:pointer;color: aliceblue" onclick="openNav()">&#9776; Menu </span><br><br>
        <h5 class="text-light" >User: <?php echo $_SESSION['name'];?></h5><br>
    <a href="logout.php" class="btn btn-danger">Logout</a>

    </div>
    <center>
        <h1>All Items</h1>
    </center><br><br>

    <div class="row" style="margin-left: 7cm; margin-right: 2.5cm">
    <?php
    $con = mysqli_connect("localhost", "root", "", "cleverpoppy");

    if(!$con) {
        echo "Error: unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error:" . mysqli_connect_error() . PHP_EOL;
        exit;
      }

    $query = "SELECT * FROM items";
    $results = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($results)){
        echo"
        <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card h-100'>
                <a href='updateItem.php?icode=".$row['code']."'><img class='card-img-top' src='uploads/".$row['image']."' alt='' /></a>
                <div class='card-body'>
                    <h4 class='card-title' style='color:#2e66c1'>
                        Item Name: ".$row['name']."
                    </h4>
                    <h5>Item Price: ".$row['unitprice']."/=</h5>
                    <h5 class='card-text'>
                        Available Quantity:".$row['quantity']."
                    </h5>
                </div>

            </div>
        </div>";
    }
    ?>
        

    </div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>