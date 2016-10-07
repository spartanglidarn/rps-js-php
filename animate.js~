//denna fil används ej efter att koden lagts in i weaponClick funktionen som ligger i script.js
var Animate = function(imgOne, imgTwo, weaponClick) {
	var picArray = new Array();
	picArray[0] = "rock.png";
	picArray[1] = "paper.png";
	picArray[2] = "scissor.png";
	var thisId = 0;
	var intervalCount = 0;
	$("#computerChoice").css("visibility", "visible");
	var theInterval = setInterval(function () {
		$("#computerChoice").attr("src", picArray[thisId]);
		thisId++;
		if (thisId == 3) thisId=0;
		intervalCount ++;
		$(".weapon").off("click");	
		if (intervalCount == 20){
			$(".resultScreen").toggleClass("thinkingScreen", false);
			clearInterval(theInterval);
			$("#computerChoice").attr("src", imgTwo);
			console.log(imgTwo);
			var runResult = new Result(result);
			drawCount = gameCount - (winCount + loseCount);
			$("#gameCount").text(gameCount + " games have been played");
			$("#drawCount").text(drawCount + " games have ended in a draw");
//			gameCount++;
			$(".weapon").on("click", weaponClick()); 
			};	
	}, 50);	
	$("#playerChoice").css("visibility","visible").fadeIn(1000).attr("src", imgOne);
}
