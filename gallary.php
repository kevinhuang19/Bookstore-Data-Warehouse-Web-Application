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
     	
    </head>
  <style>
  a.sidenav:link, a.sidenav:visited {
    background-color: black;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    border-radius:100%;
    line-height:50px;
    display: inline-block;
  }

  a.sidenav:hover, a.sidenav:active {
    background-color: #4c4c4c;
  }
</style>
    <body>
       <?php
    session_start();
    ?>
        <!-- Responsive navbar-->
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
                            $conn->close();
                      	?>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                      	<li class="nav-item"><a class="nav-link active" href="gallary.php">Gallery</a></li>
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
      	

        <div class="container">
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
        <div class="search-container">
      		<form action="gallary.php">
        		<input type="text" placeholder="Search.." name="search">
        		<input type="submit">
      		</form>
    	</div>
          
        <br>
          	<a class="sidenav" href="gallary.php?pid=Fiction" name="Fiction" > Fiction </a>
            <a class="sidenav" href="gallary.php?pid=Science Fiction" name="Science Fiction" > Science Fiction </a>
            <a class="sidenav" href="gallary.php?pid=Comedy" name ="Comedy" > Comedy </a>
          	<a class="sidenav" href="gallary.php?pid=Fantasy" name ="Fantasy"> Fantasy </a>
          	<a class="sidenav" href="gallary.php?pid=Historical" name ="Historical"> Historical </a>
          	<a class="sidenav" href="gallary.php?pid=Cooking" name ="Cooking" > Cooking </a>
          	<a class="sidenav" href="gallary.php?pid=Thriller" name ="Thriller" > Thriller </a>
          	<a class="sidenav" href="gallary.php?pid=Horror" name ="Horror"> Horror </a>
          	<a class="sidenav" href="gallary.php?pid=Romance" name ="Romance"> Romance </a>
          	<a class="sidenav" href="gallary.php?pid=Poetry" name ="Poetry" > Poetry </a>
         <!-- <a href="gallary.php?pid=low-high" name="low-high"> Low-High </a>
          <a href = "gallary.php?pid=high-low" name="high-low"> High-Low </a>-->
            
         
          
        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM Book WHERE title LIKE '%$search%'";
            // Store schedule data
            $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book INNER JOIN Fees ON Book.fee_id=Fees.fee_id WHERE title LIKE '%$search%'";
            $result = $conn->query($sql);
            
        } 
        else {
            $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book INNER JOIN Fees ON Book.fee_id=Fees.fee_id";
            // Store schedule data
            $result = $conn->query($sql);
        }
        $id = $_GET['pid'] ?? '';
        if($id=='Fiction'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Fiction' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
          if($id=='Science Fiction'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Science Fiction' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
          if($id=='Comedy'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Comedy' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
       /* }
        if($pid=='low-high'){
          $sql = "SELECT * FROM Fees order by purchase_price asc";
          $sql = "SELECT book_id,title, purchase_price, author, img FROM Book INNER JOIN Fees ON Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
        }
        if($pid=='high-low'){
          $sql = "SELECT book_id,title, purchase_price, author, img FROM Book,Fees, Genre WHERE AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
        }*/
          }
          if($id=='Fantasy'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Fantasy' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
          if($id=='Historical'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Historical' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
          if($id=='Cooking'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Cooking' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
        if($id=='Thriller'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Thriller' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
        if($id=='Horror'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Horror' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
        if($id=='Romance'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Romance' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
        if($id=='Poetry'){
          
          $sql = "SELECT book_id,title, purchase_price, author, img, quanlity FROM Book,Fees, Genre WHERE Book.genre_id= Genre.genre_id and genre_name='Poetry' AND Book.fee_id=Fees.fee_id";
          $result =$conn->query($sql);
          
        }
        
       	$conn->close();
        ?>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  	
                    echo "<div class='col-12 col-lg-3 mb-4'><br>
                    		  <div class='card' onclick='location.href=\"https://huang18g.myweb.cs.uwindsor.ca/4990Project/book.php?id=" . $row['book_id'] . "\";'><img src='" . $row['img'] . "' width='275' height='375' class='card-img-top' alt='" . $row['title'] . "'>
                            	<div class='card-body'>
                                <p class='card-text mb-0'>" . $row['title'] . "</p>
                                <p class='card-text'>
                                  <small class='text-muted'>" . $row['author'] . "</small>
                                </p>
                                <p class='card-text'>$" . $row['purchase_price'] . "</p>
                                <p class='card-text'>number: " . $row['quanlity'] . "</p>
                              </div>
                          </div>
                        </div>";
                }
            }
          	// $conn->close();
            ?>
        </div>
      </div>
          
        <!-- Footer-->
        <!--<footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Bookstore 2021</p></div>
        </footer>-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

