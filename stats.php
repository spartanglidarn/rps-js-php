<?php 
include'header.php';
include 'login/dbconn.php'; 

//SELECT * FROM stats WHERE userId = ?;

$stmt = $conn -> prepare('SELECT playerMoves, computerMoves, resultList FROM stats WHERE userId = ? ORDER BY gameId');
if ($stmt === false) {
	die ('prepare failed: ' . htmlspecialchars($mysqli->error));
}

$bp = $stmt -> bind_param('i', $_SESSION['userId']);
if ($bp === false) {
	die ('bind parameters failed: ' . htmlspecialchars($mysqli->error));
}

$stmtexe = $stmt -> execute();
if ($stmtexe === false) {
	die ('execution statement failed: ' . htmlspecialchars($mysqli->error));
}

$stmtbind = $stmt->bind_result($playerMoves, $computerMoves, $resultList);
if ($stmtbind === false) {
	die ('binding of results failed: ' . htmlspecialchars($mysqli->error));
}

$playerMovesArray = array();
$computerMovesArray = array();
$resultListArray = array();

$weaponCount = 0;
$rockCount = 0;
$paperCount = 0;
$scissorCount = 0;

while ($stmt -> fetch()){
	/*$playerMovesArray -> append ( array ( explode ( ',' , $playerMoves ) ) );
	$computerMovesArray -> append ( array ( explode ( ',' , $computerMoves) ) );
	$resultListArray -> append ( array ( explode ( ',' , $resultList) ) );*/
	array_push($playerMovesArray, explode (',' , $playerMoves));

}


foreach ($playerMovesArray as $key => $value) {

	foreach ($value as $key => $value) {
		
		//print_r($key . $value);
		//echo "<br>";

		$weaponCount ++;
		if ($value == "rock"){
			$rockCount ++;
		} elseif ($value == "paper"){
			$paperCount ++;
		} elseif ($value == "scissor") {
			$scissorCount ++;
		} else {
			echo "Error! wrong weapon in array database!!!!";
		}

	}
}

$rockProcent = $rockCount / $weaponCount;
$paperProcent = $paperCount / $weaponCount;
$scissorProcent = $scissorCount / $weaponCount;


echo "<br>You have used rocks " . $rockCount . " times.<br>";
echo "<br>You have used paper " . $paperCount . " times.<br>";
echo "<br>You have used scissor " . $scissorCount . " times.<br>";

?>

<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		// Define the chart to be drawn.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Element');
		data.addColumn('number', 'Percentage');
		data.addRows([
			['Rock', <?php echo $rockProcent; ?>],
			['Paper', <?php echo $paperProcent; ?>],
			['Scissor', <?php echo $scissorProcent; ?>]
		]);

		// Instantiate and draw the chart.
		var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
		chart.draw(data, null);
	}

</script>


  <!-- Identify where the chart should be drawn. -->
  <div id="myPieChart"/>


<?php include 'footer.php'; ?>	