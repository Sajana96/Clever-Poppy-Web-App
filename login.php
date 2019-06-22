<?php
$msg="";
$con = mysqli_connect("localhost","root","","cleverpoppy");


if (isset($_POST['submit'])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$query = "Select * from members where username='$username' and password='$password'";
	$results = mysqli_query($con, $query);
	
	if(mysqli_num_rows($results)==1){
        $row = mysqli_fetch_assoc($results);
		session_start();
		$_SESSION['name']=$row['name'];
		header("Location:dashboard.php");
	}
		
	else{
		$msg="Error username or password";
		}
	
	
	
	}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-primary p-3">User Login</h3>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="p-4" name="frmlogin">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button name="submit" onclick="return validation(frmlogin)"
                            class="btn-danger btn-block" id="logout" onclick="logOutConfirm()">Login</button>
                    </div>
                    <h5 class="text-danger text-center" id="error"><?php echo $msg; ?></h5>

                </form>


            </div>
        </div>
    </div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/validation.js"></script>

</html>