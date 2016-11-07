var resetGame = function() { 
	
		//skickar statistik om matchen till databasen
		$.post( "./stats/sendStats.php", {
			playerMoves: playerMoves,
			computerMoves: computerMoves,
			resultList: resultList
		} );

		winCount = 0;
		loseCount = 0;
		gameCount = 0;
		drawCount = 0;
		playerMoves = [];
		computerMoves = [];
		resultList = [];
}
