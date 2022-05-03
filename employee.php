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
      if($_SESSION["user_role_id"]!='2')
	{
	header("Location: index.php");
    exit();
	}
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
      
       $mobhost        = 'localhost';
$mobusername    = 'huang18g_4990';
$mobpassword    = '12345';
$mobdbname      = 'huang18g_4990';
$mobcon         = mysqli_connect($mobhost, $mobusername, $mobpassword, $mobdbname);
if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
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
     <?
              if (isset($_GET['id'])) {
                $id = $_GET['id'];

              $sql="DELETE FROM Users WHERE user_id='$id'";
              $conn->query($sql);

            if($_SESSION["user_role_id"]=='2')//employee
            {
                  echo "<script>
                        window.location.href = 'employee.php';
                        alert('Delete successfully!');
                    </script>";
            } 
            if($_SESSION["user_role_id"]=='3')//admin
            {
                  echo "<script>
                        window.location.href = 'admin.php';
                        alert('Delete successfully!');
                    </script>";
            } 
        }
      if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $sql1 = "DELETE FROM confirmed WHERE sno ='$pid'";
        $conn->query($sql1);
            if($_SESSION["user_role_id"]=='2')//employee
            {
                  echo "<script>
                        window.location.href = 'employee.php';
                        alert('Delete successfully!');
                    </script>";
            }
            if($_SESSION["user_role_id"]=='3')//admin
            {
                  echo "<script>
                        window.location.href = 'admin.php';
                        alert('Delete successfully!');
                    </script>";
            } 
      }
              
              
              
              
              ?>
		<div class="container my-5">
      	<div class="row justify-content-center">
            <div class="col-lg-6">
              <br>
                 <a href="order.php" class="btn btn-primary">Order</a>
              	<br>


              <h2>Customer List</h2>
              <div class="table-responsive">
                <table class ="table table-striped">
                <thead>
                  <tr>
                 	<th>Id</th>
            		<th>First Name</th>
            		<th>Last Name</th>
                    <th>Email</th>
            		<th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
             $b="Customer";
            //$query = "SELECT user_id,first_name,last_name,email,description FROM Users, UserRoles WHERE Users.user_role_id=UserRoles.user_role_id and description='$b'";
                    $query = "SELECT * FROM `Users` WHERE user_role_id='1'";
             $role = "1";
                 $result = $conn->query($query);
            if ($result->num_rows > 0) {
                   while ($row = $result->fetch_array()) {
             ?>      
             <tr>
            <td><?php echo $row['user_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php if($role==$row['user_role_id']){
                       echo 'Customer';
                     }?></td>
               <td><a href="employee.php?id=<?=$row['user_id'] ?>" class="btn btn-danger" role="button" name="delete">Delete</a></td>
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
      </div>
      <div class="container">
      <h2>UPDATE STOCK</h2>
              <?
          $stock = $_POST['stock'];
          $book1 = $_POST['selectbook'];
            if(isset($_POST['update'])){
           $sql1="UPDATE Book SET quanlity = quanlity + '$stock' WHERE book_id='$book1'";
            $result = $conn->query($sql1);
               $mobhost        = 'localhost';
$mobusername    = 'huang18g_4990';
$mobpassword    = '12345';
$mobdbname      = 'huang18g_4990';
$mobcon         = mysqli_connect($mobhost, $mobusername, $mobpassword, $mobdbname);
if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

               mysqli_query($mobcon, "INSERT INTO `stock` (`book_id`, `quantity`) VALUES ('" .$book1. "','" .$stock. "');");
              mysqli_close($mobcon);
        
      }
      ?>
        <form action="" method="post" class="d-flex align-items-center">
        <div class="form-label me-2">
        <select style="width:200px" name="selectbook">
        <option value="" selected="Selected"> - Select Book - </option>
        <?php
          $sql = "SELECT * FROM Book order by book_id asc;";
        	$allbooks = mysqli_query($conn,$sql);
        ?>
          <?
          	while($books = mysqli_fetch_array($allbooks,MYSQLI_ASSOC)):;
          ?>
          <option value="<?php echo $books['book_id'];?>">
            <?php echo $books['title'];?>
          </option>
			<?php endwhile;?>
            </select> 
                </div>
        <br>
                 <div class="form-label" >
                  <select style="width:200px" name="stock">
                    <option value="" selected="Selected"> - Select Amount - </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                   <input type="submit" name="update">
                </div>
        </form>
        
        
        
        <div class="container my-5">
      	<div class="row justify-content-center">
            <div class="col-lg-10">
                 
              	<br>

              <h2>All Orders</h2>
              <div class="table-responsive">
                <table class ="table table-striped">
                <thead>
                  <tr>
                    <th>title</th>
                 	
            		
            		<th>Book ID</th>
                    <th>quantity</th>
            		<th>email</th>
                    
                     <th>address</th>
            		<th>time</th>
                    <th>purchase price</th>
                    <th>Total</th>
                    <th> Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
           
            $query = "SELECT * from confirmed, Book, Fees WHERE Book.book_id=confirmed.book_id AND Book.fee_id=Fees.fee_id;";
             
                 $result = $conn->query($query);
            if ($result->num_rows > 0) {
                   while ($row = $result->fetch_array()) {
                     $total =0;
                     $total+= $row['quantity']*$row['purchase_price'];
             ?>      
             <tr>
               <td><?php echo $row['title']?></td>
            
            
            <td><?php echo $row['book_id']?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php echo $row['email']?></td>
            
            <td><?php echo $row['address']?></td>
            <td><?php echo $row['time']?></td>
            <td><?php echo $row['purchase_price']?></td>
               <td><?php echo sprintf("%0.2f", $total)?> </td>
               <td><a href="employee.php?pid=<?=$row['sno'] ?>" class="btn btn-danger" role="button" name="delete">Delete</a></td>
               
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
      </div>
      </div>
    </body>
</html>
