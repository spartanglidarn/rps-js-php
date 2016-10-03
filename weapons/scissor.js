var Scissor = function (opponent) {
		if (opponent == "rock"){
			result = "Lose";
		} else if (opponent == "paper") {
			result = "Win";
		} else if (opponent == "scissor"){
			result = "Draw";
		};
		return result;
	};