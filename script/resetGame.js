var resetGame = function() { 
		
		//var data = resultList.serializeArray();

		$.post( "./stats/sendStats.php", {
			playerMoves: playerMoves,
			computerMoves: computerMoves,
			resultList: resultList
		} );

		/*
		$.ajax({
			type: 'POST',
			url: './stats/sendStats.php',
			data: data
		});
		*/

		winCount = 0;
		loseCount = 0;
		gameCount = 0;
		drawCount = 0;
		playerMoves = [];
		computerMoves = [];
		resultList = [];
}
