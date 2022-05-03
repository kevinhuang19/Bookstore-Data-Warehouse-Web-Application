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
      $mobhost        = 'localhost';
$mobusername    = 'huang18g_4990';
$mobpassword    = '12345';
$mobdbname      = 'huang18g_4990';
$mobcon         = mysqli_connect($mobhost, $mobusername, $mobpassword, $mobdbname);
if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
              if (isset($_GET['id'])) {
                $id = $_GET['id'];

              $sql="DELETE FROM Book WHERE book_id='$id'";
              $conn->query($sql);
                   $sql2="DELETE FROM Awards WHERE award_id='$id'";
              $conn->query($sql2);

            if($_SESSION["user_role_id"]=='2')//employee
            {
                  echo "<script>
                        window.location.href = 'order.php';
                        alert('Delete successfully!');
                    </script>";
            } 
            if($_SESSION["user_role_id"]=='3')//admin
            {
                  echo "<script>
                        window.location.href = 'order.php';
                        alert('Delete successfully!');
                    </script>";
            } 
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
                <center><input type="button" onclick="
parent.location='https://huang18g.myweb.cs.uwindsor.ca/4990Project/record.php'" class="btn btn-primary" value="Add book"></center>
          
          
          
          <?php
          
          $bookid = $_POST['book_id'];
          $awardtitle=$_POST['award'];
          if(isset($_POST['addawards'])){
            $awards1 = "INSERT INTO `Awards`(`award_id`, `award_title`) VALUES ('$bookid','$awardtitle')";
            $conn->query($awards1);
               $awards2 = "UPDATE `Book` SET Book.award_id = Book.book_id WHERE Book.book_id = '$bookid' ";
            $conn->query($awards2);
            $Awards = mysqli_query($conn, 'SELECT * FROM `Awards`');
           while ($row = mysqli_fetch_array($Awards))
            {
                // escape your strings
                foreach($row as $key => $val)
                {
                    $row[$key] = mysqli_real_escape_string($mobcon, $row[$key]);
                }
                mysqli_query($mobcon, "INSERT INTO `Awards` (`award_id`, `award_title`) VALUES ('" . $row['award_id'] . "', '" . $row['award_title'] . "');");
            }
          }
          ?>
          <form action="" method="post" class="d-flex align-items-center">
        <div class="form-label me-2">
        <select style="width:200px" name="award">
        <option value="" selected="Selected"> - Select Book - </option>
        <?php
          $sql = "SELECT * FROM Awards group by award_title asc";
        	$allbooks = mysqli_query($conn,$sql);
        ?>
          <?
          	while($books = mysqli_fetch_array($allbooks,MYSQLI_ASSOC)):;
          ?>
          <option value="<?php echo $books['award_title'];?>">
            <?php echo $books['award_title'];?>
          </option>
			<?php endwhile;?>
            </select>
          <select style="width:200px" name="book_id">
        <option value="" selected="Selected"> - Select Book - </option>
        <?php
          $sql = "SELECT * FROM Book where award_id ='0' group by book_id  asc";
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
            <input type="submit" name="addawards" class="btn btn-success" value="Add Awards">
            
          </form>
      	<div class="row justify-content-center">
            <div class="col-lg-12">
                 
              	<br>

              <h2>Books List</h2>
              <div class="table-responsive">
                <table class ="table table-striped">
                <thead>
                  <tr>
                 	<th>book ID</th>
            		<th>Title</th>
            		<th>book_shelf_id</th>
                    <th>author</th>
            		<th>publisher</th>
                    <th>year</th>
                    <th>fee_id</th>
                    <th>isbn_10</th>
                     <th>isbn_13</th>
                    <th>genre_id</th>
                    <th>img</th>
                    <th>quantity</th>
                   <th>Action</th>
                    
                  </tr>
                  
                  </thead>
                  <tbody>
                    <?php
             $b="Customer";
            $query = "Select `book_id`,`title` ,`book_shelf_id` ,`author` ,`publisher` ,`year` ,`fee_id`,`isbn_10`  ,`isbn_13` ,`genre_id`,`img` ,`quanlity` FROM Book";
             
                 $result = $conn->query($query);
            if ($result->num_rows > 0) {
                   while ($row = $result->fetch_array()) {
             ?>    
                   
             <tr>
            <td><?php echo $row['book_id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['book_shelf_id']?></td>
            <td><?php echo $row['author']?></td>
            <td><?php echo $row['publisher']?></td>
                 <td><?php echo $row['year']?></td>
                <td><?php echo $row['fee_id']?></td>
                <td><?php echo $row['isbn_10']?></td>
                <td><?php echo $row['isbn_13']?></td>
                <td><?php echo $row['genre_id']?></td>
                <td><?php echo $row['img']?></td>
                <td><?php echo $row['quanlity']?></td>
                        <td><a href="order.php?id=<?=$row['book_id'] ?>" class="btn btn-danger" role="button" name="delete">Delete</a></td>
              
             </tr>
              <?php   }
         }else{
             echo "<h2>No record found!</h2>";
         } 
                    
                    
  $Book = mysqli_query($conn, 'SELECT * FROM `Book`');  
  $Fees = mysqli_query($conn, 'SELECT * FROM `Fees`'); 

                    



while ($row = mysqli_fetch_array($Book))
{
    // escape your strings
    foreach($row as $key => $val)
    {
        $row[$key] = mysqli_real_escape_string($mobcon, $row[$key]);
    }
    mysqli_query($mobcon, "INSERT INTO `Book` (`book_id`, `title`, `book_shelf_id`,`author`, `publisher`, `year`, `fee_id`, `isbn_10`,`isbn_13`, `genre_id`, `img`) VALUES ('" . $row['book_id'] . "', '" . $row['title'] . "', '" . $row['book_shelf_id'] . "','" . $row['author'] . "','" . $row['publisher'] . "','" . $row['year'] . "','" . $row['fee_id'] . "','" . $row['isbn_10'] . "','" . $row['isbn_13'] . "','" . $row['genre_id'] . "','" . $row['img'] . "');");
}
                    
while ($row = mysqli_fetch_array($Fees))
{
    // escape your strings
    foreach($row as $key => $val)
    {
        $row[$key] = mysqli_real_escape_string($mobcon, $row[$key]);
    }
    mysqli_query($mobcon, "INSERT INTO `Fees` (`fee_id`, `rent_price`, `purchase_price`) VALUES ('" . $row['fee_id'] . "', '" . $row['rent_price'] . "','" . $row['purchase_price'] . "');");
}

                    

                    
                    
                    
                    
                    
                    ?> 
                    
                    
                    
         </tbody>
                </table>
              </div>
             </div>
          </div>
      </div>
    </body>
</html>

