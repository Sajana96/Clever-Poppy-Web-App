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
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
</head>

<body class="bgimage">
   <h1 style="font-size:45;color:aliceblue">Dashboard</h1>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="viewitems.php">View Items</a>
        <a href="addItem.php">Add New Items</a>
        <a href="updateItem.php">Update or Delete Items</a>
    </div>
    <script src="js/openNav.js"></script>

    <span style="font-size:40px;cursor:pointer;color: aliceblue" onclick="openNav()">&#9776; Menu</span><br><br>
    <h5 class="text-light" >User: <?php echo $_SESSION['name'];?></h5><br>
    <a href="logout.php" class="btn btn-danger" id="logout" onclick="logOutConfirm()">Logout</a>




</body>
<script src="js/validation.js"></script>


</html>