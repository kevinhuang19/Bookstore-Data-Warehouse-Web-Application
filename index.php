<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
      	<title>Bookstore</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		 <style>
        .btn1 {
          position: absolute;
          left: 45%;
          margin-top: 50px;
          margin-bottom: 100px;
          border: 1px solid black;
          padding: 10px 30px;
          color: black;
          text-decoration: none;
          transition: 0.6s ease;
        }

        .btn1:hover {
          background-color: black;
          color: white;
        }
      </style>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
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
      <br>
	<div class="container bg-dark"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height: 400px; object-fit: cover;" src="book1.jpg" class="d-block w-100" alt="...">
                  	<div class="carousel-caption d-none d-md-block">
                      <h5 style="font-size:30px; color:black">Welcome to Bookstore</h5>
                     </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 400px; object-fit: cover;" src="book2.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size:30px; color:black">Welcome to Bookstore</h5>
                  </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 400px; object-fit: cover;" src="book3.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size:30px; color:black">Welcome to Bookstore</h5>
                  </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
        </div>
    </div>
      <div class="container">
              
      <center><h2>Most Popular in store!</h2></center>
        <div class="row">
            <?php
          $sql = "SELECT book_id,title, purchase_price, author, img,quanlity FROM Book INNER JOIN Fees ON Book.fee_id=Fees.fee_id LIMIT 0,3";
          //$sql = "SELECT *, MAX(quantity) as max_items FROM orders INNER JOIN Book;";
            // Store schedule data
          $link = mysqli_connect("localhost", "huang18g_4990", "12345", "huang18g_4990");
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT *, SUM(quantity) AS number_of_sales FROM orders INNER JOIN Book WHERE Book.book_id=orders.book_id GROUP BY Book.book_id ORDER BY number_of_sales DESC LIMIT 0,3;";
        $result2 = mysqli_query($link,$sql);
            //$result = $conn->query($sql);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                  	
                    echo "<div class='col-12 col-lg-4 mb-4'><br>
                    		  <div class='card' onclick='location.href=\"https://huang18g.myweb.cs.uwindsor.ca/4990Project/book.php?id=" . $row['book_id'] . "\";'><img src='" . $row['img'] . "' width='275' height='375' class='card-img-top' alt='" . $row['title'] . "'>
                            	<div class='card-body'>
                                <p class='card-text mb-0'>" . $row['title'] . "</p>
                                <p class='card-text'>
                                  <small class='text-muted'>" . $row['author'] . "</small>
                                </p>
                                <!--<p class='card-text'>$" . $row['fee'] . "</p>-->
                                <!--<p class='card-text'>number: " . $row['quanlity'] . "</p>-->
                              </div>
                          </div>
                        </div>";
                }
            }
          	// $conn->close();
            ?>
        </div>
      </div>
          <div class="button">
            <center><a href="gallary.php" class="btn1">View All Books</a></center>
    </div>
    </body>
</html>
