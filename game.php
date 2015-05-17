<?php
	session_start();
?>
<html>
	<body>
		<pre>
		<?php
			require("functions/map.php");
			require("functions/ships.php");
			require("functions/input.php");
			
			if ( !isset( $_SESSION["initialized"] ) )
			{
				initMap();
				initShips();
				$_SESSION["points"] = 0;
				$_SESSION["initialized"] = true;
			}
			
			processInput();
			renderMap();
		?>
		</pre>
		
		<br>
		
		<form name="input" action="game.php" method="post">
			Enter coordinates (row, col), e.g. A5 
			<input type="input" size="5" name="coord" autofocus>
			<input type="submit">
		</form>
		
		<form name="input" action="game.php" method="post">
			<input type="hidden" name="show" value="show">
			<input type="submit" value="Show">
		</form>
		<?php
			checkIfGameFinished();
		?>
	</body>
</html>