<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bookstore</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!--  <link href="project.css" rel="stylesheet" />-->

    </head>
    <body>
       <?php
    session_start();
      //   if ( !isset( $_SESSION['count'] ) ) 
     //$_SESSION['count'] = 1; else $_SESSION['count']++;
      // echo( $_SESSION['count'] ); 
    ?>
    <?php
    if(!isset($_SESSION["email"])){
        header("location: login.php");
        exit;
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
                        <a class="nav-link active" href="cart.php">Cart</a>
                    </li>
					</ul>
                </div>
            </div>
        </nav>
       <div class="container">
        <?php

         if (isset($_POST['product-delete']) and isset($_SESSION['email'])) {
        $sql = "DELETE FROM `Cart` WHERE book_id=" . $_POST['product-id'] . " AND email='" . $_SESSION['email'] . "'";
        $conn->query($sql);
    	} else if (isset($_POST['product-update']) and isset($_SESSION['email'])) {
        $sql = "UPDATE `Cart` SET `quantity`=" . $_POST['product-quantity'] . " WHERE book_id=" . $_POST['product-id'] . " AND email='" . $_SESSION['email'] . "'";
        $conn->query($sql);
    	}
        /* work on rent purchase
          if (isset($_POST['rent-delete']) and isset($_SESSION['email'])) {
        $sql = "DELETE FROM `Cart` WHERE book_id=" . $_POST['rent-id'] . " AND email='" . $_SESSION['email'] . "'";
        $conn->query($sql);
    	} else if (isset($_POST['rent-update']) and isset($_SESSION['email'])) {
        $sql = "UPDATE `Cart` SET `quantity`=" . $_POST['rent-quantity'] . " WHERE book_id=" . $_POST['rent-id'] . " AND email='" . $_SESSION['email'] . "'";
        $conn->query($sql);
    	}*/

        // Store schedule data
        $sql = "SELECT book_id, quantity, email FROM Cart WHERE email='" . $_SESSION['email'] .  "'";
        $total = 0;
        $a="1";//purchase
        $b="2";//rent
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $sql = $sql = "SELECT book_id, title,Fees.purchase_price AS p, author, img FROM Book, Fees WHERE Fees.fee_id= Book.fee_id AND book_id=" . $row['book_id'];
                $item = $conn->query($sql)->fetch_assoc();
              	//if($a==$row['Fees.purchase_type']){
                 $total+= $row['quantity']*$item['p'];
              	
                echo '<br><div class="card mb-3">
                <div class="row align-items-center">
                <div class="col-md-2">
                
                <img src="' . $item['img'] . '" class="img-fluid rounded-start" alt="' . $item['title'] . '">
                </div>
                <div class="col-md-10">
                <div class="card-body">
                <h6 class="card-title">' . $item['title'] . ' x ' . $row['quantity'] . '</h6>
                <p class="card-text"><small class="text-muted">$' . sprintf("%0.2f",$row['quantity'] * $item['p']) . '</small></p>
                <form action="" method="post">
                <div class="row mt-3">
                <div class="col-2 pe-2">
                <select class="form-select" name="product-quantity">';
                for ($x = 1; $x <= 10; $x++) {
                    if ($x === $row['quantity']) {
                        echo '<option value="' . $x . '" selected">' . $x . '</option>';
                    } else {
                        echo '<option value="' . $x . '">' . $x . '</option>';
                    }
                }
                echo '</select>
                </div>
                <div class="col-5 p-0">
                <button type="submit" name="product-update" class="btn btn-primary">Update Quantity</button>
                <button type="submit" name="product-delete" class="btn btn-danger">Delete Item</button>
                <input type="hidden" name="product-id" value="' . $row['book_id'] . '">
                
                </div>
                </div>
                
                </form>
                </div>
                </div>
                </div>
                </div>
                
              ';
                //}
              	
            }
           echo '<h3>$' . sprintf("%0.2f", $total). '</h3>';
       	 	echo '<a href="confirm.php" class="btn btn-success">Buy</a><br><br>';
        }
       
         $conn->close();
        ?>
         
    </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

