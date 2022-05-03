<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
      	<title>Bookstore</title>
 		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      	<!--<link href="project.css" rel="stylesheet">-->
     	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <style>
            input[type="email"]{ 
                text-align: center;
            }
      </style>
    </head>
    <body>
       <?php
    session_start();
   
    ?>
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
        <div class="card">
            <div class="card-body p-4" align="center">
                <h1 class="card-title mb-5">Sign Up</h1>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="sign-up-email" class="form-control" placeholder="example@example.com" style="width:300px" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="sign-up-password" class="form-control" style="width:300px" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="sign-up-first_name" class="form-control" style="width:300px" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="sign-up-last_name" class="form-control" style="width:300px" required>
                    </div>
                   <!---     <div class="form-label">
                                <select style="width:200px" name="sign-up-user_role_id">
                                    <option value="1">Admin</option>
                                    <option value="2">Purchaser</option>
                                    <option value="3">Customer</option>
                                  </select>
                        	  </div>-->
                    <div class="mb-3">
                      <br>
                      <br>

                        <button type="submit" name="sign-up" class="btn btn-primary">Sign Up</button>
                    </div>
                    <div>
                        <a class="form-text" href="/4990Project/login.php">Click here to log in.</a>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
