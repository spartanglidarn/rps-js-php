//Deklarerar globala variabler
//Spelarens val av vapen
var playerOne = "";
//Datorns val av vapen
var playerTwo = "";
//Håller spelarens vapen-bild
var playerOneImg = "";
//Håller datorns vapen-bild
var playerTwoImg = "";

//Räknar vinster, förluster och antalet spelade spel
var winCount = 0;
var loseCount = 0;
var gameCount = 0;

//Håller det nummer som definerar datorns vapen
var computerNr = 0;

console.log(computerNr);



//kod som körs när sidan har laddats klart
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

//definerar vad som händer när användaren klickar på något av vapnen.
	$(".weapon").click(function(){
		//skapar ett random nummer och väljer sedan ett vapen till datorn
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
		
		//fadear in bilderna för valda vapen.
		$("#playerChoice").fadeIn(1000).attr("src", playerOneImg);
		$("#computerChoice").fadeIn(1000).attr("src", playerTwoImg);

		//Kollar vem som har vunnit, koden för detta objekt ligger i separat fil, result.js
		var runResult = new Result(result);

		//Räknar hur många gånger användaren har spelat plus hur många gånger det blivit lika.
		gameCount ++;
		var drawCount = gameCount - (winCount + loseCount);
		//Skriver sedan ut detta på sidan.
		$("#gameCount").text(gameCount + " games have been played");
		$("#drawCount").text(drawCount + " games have ended in a draw");

		//skriver ut resultatet i konsolen för att förenkla tester
		console.log(result);
		});

});


