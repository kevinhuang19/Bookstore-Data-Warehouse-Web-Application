<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
      	<title>Bookstore</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body>
       <?php
    session_start();
    ?>
       <?php

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
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		?>
      
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">BookStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <form class="form-inline" style="display: flex; flex-direction: row;" action="/4990Project/index.php">
            </form>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">	
                         <?php 
                      		
                      		$sql = "SELECT email, password,user_role_id FROM Users WHERE user_role_id =3 AND email='" . $_POST['log-in-email'] . "'";
       					 	$login = $conn->query($sql);
                      		
                      		if($_SESSION['user_role_id']=="3"){//admin page
                      			echo '<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>';
                            }
                      		if($_SESSION['user_role_id']=="2"){ //employee page
                      			echo '<li class="nav-item"><a class="nav-link" href="employee.php">Employee</a></li>';
                            }
                      	?>
                        <li class="nav-item"><a class="nav-link"  href="index.php">Home</a></li>
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
      <div class="container">
      <div class="card my-5 align-center">
  <center><form action="insert.php" method="post">
    <table border="0px">
      <tbody>
        <tr>
          <td><label for="title">Title:</label></td>
        <td><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
          
          <td><label for="book_shelf_id">book_shelf_id:</label></td>
          <td><input type="text" name="book_shelf_id" id="book_shelf_id"></td>
        </tr>
        <tr>
          <td><label for="author">author:</label></td>
          <td><input type="text" name="author" id="author"></td>
        </tr>

        <tr>
          <td><label for="publisher"> publisher :</label></td>
          <td><input type="text" name="publisher" id="publisher"><td>
        </tr>

		<tr>
          <td><label for="year">year:</label></td>
          <td><input type="text" name="year" id="year"></td>
        </tr>

		<tr>
          <td><label for="fee_id">fee_id:</label></td>
          <td><select style="width:200px" name="fee_id">
        <option value="" selected="Selected"> - Select Fee - </option>
        <?php
          $sql = "SELECT * FROM Fees order by fee_id asc;";
        	$allbooks = mysqli_query($conn,$sql);
        ?>
          <?
          	while($books = mysqli_fetch_array($allbooks,MYSQLI_ASSOC)):;
          ?>
          <option value="<?php echo $books['fee_id'];?>" >
            <?php echo $books['purchase_price'];?>
          </option>
			<?php endwhile;?>
            </select> </td>
        </tr>

        <tr>
          <td><label for="isbn_10">isbn 10:</label></td>
          <td><input type="text" name="isbn_10" id="isbn_10"></td>
        </tr>

		<tr>
          <td><label for="isbn_13">isbn 13:</label></td>
          <td><input type="text" name="isbn_13" id="isbn_13"></td>
        </tr>
			
        <tr>
          <td><label for="genre_id" >genre_id:</label><td>
          <select style="width:200px" name="genre_id">
        <option value="" selected="Selected"> - Select Book - </option>
        <?php
          $sql = "SELECT * FROM Genre order by genre_id asc;";
        	$allbooks = mysqli_query($conn,$sql);
        ?>
          <?
          	while($books = mysqli_fetch_array($allbooks,MYSQLI_ASSOC)):;
          ?>
          <option value="<?php echo $books['genre_id'];?>" >
            <?php echo $books['genre_name'];?>
          </option>
			<?php endwhile;?>
            </select> 
        </tr>

		<tr>
          <td><label for="img">Image URL :</label></td>
      <td><input type="text" name="img" id="img"></td>
        </tr>

      </tbody>
    </table>
    <input type="submit" class="btn btn-success"value="Add Records">
    </form></center>
      </div>
      </div>
  </body>
</html>
