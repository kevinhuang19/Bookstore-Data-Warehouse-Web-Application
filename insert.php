<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "huang18g_4990Project", "4990Project", "huang18g_4990Project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$book_shelf_id= mysqli_real_escape_string($link, $_REQUEST['book_shelf_id']);
$author = mysqli_real_escape_string($link, $_REQUEST['author']);
$publisher = mysqli_real_escape_string($link, $_REQUEST['publisher']);
$year = mysqli_real_escape_string($link, $_REQUEST['year']);
$fee_id = mysqli_real_escape_string($link, $_REQUEST['fee_id']);
$isbn_10 = mysqli_real_escape_string($link, $_REQUEST['isbn_10']);
$isbn_13 = mysqli_real_escape_string($link, $_REQUEST['isbn_13']);
$genre_id = mysqli_real_escape_string($link, $_REQUEST['genre_id']);
$img = mysqli_real_escape_string($link, $_REQUEST['img']);
$quanlity = mysqli_real_escape_string($link, $_REQUEST['quanlity']);
$award_id = mysqli_real_escape_string($link, $_REQUEST['award_id']);

echo $genre_id;

// attempt insert query execution
$sql = "INSERT INTO Book (title, book_shelf_id, author,publisher,year,fee_id,isbn_10,isbn_13,genre_id,img,quanlity,award_id) VALUES ('$title', '$book_shelf_id', '$author','$publisher', '$year', '$fee_id','$isbn_10', '$isbn_13', '$genre_id','$img', '0','0')";
if(mysqli_query($link, $sql)){
     header( "Location: order.php" ); die;
 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>