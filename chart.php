<?php
$con  = mysqli_connect("localhost","huang18g_4990","12345","huang18g_4990");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT book_id ,SUM(quantity) AS QUAN FROM orders GROUP BY book_id ORDER BY book_id";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['book_id']  ;
            $sales[] = $row['QUAN'];
        }
 
 
 }
 
 
?>

      <h2 class="page-header" >Analytics Reports </h2>
      <div><p>Product</p> </div>
        <div class="d-flex justify-content-around align-items-center">
            
          <div class="w-50">
            <canvas  id="chartjs_bar"></canvas>
          </div>
          <?php include 'sales.php'?>
        </div>
      
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e",
                      			"#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                      scales: {
            
                yAxes: [{
                  ticks:{
                    beginAtZero: true
                  }
                }]
                      },
                       //legend: {
                       //display: true,
                       //position: 'bottom',
                          
 
                       // labels: {
                       //     fontColor: '#71748d',
                       //     fontFamily: 'Circular Std Book',
                       //     fontSize: 10,
                       // }
                             
                   // },
                      
                      
 
 
                }
                });
    </script>