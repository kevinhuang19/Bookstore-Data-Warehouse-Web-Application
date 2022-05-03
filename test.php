<?php

/**
 * Connect to database
 */
$webhost        = 'localhost';
$webusername    = 'huang18g_4990Project';
$webpassword    = '4990Project';
$webdbname      = 'huang18g_4990Project';
$webcon         = mysqli_connect($webhost, $webusername, $webpassword, $webdbname);
if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

/**
 * Queries for reading
 */
$questions = mysqli_query($webcon, 'SELECT * FROM `confirmed`');


/**
 * Connect to database
 */
$mobhost        = 'localhost';
$mobusername    = 'huang18g_4990';
$mobpassword    = '12345';
$mobdbname      = 'huang18g_4990';
$mobcon         = mysqli_connect($mobhost, $mobusername, $mobpassword, $mobdbname);
if (mysqli_connect_errno())
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

/**
 * Insert data from old database
 */

// questions
while ($row = mysqli_fetch_array($questions))
{
    // escape your strings
    foreach($row as $key => $val)
    {
        $row[$key] = mysqli_real_escape_string($mobcon, $row[$key]);
    }
    mysqli_query($mobcon, "INSERT INTO `orders` (`sno`, `cart_id`, `book_id`,`quantity`,`user_Id`, `address`,`fee_id`,`award_id`) VALUES ('" . $row['sno'] . "', '" . $row['cart_id'] . "', '" . $row['book_id'] . "','" . $row['quantity'] . "','" . $row['user_id'] . "','" . $row['address'] . "','" . $row['fee_id'] . "','" . $row['award_id'] . "');");
}






mysqli_close($mobcon);
mysqli_close($webcon);
 header( "Location: index.php" ); die;
?>
