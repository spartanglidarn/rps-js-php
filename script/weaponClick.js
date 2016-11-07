/*Denna funktion definerar vad som händer när användaren klickar på ett vapen.*/


//definerar vad som händer när användaren klickar på något av vapnen.
var weaponClick = function(gamesToPlay){

	if (gameCount < gamesToPlay) {

		$("#rock").on("click" , function(){
			playerOne = "rock";
			playerOneImg = "img/rock.png";

		});
		$("#paper").on("click" , function(){
			playerOne = "paper";
			playerOneImg = "img/paper.png";
		});
		$("#scissor").on("click" , function(){
			playerOne = "scissor";
			playerOneImg = "img/scissor.png";
		});	

		$(".weapon").on("click" , function(){
		console.log("game count " + gameCount);
		console.log("games to play " + gamesToPlay);
			$(".weaponChoice").css("display", "none");
			$(".weaponChoice").fadeIn(2000);
			$(".resultScreen").removeClass("winnerScreen loserScreen drawScreen thinkingScreen").toggleClass("thinkingScreen", true);
			//skapar ett random nummer och väljer sedan ett vapen till datorn
			$("#playerResult").text("You choose " + playerOne);
			$("#computerResult").text("Thinking");
			gameCount ++;
			
			computerNr = Math.random();

			if (computerNr < 0.33) {
				playerTwo = "rock";
				playerTwoImg = "img/rock.png";
			} else if (computerNr < 0.66){
				playerTwo = "paper";
				playerTwoImg = "img/paper.png";
			} else {
				playerTwo = "scissor";
				playerTwoImg = "img/scissor.png";
			}

			//Kollar vad användaren har valt för vapen 
			//och kör sedan vapen funktionen med datorns val som egenskap
			//Koden för dessa objekt ligger i separata filer under mappen weapons
			if (playerOne == "rock") {
				var rockWeapon = new Rock(playerTwo);
			} else if (playerOne == "paper") {
				var paperWeapon = new Paper(playerTwo);
			} else if (playerOne == "scissor"){
				var scissorWeapon = new Scissor(playerTwo);
			} else {
				result = "No weapon chosen by player one";
			};//avslutar funktionen som körs när man klickar på en .weapon knapp

			//animerar bilder vid val av vapen.
			var AnimateResult = new Animate(playerOneImg, playerTwoImg, weaponClick);
		
			//lägger till valet av vapen i två separata array för. 
			playerMoves.push(playerOne);
			computerMoves.push(playerTwo);
		});//stänger weapon.click funktionen 
	};
	//stänger if-sats för gamesToPlay
};//stänger weaponClick funktionen