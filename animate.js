//denna fil används ej efter att koden lagts in i weaponClick funktionen som ligger i script.js
var thinkingArray = new Array();
thinkingArray[0] = "Thinking";
thinkingArray[1] = "Thinking.";
thinkingArray[2] = "Thinking..";
thinkingArray[3] = "Thinking...";
thinkingArray[4] = "Thinking....";
thinkingArray[5] = "Thinking.....";
thinkingArray[6] = "Thinking......";

var Animate = function(imgOne, imgTwo, weaponClick) {
	var picArray = new Array();
	picArray[0] = "rock.png";
	picArray[1] = "paper.png";
	picArray[2] = "scissor.png";
	var thinkingTime = 30;
	var thisId = 0;
	var intervalCount = 0;
	var thinkingCount = 0;
	var theInterval = setInterval(function () {
		$("#computerResult").text(thinkingArray[thinkingCount]);
		thinkingCount++;
		$("#computerChoice").attr("src", picArray[thisId]);
		thisId++;
		if (thisId == 3) thisId=0;
		if (thinkingCount == 7) thinkingCount=0;
		intervalCount ++;
		$(".weapon").off("click");	
		if (intervalCount == thinkingTime){
			clearInterval(theInterval);
			$(".resultScreen").toggleClass("thinkingScreen", false);
			$("#computerChoice").attr("src", imgTwo);
			console.log(imgTwo);
			var runResult = new Result(result);
			drawCount = gameCount - (winCount + loseCount);
			$("#gameCount").text(gameCount + " games have been played");
			$("#drawCount").text(drawCount + " games have ended in a draw");
//			gameCount++;
			$(".weapon").on("click", weaponClick()); 
			};	
	}, 100);	
	$("#playerChoice").css("visibility","visible").fadeIn(1000).attr("src", imgOne);

	
}
