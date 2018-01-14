<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="phpdesigner" />

	<title>Додати запис</title>
    <link rel='stylesheet' id='main-style' href='/css/main.css?ver=1.2' type='text/css' media='all' />

<link rel="stylesheet" href="/css/jquery-ui.css">

  <script src="/js/jquery-1.12.4.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
<script type="text/javascript" src="/js/loader.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>

</head>

<body>



<?php

	include('config.php');

    if(@$_POST['type'] == 1){
        echo "go script<br />";
    
        $weight = $_POST['weight'];
        $title = $_POST['title'];
        $description = $_POST['description'];
    $query_edit = ("
    insert INTO round 
    (type, weight, title, description    ) 
    
    VALUES (1, '".$weight."', '".$title."', '".$description."' )
    
    
    
        ");


mysql_query($query_edit) or die (mysql_error());

    }
    
    


    ?>
    
   <div class="path">


</div>
 <div class="path">
    


</div>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Додати запис</a></li>
    <li><a href="#tabs-2">Перелік квестів</a></li>
    <li><a href="#tabs-3">Статистика</a></li>
  </ul>
  <div id="tabs-1">
        <?php
                echo downcounter('2017-08-20 20:00:00');
                echo '<br>';
                echo downcounter('2047-05-06 23:59:59');
            ?>
            <form method="POST" action="" name="worker">
            <input type="hidden"  name="type" value="1"/>
            <input type="text" placeholder="Години" size="10"  name="weight" /><br />
            <input type="text" placeholder="Проект" size="10"  name="title" /><br />
            <textarea cols="80" rows="10" wrap="virtual" name="description" maxlength="100"></textarea><br />
            <input type="submit"  name="submit" value="Зарахувати" />
            </form><?php

        ?>
  </div>
  <div id="tabs-2">
    
        <?php
    
    
                
    $black_sum = mysql_query ("select weight, sum(weight) FROM round 
    WHERE type = 0"    );                    
    $myrow_results_black = mysql_fetch_array ($black_sum);
    do{
    $black_number = $myrow_results_black['sum(weight)'] ;
    
    }while($myrow_results_black = mysql_fetch_array ($black_sum));
    
    
    $sum = mysql_query ("select weight, sum(weight) FROM round 
    WHERE type = 1"    );                    
    $myrow_results = mysql_fetch_array ($sum);
    
    do{
    $white_width = $myrow_results['sum(weight)'] * 4 - $black_number;
    echo "<strong>" . $white_width . "</strong> <br /><br />";
    $black_width = 99 + $black_number - $myrow_results['sum(weight)'] * 4;
    }while($myrow_results = mysql_fetch_array ($sum));
    
    
    
    $last_monday = strtotime('last sunday');
    $week_activity = 0;
    
    echo date("Y-m-d", strtotime("last sunday"));
    
    
    
    echo  '-- <br />';
    
    $last_tasks =  mysql_query(" SELECT * from round WHERE type = 1 and $last_monday < UNIX_TIMESTAMP(date) ORDER by id DESC LIMIT 100");                    
    $myrow_last_tasks = mysql_fetch_array ($last_tasks);
    
    do{
        echo  ' [' . $myrow_last_tasks['weight'] . '] ' . $myrow_last_tasks['title']. ' — ' . $myrow_last_tasks['description']. "<br />";
        $week_activity = $week_activity + $myrow_last_tasks['weight'];
        
    }while($myrow_last_tasks = mysql_fetch_array ($last_tasks));
?>
  </div>
  <div id="tabs-3">
    <div id="piechart" style="width: 500px; height: 500px;"></div>


</div>
<script type="text/javascript">
$(document).ready(function() {
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     <?php echo $week_activity; ?>],
          ['Energy',     <?php echo 85 - $week_activity; ?>],
          
        ]);

        var options = {
          title: 'My weekly Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
});
</script>
</body>
</html>