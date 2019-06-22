<?php
$msg ="";
session_start();
if(!isset($_SESSION['name'])){
    exit( "<h1>Unauthorised Access<h1><a href='login.php'>Return</a>");
  
}


?>
<?php


$refCode = "";
$name = "";
$price = "";
$quantity = "";
$state = "none";
if(isset($_GET['icode'])){
    $refCode = $_GET['icode'];
    
    
    $state = "block";
    $con = mysqli_connect("localhost", "root", "", "cleverpoppy");
    $query = "SELECT * FROM items where code='$refCode'";
    $results = mysqli_query($con,$query);
    $row = mysqli_fetch_array($results);
    if($row){
        $name = $row['name'];
        $price = $row['unitprice'];
        $quantity = $row['quantity'];
        echo"<div class='col-sm-3  ' style='display:$state; margin-right:2cm; float:right; margin-top:3cm'>
            <div class='card h-100'>
                <a href='updateItem.php?icode=".$row['code']."'><img class='card-img-top' src='uploads/".$row['image']."' alt='' /></a>
                <div class='card-body'>
                    <h4 class='card-title' style='color:#2e66c1'>
                        Item Name: ".$name."
                    </h4>
                    <h5>Item Price: ".$price."/=</h5>
                    <h5 class='card-text'>
                        Available Quantity:".$quantity."
                    </h5>
                </div>

            </div>
        </div>";
    }
    if(isset($_POST['update'])){
        $refCode = $_POST['code'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
    
        $query1="Update items set name='$name', unitprice='$price', quantity='$quantity' where code='$refCode'";
        $results1 = mysqli_query($con,$query1);
    
       
        if($results1){
            $msg= "Updated Succeccfully!!! ";
            header("Location:updateItem.php?icode=$refCode");
        }
    }
    if(isset($_POST['delete'])){
        $refCode = $_POST['code'];
        
    
        $query2="Delete from items where code='$refCode'";
        $results2 = mysqli_query($con,$query2);
    
       
        if($results2){
            $msg= "Deleted Succeccfully!!! ";
            header("Location:updateItem.php?icode=$refCode");
        }
    }

    
    
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update or Delete Item</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <a href="logout.php" class="btn btn-danger" id="logout" onclick="logOutConfirm()">Logout</a>

    </div>

    <center>
        <h1>Update or Delete Item</h1>
    </center> <br><br>
    
    

    <div class="container"
        style="border: solid 1px; width: 600px; height: 480px; padding: 15px;  float: left; margin-left: 6cm;   ">
        <h3>Result</h3>
        <form name="frmResult" method="post" action="#">

            <div class="form-group">
                <label style="font-weight: bold" for="ItemCode">Item Code:</label>
                <input type="text" class="form-control" id="code" name="code" value="<?php echo $refCode;?>" readonly>
            </div>
            <div class="form-group">
                <label style="font-weight: bold" for="ItemName">Item Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
            </div>
            <div class="form-group">
                <label style="font-weight: bold" for="UnitPrice">Unit Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price;?>" >
            </div>
            <div class="form-group">
                <label style="font-weight: bold" for="ItemName">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity;?>">
            </div>

            <button type="submit" class="btn btn-primary" name="update" >Update</button>
            <button type="submit" class="btn btn-danger" name="delete">Delete</button><br>
            <h3 class="text-danger" id="error"><?php echo $msg;?></h3>

        </form>
    </div>
    <?php
    
    
    ?>
    




</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script src="js/validation.js"></script>
</html>
