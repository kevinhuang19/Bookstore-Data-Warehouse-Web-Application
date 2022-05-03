<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    session_start();

$link = mysqli_connect("localhost", "huang18g_4990Project", "4990Project", "huang18g_4990Project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$address = mysqli_real_escape_string($link, $_REQUEST['address']);


 
// attempt insert query execution
$k= $_SESSION['email'];                  

                
$sql = "INSERT INTO confirmed (cart_id,book_id,quantity,email,address,fee_id,user_id,award_id) SELECT Cart.cart_id,Cart.book_id,Cart.quantity,Users.email,'$address',Fees_id,Users.user_id,Book.award_id FROM Cart,Users,Book WHERE Cart.email='$k' AND Users.email='$k' AND Cart.book_id=Book.book_id ";
$sql2 ="DELETE FROM Cart WHERE Cart.email='$k'"; 
if(mysqli_query($link, $sql)){
   if(mysqli_query($link, $sql2)){
    echo "Records deleted successfully.";
     
     
  
       header( "Location: test.php" ); die;

  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}

// close connection
mysqli_close($link);
?>   
                  

