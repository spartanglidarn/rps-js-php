//definerar vad som händer när användaren klickar på något av vapnen.
var weaponClick =function(){
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
		$(".weaponChoice").css("display", "none");
		$(".weaponChoice").fadeIn(500);
		$(".resultScreen").removeClass("winnerScreen loserScreen drawScreen thinkingScreen").toggleClass("thinkingScreen", true);
		//skapar ett random nummer och väljer sedan ett vapen till datorn
		$("#playerResult").text("You choose " + playerOne);
		$("#computerResult").text("Thinking");
		gameCount ++;
		//var drawCount = gameCount - (winCount + loseCount);
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

		//Kollar vad användaren har valt för vapen 
		//och kör sedan vapen funktionen med datorns val som egenskap
		//Koden för dessa objekt ligger i sparata filer under mappen weapons
		if (playerOne == "rock") {
			var rockWeapon = new Rock(playerTwo);
		} else if (playerOne == "paper") {
			var paperWeapon = new Paper(playerTwo);
		} else if (playerOne == "scissor"){
			var scissorWeapon = new Scissor(playerTwo);
		} else {
			result = "No weapon chosen by player one";
		};

		//animerar bilder vid val av vapen.
		var AnimateResult = new Animate(playerOneImg, playerTwoImg, weaponClick);

		//Skriver sedan ut detta på sidan.
//		$("#gameCount").text(gameCount + " games have been played");
//		$("#drawCount").text(drawCount + " games have ended in a draw");

		//skriver ut resultatet i konsolen för att förenkla tester
		console.log(result);
		//lägger till valet av vapen i två separata array för. 
		playerMoves.push(playerOne);
		computerMoves.push(playerTwo);
	});//stänger weapon.click funktionen 

};//stänger weaponClick funktionen