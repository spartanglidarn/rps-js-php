var Result = function (result) {	
	if (result =="Win") {
		$("#playerResult").text("Winner");
		$("#computerResult").text("Loser");
		$("#playerScreen").addClass("winnerScreen");
		$("#computerScreen").addClass("loserScreen");
		winCount ++;
		$("#playerWinCount").text("You have won " + winCount + " times");
	} else if (result == "Lose") {
		$("#playerResult").text("Loser");
		$("#computerResult").text("Winner");
		$("#computerScreen").addClass("winnerScreen");
		$("#playerScreen").addClass("loserScreen");
		loseCount ++;
		$("#computerWinCount").text("The computer have won " + loseCount + " times");
	} else {
		$("#playerResult").text("Draw");
		$("#computerResult").text("Draw");	
		$(".resultScreen").addClass("drawScreen");
	};
}
