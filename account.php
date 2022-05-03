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
      input[type="password"] {
          width: 200px;
      }
      </style>
     	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body>
       <?php
    session_start();
      if(!isset($_SESSION["email"])){
    header("location: login.php");
    exit;
}
    ?>
      <?php
// Check if the user is logged in, otherwise redirect to login page

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
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
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


  
    <h2>Do you want to delete your account?</h2>
    <form action="account.php" method="post">
      <button type="submit" name="deleteUser" class="btn btn-danger">Delete Account</button>
    </form>
  </div>
      </div>
      </div>
      <?php
      $userid=$_SESSION['user_id'];
      $email=$_SESSION['email'];
      if(isset($_POST['deleteUser'])){
        $sql="DELETE FROM Users WHERE email='$email' AND user_id='$userid'";
        $conn->query($sql);
        

        echo "<script>
             alert('deleted successfully!');          
             </script>";
        
        session_destroy();

      }
      
      ?>
      <div class="container my">
      	<div class="row justify-content-center">
            <div class="col-lg-10">
                 
              	<br>

              <h2>Pending Orders for <?echo $_SESSION['first_name']   ?></h2>
              <div class="table-responsive">
                <table class ="table table-striped">
                <thead>
                  <tr>
                    <th>title</th>
                 	
            		
            		<th>Book ID</th>
                    <th>quantity</th>
            		<th>email</th>
                    
                     <th>address</th>
                    <th>purchase price</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
           	$email=$_SESSION['email'];
            $userid=$_SESSION['user_id'];
            $query = "SELECT * FROM confirmed,Book,Fees, Users WHERE Book.book_id=confirmed.book_id AND Book.fee_id=Fees.fee_id AND confirmed.email='$email' AND Users.user_id='$userid'";
                 $result = $conn->query($query);
            if ($result->num_rows > 0) {
                   while ($row = $result->fetch_array()) {
                     $total =0;
                     $total+= $row['quantity']*$row['purchase_price'];
                     $totalBooks+=$row['quantity'];
                     $earning+=$row['quantity']*$row['purchase_price'];
             ?>      
             <tr>
               <td><?php echo $row['title']?></td>
            
            
            <td><?php echo $row['book_id']?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php echo $row['email']?></td>
            
            <td><?php echo $row['address']?></td>
            <td><?php echo $row['purchase_price']?></td>
               <td><?php echo sprintf("%0.2f", $total)?> </td>
               
               
             </tr>
              <?php   }
         }else{
             echo "<h2>No record found!</h2>";
         } ?> 
                   
         </tbody>
                </table>
                
              </div>
             </div>
          </div>
               <?php echo 'Total pending book(s) <b>' .$totalBooks.'</b> purchased!' ?>
              <br>
              <?php echo 'You have spent <b>$' .$earning.'</b> so far!' ?>
      </div>
</body>
</html>