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
	
	//Aktiverar gameType funktionen.
	gameType();

	//Sparar ner get variabeln.
	var urlStatus = location.search;

	//väljer felmeddelande beroende på vilken get variabel som är satt
	switch (urlStatus) {
		case "?wrongUsr":
			$("#loginForm").append("<h3>Wrong username</h3>");
			$("#loginForm").show(0);
			break;
		case "?wrongPass":
			$("#loginForm").append("<h3>Wrong password</h3>");
			$("#loginForm").show(0);
			break;
		case "?usrCreated":
			$("#loginForm").append("<h3>User created, login here.</h3>");
			$("#loginForm").show(0);
			break;			
		case "?emailInUse":
			$("#newAccForm").append("<h3>Email adress is already in use</h3>");
			$("#newAccForm").show(0);
			break;
		case "?userInUse":
			$("#newAccForm").append("<h3>Username is already in use</h3>");
			$("#newAccForm").show(0);
			break;
		case "?passNoMatch":
			$("#newAccForm").append("<h3>Password did not match</h3>");
			$("#newAccForm").show(0);
		default:
			break;		
	}

	//login knapp
	$("#loginBtn").on("click", function(){
		$("#newAccForm").hide(500);
		$("#loginForm").fadeIn(500);
	});

	// create new accont knapp
	$("#newAccBtn").on("click", function(){
		$("#loginForm").hide(500);
		$("#newAccForm").fadeIn(500);
	});

	//stäng knappen i rutan på login och create account formulären
	$(".exitBtn").on("click", function(){
		$(this).parent().hide(500);
	});

});


