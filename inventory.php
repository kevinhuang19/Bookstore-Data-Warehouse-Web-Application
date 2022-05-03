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
      if($_SESSION["user_role_id"]!='3')
	{
	header("Location: index.php");
    exit();
	}
    ?>
      <?php

        $servername = "localhost";
        $username = "huang18g_4990";
        $password = "12345";
        $dbname = "huang18g_4990";
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
                      			echo '<li class="nav-item"><a class="nav-link active" href="admin.php">Admin</a></li>';
                            }
                      		if($_SESSION['user_role_id']=="2"){ //employee page
                      			echo '<li class="nav-item"><a class="nav-link active" href="employee.php">Employee</a></li>';
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
      
		<div class="container my-5">
      	<!--<div class="row justify-content-center">-->
         <a href="reports.php" class="btn btn-primary">Warehouse Analytics</a>
            <div class="col-lg-7">
                 <!--<h2>Warehouse Management</h2>-->
              	<br>
                  <div>
     
              <?php

              
              ?>
              
              <h2>Books Ordered</h2>
              <div class="table-responsive">
                <table class ="table table-striped">
                <thead>
                  <tr>
                 
                 	<th>Book_id</th>
            		<th>Book Name</th>
            		<th>quantity</th>
                  
                 
               
                  </tr>
                  </thead>
                  <tbody>
                    <?php
             $a="Employee";
            $query = "SELECT stock.book_id,SUM(stock.quantity) AS QUAN,stock.quantity,Book.title FROM stock, Book WHERE Book.book_id=stock.book_id GROUP BY stock.book_id ORDER BY Book.book_id";
             
                 $result = $conn->query($query);
            if ($result->num_rows > 0) {
                   while ($row = $result->fetch_array()) {
             ?>      
             <tr>
                <td><?php echo $row['book_id']?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['QUAN']?></td>
           
          
      
             </tr>
              <?php   }
         }else{
             echo "<h2>No record found!</h2>";
         } ?>                           
         </tbody>
                </table>
              </div>
         
              <div class="table-responsive">

              </div>
             </div>
          </div>
      <div>
    </body>
</html>
