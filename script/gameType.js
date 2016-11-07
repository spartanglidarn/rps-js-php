var gameType = function(){
	$("#bestOfOne").on("click" , function(){
		gamesToPlay = 1;
		weaponClick(gamesToPlay);

	});
	$("#bestOfThree").on("click" , function(){
		gamesToPlay = 3;
		weaponClick(gamesToPlay);

	});
	$("#bestOfFive").on("click" , function(){
		gamesToPlay = 5;
		weaponClick(gamesToPlay);

	});	
	$("#bestOfTen").on("click" , function(){
		gamesToPlay = 10;
		weaponClick(gamesToPlay);

	});	

	//nedan instruktioner körs när användaren klickar på en speltyp
	$("#gameType ul > li").on("click" , function(){
		$("#gameArea").fadeIn(500);
		$("#gameType").fadeOut(500);
		$("#gameResult").fadeOut(500, function(){
			$("#gameResult").empty();
		});
		$("#gameCount").text(gameCount + " games played");
		$("#drawCount").text(drawCount + " games ended with draw");
	});
};