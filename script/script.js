/*Detta är huvudfunktionen som startar själva programmet och sätter globala variabler
När användaren klickar på ett av vapnen så aktiveras funktionen weaponClick och spelet körs
Om vi skulle lägga till fler funktioner som ska köras oberoende från sten sax påse spelet så är det här de ska initieras.
*/


//Deklarerar globala variabler
//Spelarens val av vapen
var playerOne = "";
//Datorns val av vapen
var playerTwo = "";
//Håller spelarens vapen-bild
var playerOneImg = "";
//Håller datorns vapen-bild
var playerTwoImg = "";

//Räknar vinster, förluster och antalet spelade spel och antal spel som ska spelas
var winCount = 0;
var loseCount = 0;
var gameCount = 0;
var drawCount = 0;
var playerMoves = new Array();
var computerMoves = new Array();
var resultList = new Array ();
var gamesToPlay = 0;
//Håller det nummer som definerar datorns vapen
var computerNr = 0;



//kod som körs när sidan har laddats klart
$(document).ready(function(){
	
	//Activate the game type functions
	gameType();

	//kör weaponClick funktionen så att alla vapen aktiveras och är klickbara
	//weaponClick();

	//Get the value from URL
	var urlStatus = location.search;

	//console.log(urlStatus);

	if (urlStatus == "?loginNotOk"){
		$("#loginForm").append("<h3>Incorrect username or password</h3>");
		$("#loginForm").show(0);
	}

	$("#loginBtn").on("click", function(){
		$("#newAccForm").hide(500);
		$("#loginForm").fadeIn(500);
	});
	$("#newAccBtn").on("click", function(){
		$("#loginForm").hide(500);
		$("#newAccForm").fadeIn(500);
	});

});


