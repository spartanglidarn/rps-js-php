<?php include 'header.php'; ?>	

	<!-- the game area that appers when the user have choosen gametype -->

	<div id="gameType" class="blockList">
		<ul>
			<li id="bestOfOne">Best of one</li>
			<li id="bestOfThree">Best of three</li>
			<li id="bestOfFive">Best of five</li>
			<li id="bestOfTen">Best of ten</li>
		</ul>
	</div>

	<div class="clear"></div>
	<div id="gameArea">
		<div id="weaponsArea" class="blockList">
		<ul>
			<li id="rock" class="weapon"><img src="img/rock.png" alt="Rock"></li>
			<li id="paper" class="weapon"><img src="img/paper.png" alt="Paper"></li>
			<li id="scissor" class="weapon"><img src="img/scissor.png" alt="Scissor"></li>
		</ul>
		</div>
		<div class="clear"></div>
		<div id="resultBlock" class="blockList">

			<div id="playerScreen" class="resultScreen">
				<h2 id="playerResult" class="resultTitle">Player</h2>
				<img id="playerChoice" class="weaponChoice" src="img/fraga.png" alt="Player weapon choice">
				<div class="clear"></div>
					<h2 id="playerWinCount" class="winCountTitle">You have won 0 times</h2>
			</div>
			<div id="computerScreen" class="resultScreen">

				<h2 id="computerResult" class="resultTitle">Computer</h2>
				<img id="computerChoice" class="weaponChoice" src="img/fraga2.png" alt="computer weapon choice">
				<div class="clear"></div>
					<h2 id="computerWinCount" class="winCountTitle">The computer have won 0 times</h2>
			</div>
		
		</div>
		<div class="clear"></div>
		<div id="gameResult"> 
		</div>
		<div id="stats">

			<h3 id="gameCount">0 games played</h3>
			<h3 id="drawCount">0 games ended with draw</h3>
			
		</div>
	</div>
	<div class="clear"></div>


	<div id="loginForm">
		<h4>Sign in:</h4>
		<form method="POST" action="login/checklogin.php">
			<label>Username: </label><br>
			<input type="text" name="usr"><br>
			<label>Password: </label><br>
			<input type="password" name="pass"><br>
			<input type="submit" name="submit" value="Sign in">
		</form>
	</div>

	<div id="newAccForm">
		<h4>Create new account:</h4>
		<form method="POST" action="login/addusr.php">
			<label>Firstname: </label><br>
			<input type="text" name="firstname"><br>
			<label>Lastname:</label><br>
			<input type="text" name="lastname"><br>
			<label>Email: </label><br>
			<input type="text" name="email"><br>
			<label>Username: </label><br>
			<input type="text" name="username"><br>
			<label>Password: </label><br>
			<input type="password" name="passone"><br>
			<label>Repeat password: </label><br>
			<input type="password" name="passtwo"><br>
			<input type="submit" name="submit" value="Create new account">
		</form>
	</div>


<?php include 'footer.php'; ?>	