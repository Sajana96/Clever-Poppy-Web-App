<?php
session_start();
if(!isset($_SESSION['name'])){
    exit( "<h1>Unauthorised Access<h1><a href='login.php'>Return</a>");
  
}
$msg="";
if(isset($_POST['submit'])){

    $arrPostedValues = array('code', 'name', 'price', 'quantity');
    foreach ($arrPostedValues as $value) {
        if(empty($_POST[$value])) {
          $msg="Fill the empty fields";
        }
      }
    
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES["image"]["name"];
    $tmpname = $_FILES["image"]["tmp_name"];

    if(move_uploaded_file($tmpname, "uploads/$image")){
        $con = mysqli_connect("localhost","root","","cleverpoppy");
        $query = "insert into items (code,name,unitprice,quantity,image) values ('$code','$name','$price','$quantity','$image')";

        $result = mysqli_query($con, $query);

        if( !$result ) {
            exit("Error: failed to execute query.<a href='addItem.php'>return</a> " . mysqli_error($con));
          }
        $msg="Record Inserted successfully";
        mysqli_close($con);
    }


}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Item</title>
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
        <h1>Add Item</h1>
    </center><br><br>
    <div class="container" style="margin-top: 0cm; margin-left: 5.5cm">
        <h3>Fill to Add an Item</h3>
        <form name="frmAdd" method="post" action="#" enctype="multipart/form-data">
            <fieldset style="border: 1px solid; width: 850px; padding: 1cm;">
                <div class="form-group">
                    <label style="font-weight: bold" for="ItemCode">Item Code:</label>
                    <input type="text" class="form-control" id="code" placeholder="Enter Item Code" name="code">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold" for="ItemName">Item Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Item Name" name="name">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold" for="unirPrice">Unit Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter Unit Price" name="price">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold" for="Quantty">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity"
                        name="quantity">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold" for="Image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image" >
                </div>


                <button   class="btn btn-success" name="submit" onclick="return additemValidation(frmAdd)" >Add</button>
                <button type="reset" class="btn btn-warning">Reset</button>&nbsp;&nbsp;<h3 class="text-danger" id="error"><?php echo $msg;?></h3>
            </fieldset>
        </form>
    </div>


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