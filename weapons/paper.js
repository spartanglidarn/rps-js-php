var Paper = function (opponent) {
		if (opponent == "rock"){
			result = "Win";
		} else if (opponent == "paper") {
			result = "Draw";
		} else if (opponent == "scissor"){
			result = "Lose";
		};
		return result;
	};