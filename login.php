


       <?php
    session_start();
    
    $servername = "localhost";
    $username = "huang18g_4990Project";
    $password = "4990Project";
    $dbname = "huang18g_4990Project";
    // Create connection
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_errno) {
        die("Connection failed: " . $conn->connect_error);
    }
      $Users = mysqli_query($conn, 'SELECT * FROM `Users`');
      $mobhost        = 'localhost';
$mobusername    = 'huang18g_4990';
$mobpassword    = '12345';
$mobdbname      = 'huang18g_4990';
$mobcon         = mysqli_connect($mobhost, $mobusername, $mobpassword, $mobdbname);
if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

/**
 * Insert data from old database
 */



while ($row = mysqli_fetch_array($Users))
{
    // escape your strings
    foreach($row as $key => $val)
    {
        $row[$key] = mysqli_real_escape_string($mobcon, $row[$key]);
    }
    mysqli_query($mobcon, "INSERT INTO `Users` (`user_id`, `first_name`, `last_name`,`email`, `password`, `user_role_id`) VALUES ('" . $row['user_id'] . "', '" . $row['first_name'] . "', '" . $row['last_name'] . "','" . $row['email'] . "','" . $row['password'] . "','" . $row['user_role_id'] . "');");
}




      
    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
		<title>Bookstore</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     	<!--<link href="project.css" rel="stylesheet" />-->
     	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>

     

        <!-- Content section-->
      
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">BookStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallary.php">Gallery</a></li>
                    </ul>
					 <ul class="navbar-nav">
                       <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                            } else {
                                echo "Account";
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo '<li><a class="dropdown-item" href="account.php">Account</a></li>';
                                echo '<li><a class="dropdown-item" href="logout.php">Log Out</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="login.php">Log In</a></li>';
                                echo '<li><a class="dropdown-item" href="signup.php">Sign Up</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
					</ul>
                </div>
            </div>
        </nav>
      	<br><br>
      	<div class="container">
        <div class="card" align="center">
            <div class="card-body p-4">
                <h1 class="card-title mb-5">Log In</h1>
                <p>
                    <?php
                  	//$email=$_POST['sign-up-email'];
                    if (isset($_POST['sign-up'])) {
                      $email=$_POST['sign-up-email'];
                      $check_email= "SELECT * FROM Users WHERE email='$email'";
                      $check_email_e= mysqli_query($conn,$check_email) or die(mysqli_error($conn));
                      if(mysqli_num_rows($check_email_e) >0){
                       	echo "Email already used";
                      }
                      else{
                        
                        $sql = "INSERT INTO Users (first_name,last_name,email,password,user_role_id) VALUES ('".$_POST['sign-up-first_name']."','".$_POST['sign-up-last_name']."','".$_POST['sign-up-email']."','".password_hash($_POST['sign-up-password'], PASSWORD_DEFAULT)."',1)";
                        $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        
        $Users = mysqli_query($conn, 'SELECT * FROM `Users`');                 
                        
                        while ($row = mysqli_fetch_array($Users))
{
    // escape your strings
    foreach($row as $key => $val)
    {
        $row[$key] = mysqli_real_escape_string($mobcon, $row[$key]);
    }
    mysqli_query($mobcon, "INSERT INTO `Users` (`user_id`, `first_name`, `last_name`,`email`, `password`, `user_role_id`) VALUES ('" . $row['user_id'] . "', '" . $row['first_name'] . "', '" . $row['last_name'] . "','" . $row['email'] . "','" . $row['password'] . "','" . $row['user_role_id'] . "');");
}



                        echo "Registration Successful";
                      }
                    }
                    ?>
                </p>
				<?php
                  if(isset($_POST['log-in'])){
                    $email = $_POST['log-in-email'];
                    $password = $_POST['log-in-password'];
                    $role = $_POST['log-in-user-role-id'];

                    $sql ="SELECT * FROM Users WHERE email='$email'";
                     $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) >0){
                      $row = mysqli_fetch_assoc($result);
                      if(password_verify($password, $row['password']) && $row['user_role_id']==$role){
                        $_SESSION['email']=$row['email'];
                        $_SESSION['user_id']=$row['user_id'];
                        $_SESSION['user_role_id']=$row['user_role_id'];
                        $_SESSION['first_name']=$row['first_name'];
                        
                        header("Location: index.php");

                      }else{
                          echo 'wrong credentials';
                        	//header("Refresh: 2; url= login.php");
                      }
                    }
                     else{
                       echo 'wrong credentials';
                       //header("Refresh: 2; url= login.php");
                    }
                  }
              mysqli_close($mobcon);
              $conn->close();
              ?>
                <form action="login.php" method="post">
                 <div class="form-label">
                  <select style="width:200px" name="log-in-user-role-id">
                    <option value="" selected="Selected"> - Select Role - </option>
                    <option value="1">Customer</option>
                    <option value="2">Employee</option>
                    <option value="3">Admin</option>
                  </select>
                </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="log-in-email" class="form-control" placeholder="example@example.com" style="height:30px;width:200px" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="log-in-password" class="form-control" style="height:30px;width:200px" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="log-in" class="btn btn-primary">Login</button>
                    </div>
                     <div>
                        <a class="form-text" href="/4990Project/signup.php">Click here to Sign Up.</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
