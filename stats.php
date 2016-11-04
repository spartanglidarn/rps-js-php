<?php 
include'stats/getStats.php';

?>

<script type="text/javascript">
$(function () { 
    var myChart = Highcharts.chart('chartContainer', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Most used weapons'
        },
        xAxis: {
            categories: ['Rock', 'Paper', 'Scissor']
        },
        yAxis: {
            title: {
                text: 'Users'
            }
        },
        series: [{
            name: <?php echo "'" . $_SESSION["username"] . "'"; ?>,
            data: [<?php echo $playerRockCount . "," . $playerPaperCount . "," . $playerScissorCount ?>]
        }, {
            name: 'Computer',
            data: [<?php echo $computerRockCount . "," . $computerPaperCount . "," . $computerScissorCount ?>]
        }]
    });
});

$(function () { 
    var myChart = Highcharts.chart('gamePieChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Game statistics'
        },
        series: [{
            name: '%',
            colorByPoint: true,
            data: [{
                name: 'Win',
                y: <?php echo $playerWinProcent ?>
            }, {
                name: 'Lose',
                y: <?php echo $computerWinProcent ?>
            }, {
                name: 'Draw',
                y: <?php echo $drawProcent ?>
            }]
        }],
    });
});

$(function () { 
    var myChart = Highcharts.chart('roundPieChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Round statistics'
        },
        series: [{
            name: '%',
            colorByPoint: true,
            data: [{
                name: 'Win',
                y: <?php echo $playerRoundWinProcent ?>
            }, {
                name: 'Lose',
                y: <?php echo $computerRoundWinProcent ?>
            }, {
                name: 'Draw',
                y: <?php echo $drawRoundProcent ?>
            }]
        }],
    });
});

</script>

<div id="chartContainer" style="width:100%; height:400px;"></div>

<div id="gamePieChart" class ="piCharts" ></div>
<div id="roundPieChart" class ="piCharts"></div>
<div class="clear"></div>




<?php include 'footer.php'; ?>	