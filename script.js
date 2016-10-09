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
var drawCount = 0;
var playerMoves = new Array();
var computerMoves = new Array();
//Håller det nummer som definerar datorns vapen
var computerNr = 0;

//kod som körs när sidan har laddats klart
$(document).ready(function(){
	//kör weaponClick funktionen så att alla vapen aktiveras och är klickbara
	weaponClick();
});


