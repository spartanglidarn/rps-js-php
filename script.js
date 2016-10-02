var playerOne = "rock";
var playerTwo = "rock";
var playerOneImg = "";
var playerTwoImg = "";

var winCount = 0;
var loseCount = 0;
var gameCount = 0;

var computerNr = 0;
console.log(computerNr);



$(document).ready(function(){
	$("#rock").click(function(){
		playerOne = "rock";
		playerOneImg = "rock.png"
	});
	$("#paper").click(function(){
		playerOne = "paper";
		playerOneImg = "paper.png"
	});
	$("#scissor").click(function(){
		playerOne = "scissor";
		playerOneImg = "scissor.png"
	});	


	$(".weapon").click(function(){
		computerNr = Math.random();

		if (computerNr < 0.33) {
			playerTwo = "rock";
			playerTwoImg = "rock.png"
		} else if (computerNr < 0.66){
			playerTwo = "paper";
			playerTwoImg = "paper.png"
		} else {
			playerTwo = "scissor";
			playerTwoImg = "scissor.png"
		}
		if (playerOne == "rock") {
			rockFunction(playerTwo);
		} else if (playerOne == "paper") {
			paperFunction(playerTwo);

		} else if (playerOne == "scissor"){
			scissorFunction(playerTwo);
		} else {
			result = "No weapon chosen by player one";
		};
		

		$("#playerChoice").fadeIn(1000).attr("src", playerOneImg);
		$("#computerChoice").fadeIn(1000).attr("src", playerTwoImg);

		if (result =="Win") {
			$("#playerResult").text("Winner");
			$("#computerResult").text("Loser");
			$("#playerScreen").css("background-color", "green");
			$("#computerScreen").css("background-color", "red");
			winCount ++;
			$("#playerWinCount").text("You have won " + winCount + " times");
		} else if (result == "Lose") {
			$("#playerResult").text("Loser");
			$("#computerResult").text("Winner");
			$("#computerScreen").css("background-color", "green");
			$("#playerScreen").css("background-color", "red");
			loseCount ++;
			$("#computerWinCount").text("The computer have won " + loseCount + " times");
		} else {
			$("#playerResult").text("Draw");
			$("#computerResult").text("Draw");	
			$(".resultScreen").css("background-color", "yellow");
		};

		gameCount ++;
		var drawCount = gameCount - (winCount + loseCount);

		$("#gameCount").text(gameCount + " games have been played");
		$("#drawCount").text(drawCount + " games have ended in a draw");

		console.log(result);
		});

});

var rockFunction = function rock (opponent) {
		if (opponent == "rock"){
			result = "Draw";
		} else if (opponent == "paper") {
			result = "Lose";
		} else if (opponent == "scissor"){
			result = "Win";
		};
		return result;
	};

	var paperFunction = function paper (opponent) {
		if (opponent == "rock"){
			result = "Win";
		} else if (opponent == "paper") {
			result = "Draw";
		} else if (opponent == "scissor"){
			result = "Lose";
		};
		return result;
	};

	var scissorFunction = function scissor (opponent) {
		if (opponent == "rock"){
			result = "Lose";
		} else if (opponent == "paper") {
			result = "Win";
		} else if (opponent == "scissor"){
			result = "Draw";
		};
		return result;
	};


