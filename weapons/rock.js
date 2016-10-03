var Rock = function (opponent) {
		if (opponent == "rock"){
			result = "Draw";
		} else if (opponent == "paper") {
			result = "Lose";
		} else if (opponent == "scissor"){
			result = "Win";
		};
		return result;
};