<?php
session_start();
if(!isset($_SESSION['name'])){
    exit( "<h1>Unauthorised Access<h1><a href='login.php'>Return</a>");
  
}
$msg="";

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Part</title>
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
    <a href="logout.php" class="btn btn-danger">Logout</a>



    </div>
    <div class="container"
        style="border: solid 1px;  padding: 15px; display: inline-block;  margin-left: 5.5cm ">
        <h3>Search for the Item Here</h3>
        <form name="frmSearch" method="post" action="#">

            <div class="form-group">
                <label style="font-weight: bold" for="ItemCode">Item Code:</label>
                <input type="text" class="form-control" id="code" placeholder="Enter Item Code" name="code">
            </div>
            <div class="form-group">
                <label style="font-weight: bold" for="ItemName">Item Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Item Name" name="name">
            </div>
            


            <button type="submit" class="btn btn-success" name="search">Search</button>
            <button type="reset" class="btn btn-warning">Reset</button>


        </form>
    </div>

    <div class="row" style="margin-left: 5.5cm; margin-right: 2.5cm; margin-top:1.5cm">
    <?php
    
    if(isset($_POST['search'])){

        $searchCode = $_POST['code'];
        $searchName = $_POST['name'];
        $con = mysqli_connect("localhost", "root", "", "cleverpoppy");

    if(!$con) {
        echo "Error: unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error:" . mysqli_connect_error() . PHP_EOL;
        exit;
      }
      $query="SELECT * FROM items where code='' and name=''";
      if($searchCode=="" && $searchName!=""){
        $query ="SELECT * FROM items where  name like '%$searchName%'";
      }
       if($searchCode!="" && $searchName==""){
        $query = "SELECT * FROM items where code='$searchCode'";
      }
        if($searchCode!="" && $searchName!=""){
        $query = "SELECT * FROM items where code='$searchCode' and name='$searchName'";
      }
      
    $results = mysqli_query($con,$query);
    
    if(mysqli_num_rows($results)==0){
        $msg = "No item found";
    }
    else{
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
}
}
    ?>
        
        <h5 class="text-danger text-center" id="error"><?php echo $msg; ?></h5>
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