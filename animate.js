
var Animate = function(imgOne, imgTwo, weaponClick) {
	var thinkingArray = new Array();
	var picArray = new Array();
	picArray[0] = "img/rock.png";
	picArray[1] = "img/paper.png";
	picArray[2] = "img/scissor.png";
	var thinkingTime = 30;
	var thisId = 0;
	var intervalCount = 0;

	var theInterval = setInterval(function () {
		$("#computerResult").text("Thinking" + thinkingArray.join(""));
		thinkingArray.push(".");
		$("#computerChoice").attr("src", picArray[thisId]);
		thisId++;
		if (thisId == 3) thisId=0;
		if (intervalCount % 10 == 0) thinkingArray=[];
		intervalCount ++;
		$(".weapon").off("click");	
		if (intervalCount == thinkingTime){
			clearInterval(theInterval);
			$(".resultScreen").toggleClass("thinkingScreen", false);
			$("#computerChoice").attr("src", imgTwo);
			//console.log(imgTwo);
			var runResult = new Result(result);
			drawCount = gameCount - (winCount + loseCount);
			$("#gameCount").text(gameCount + " games played");
			$("#drawCount").text(drawCount + " games ended with draw");

			$(".weapon").on("click", weaponClick()); 
			};	
	}, 100);	
	$("#playerChoice").css("visibility","visible").fadeIn(1000).attr("src", imgOne);
}
