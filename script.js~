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
var weaponClick =function(){
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
		
		//animerar bilder vid val av vapen.
			var picArray = new Array();
			picArray[0] = "rock.png";
			picArray[1] = "paper.png";
			picArray[2] = "scissor.png";
			var thisId = 0;
			var intervalCount = 0;

			//sätter en interval som visar alla val i datorns resultat skärm.
			var theInterval = setInterval(function () {
				$("#computerChoice").attr("src", picArray[thisId]);
				thisId++;
				if (thisId == 3) thisId=0;
				intervalCount ++;
				//avaktiverar weapon knappen så att användaren inte kan göra ett nytt val under animationen.
				$(".weapon").off("click");	
				if (intervalCount == 20){
					clearInterval(theInterval);
					$("#computerChoice").attr("src", playerTwoImg);
					console.log(playerTwoImg);
					//aktiverar weapon knappen med funktionen på nytt
					$(".weapon").on("click", weaponClick());	
				}
			}, 50);	
			//lägger till spelarens val av vapen.
			$("#playerChoice").fadeIn(1000).attr("src", playerOneImg);
//		}
	
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
		});//stänger weapon.click funktionen 
	};//stänger weaponClick funktionen
//kör weaponClick funktionen så att alla vapen aktiveras och är klickbara
weaponClick();

});


