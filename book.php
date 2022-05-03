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
    <style>
      <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

      .light {
  background-color: #6c757d !important;
}
   		footer {
            position: absolute;

            bottom: 0;
            width: 100%;
    
        }
      </style>
    </head>
    <body>
       <?php
    session_start();
    ?>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Bookstore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				
				
				
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                      	<li class="nav-item"><a class="nav-link active" href="gallary.php">Gallary</a></li>
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
        <?php
    // Arrays to store loaded data
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
        $sql= "SELECT book_id,title, Book.fee_id AS p,purchase_price,rent_price, author, img, quanlity FROM Book, Fees WHERE Book.fee_id=Fees.fee_id  and Book.book_id=".$_GET['id'];
        $result = $conn->query($sql);
    ?>
    <div class="container lightblue">
        <div class="row">
            <div class='col-12 col-lg-6'>
                <?php
                    $row = $result->fetch_assoc();
           
                    echo "<br><br><img src='" . $row['img'] . "' width='70%'><br><br><br>";
                ?>
            </div>
            <div class='col-1 col-lg-0'></div>
            <div class='col-12 col-lg-5'>
                <br>
                <br>
                <?php
                    if (isset($_POST['product-add']) and isset($_SESSION['email'])) {
                        $sql = "SELECT book_id, email, quantity FROM Cart WHERE book_id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $item = $result->fetch_assoc();
                            if ((int)$_POST['product-quantity'] + $item['quantity'] >= 10) {
                                $sql = "UPDATE Cart SET quantity=10 WHERE book_id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                            } else {
                                $sql = "UPDATE Cart SET quantity=" . ((int)$_POST['product-quantity'] + $item['quantity']) . " WHERE book_id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                            }
                        } else {
                            $sql = "INSERT INTO `Cart`(`book_id`, `email`, `quantity`,`Fees_id`) VALUES (" . $_GET['id'] . ",'" . $_SESSION['email'] . "'," . $_POST['product-quantity'] . ",". $row['p'] .  ")";
                        }
                        $result = $conn->query($sql);
                        $conn->query("UPDATE Book SET quanlity=quanlity-".$_POST['product-quantity']." WHERE book_id=".$_GET['id']);
                    }
                    if (isset($_POST['rent-add']) and isset($_SESSION['email'])) {
                        $sql = "SELECT book_id, email, quantity,purchase_type FROM Cart WHERE book_id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $item = $result->fetch_assoc();
                            if ((int)$_POST['rent-quantity'] + $item['quantity'] >= 10) {
                                $sql = "UPDATE Cart SET quantity=10 WHERE book_id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                            } else {
                                $sql = "UPDATE Cart SET quantity=" . ((int)$_POST['rent-quantity'] + $item['quantity']) . " WHERE book_id=" . $_GET['id'] . " AND email='" . $_SESSION['email'] .  "'";
                            }
                        } else {
                            $sql = "INSERT INTO `Cart`(`book_id`, `email`, `quantity`, `purchase_type`,`fees`) VALUES (" . $_GET['id'] . ",'" . $_SESSION['email'] . "'," . $_POST['product-quantity'] . ",2 ,". $row['purchase_price'] .  ")";
                        }
                        $result = $conn->query($sql);
                        $conn->query("UPDATE Book SET quanlity=quanlity-".$_POST['rent-quantity']." WHERE book_id=".$_GET['id']);
                    }
                    echo " <h6 class='text-muted mb-1'>" . $row['author'] . "</h6><h1 class='mt-0 mb-1'>" . $row['title'] . "</h1><h6>Purchase Price </h2><h2>$" . $row['purchase_price'] . "</h2>";
                ?>
                <form action="/4990Project/book.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="row mt-3">
                        <div class="col-2 pe-2">
                            <select class="form-select" name="product-quantity">
                                <?php
                                    for($i=1;$i<=$row['quanlity'];$i++){
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-10 p-0">
                            <button type="submit" name="product-add" class="btn btn-success">Add to Cart</button>
                        </div>
                    </div>
                </form>
               <!-- <br>
               // <?php
                //    echo "<h6>Rent Price </h2>";
                 //   echo " <h2>$" . $row['rent_price'] . "</h2>";
                //?>
                <form action="/4990Project/book.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="row mt-3">
                        <div class="col-2 pe-2">
                            <select class="form-select" name="rent-quantity">
                                <?php
                                    for($i=1;$i<=$row['quanlity'];$i++){
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-10 p-0">
                            <button type="submit" name="rent-add" class="btn btn-success">Add to Cart</button>
                        </div>
                    </div>
                </form>-->
            <br>
            <br>
                          <?php
              $sql = "SELECT Awards.award_title,Book.award_id,Book.book_id FROM Awards, Book WHERE Awards.award_id=Book.book_id AND Book.award_id=".$_GET['id'];
              echo "<h3> Award(s) for " . $row['title'] ." :</h3>";
              $result = $conn->query($sql);
             
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<li>" .$row['award_title']. "</li>";
                }
              }
          $conn->close();
            ?>
            </div>

        </div>
    </div>
    <br>
    <br>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Our Website 2021</p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
