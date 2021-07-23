<!-- <!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Highcharts Pie Chart</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    var options = {
        chart: {
            renderTo: 'container',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Web Sales & Marketing Efforts'
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function() {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }

    $.getJSON("data.php", function(json) {
        options.series[0].data = json;
        chart = new Highcharts.Chart(options);
    });
 
});
</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</body>
</html> -->



<?php

include "../functs/config.php";
    $sql = "SELECT p_gender FROM patient";
    $result = $mycon -> query($sql);
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_gender ='M' ");
    $m_num = $select_data->num_rows;
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_gender ='F' ");
    $f_num = $select_data->num_rows;
    // $dataPoints[] = array("Gender" => "Male", "y" => $m_num, "Gender" => "Female", "y" => $f_num);
    $dataPoints[] = array (
        array("Gender" => "Male", "y" => $m_num),
        array("Gender" => "Female", "y" => $f_num)
      );
      $lb = ["Male", "Female"];
      $xl = [$m_num, $f_num];

    //   echo json_encode($lb, JSON_NUMERIC_CHECK);

    // while($row = $result -> fetch_assoc())
    // {
    //    $dataPoints[] = array("Gender"=>$row['country_name'], "y"=>$row['p_gender']);
    // }
?>

<!-- <!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() 
 {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        subtitles: [{
            text: " Year 2020-21"
        }],
        data: [{
            type: "pie",  // bar,doughnut,funnel,pyramid
            yValueFormatString: "#,##0.\"\"",
            indexLabel: "{Country}  ( ${y} billion)",
            dataPoints: <?php //echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
  chart.render();
 }
</script>
</head>
<body>


   <h1 style="text-align:center;color:gray">Pie Chat Data using PHP/MYQL</h1>
   <h2 style="text-align:center;color:green">Country by Military Budget ( In Billion Dollar )</h2>
   
   <div id="chartContainer" style="height: 370px; width: 100%;"></div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  -->

<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = <?php echo json_encode($lb, JSON_NUMERIC_CHECK) ?>;
var yValues = <?php echo json_encode($xl, JSON_NUMERIC_CHECK) ?>;
var barColors = [
  "#b91d47",
  "#00aba9"
//   "#2b5797",
//   "#e8c3b9",
//   "#1e7145"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>

</body>
</html>
