
                  
    <div>
  <form action="" method="post">
   <input type ="date" name= "txtstartdate">
         <input type ="date" name= "txtenddate">
                             
                             
<input type="submit" name="search" class="search" value="search" />
</form>           
          

    <?php
$con=mysqli_connect("localhost","huang18g_4990","12345","huang18g_4990");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

 if (isset($_POST['search'])) { 
  $txtstartdate = $_POST['txtstartdate'];
   $stime=" 00:00:00";
   $txtstart= $txtstartdate.$stime;

   $txtenddate = $_POST['txtenddate']; 
   $etime=" 23:59:59";
   $txtend= $txtenddate.$etime;


   echo "Start is = ". $txtstartdate .'</br>'; 
   echo "end is = ". $txtenddate .'</br>'; 
  $result = mysqli_query($con,"SELECT title,Fees.purchase_price AS fee,SUM(quantity) AS QUAN,time FROM orders,Fees INNER JOIN Book WHERE Book.book_id=orders.book_id and time BETWEEN '" .$txtstart."' AND  '".$txtend."' GROUP BY title ORDER BY time;");
  //   WHERE time BETWEEN '" . $txtstartdate . "' AND  '" . $txtenddate . "'
  echo "	
          <div class ='table-responsive'>
          <table class ='table table-striped'>
  <tr>

	
    <th>title</th>
    <th>quantity</th>
    <th>Total</th>

  </tr>";
$totalbooks=0;
$earning =0 ;
while($row = mysqli_fetch_array($result))
{
  	$total = 0;
  	
  	$totalBooks+=$row['QUAN'];
  	$total = $row['QUAN']*$row['fee'];
 	$earning+=$row['QUAN']*$row['fee'];
    echo "<tr>";
	
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['QUAN'] . "</td>";
  	echo "<td>" .sprintf("%0.2f", $total)."</td>";
  

echo "</tr>";
  
}
echo '	</table>
		There has been <b>'.$totalBooks.'</b> books sold between '.$txtstartdate .' and '. $txtenddate .'
        <br>
        We have earned <b>$'.$earning.'</b> between '.$txtstartdate.' and '.$txtenddate.'
		</div>
		';
   
   
   
 }
mysqli_close($con);
?>
</div>