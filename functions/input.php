<?php
	function processInput() //function to manipulate the input
	{
		if ( isset($_POST["coord"]) ) //check whether the co-ordinates are added
		{
			$input = $_POST["coord"];
			if ( strlen($input) > 2 ) //check if the input is great than 2 digits
				echo '<br>*** ERROR ***<br>';
			else if ( strlen($input) > 0 ) 
			{
				if ( ord($input[0]) >= 65  &&  ord($input[0]) <= 74  &&  ord($input[1]) >= 48  &&  ord($input[1]) <= 57 ) // check whether the inputs are between A-J and 0-9
				{
					$map = $_SESSION["map"]; 
					$y = ord($input[0]) - 65;
					$x = ord($input[1]) - 48;
					
					if ( !isset($_SESSION["steps"]) ) //checks if the steps session is not set and adds the steps to the new session
					{
						$steps[] = $input;
						$_SESSION["steps"] = $steps;
					} else //if the session is set push the steps to the existing steps
					{
						$steps = $_SESSION["steps"];
						$steps[] = $input;
						$_SESSION["steps"] = $steps;
					}
						
					if ($map[$x][$y] == 's') //check if the co-ordinates hit the ship
					{
						$_SESSION["points"] += 1;

						echo '<br>*** HIT ***<br>';
							
						$_SESSION["map"][$x][$y] = 'X';
						
					} else if ($map[$x][$y] == 'X') //check if the co-ordinates matches already hit
						echo '<br>*** ALREADY HIT! ***<br>';
					else 		//else output miss
					{
						$_SESSION["map"][$x][$y] = '-';
						echo '<br>*** MISS ***<br>';
					}
				} else echo '<br>*** ERROR ***<br>';
			}
		}
	}
	
	function checkIfGameFinished() //function to check whether the game is over
	{
		if ($_SESSION["points"] == 5 + 4 + 4)
		{
			$steps = $_SESSION["steps"];
			$len = count($steps);
			echo '<br>*** GAME FINISHED ***<br><br>';
			for ($i = 0; $i < $len; $i ++)
				echo ($i + 1).'. '.$steps[$i].'<br>';
		}
	}
?>