<?php
	function initMap() //function to create the map
	{
		$map = null;
		for ( $y = 0; $y < 10; $y ++ )
			for ( $x = 0; $x < 10; $x ++ )
				$map[$x][$y] = ".";
		$_SESSION["map"] = $map; // store the map in the session
	}
	
	function renderMap() //function to show the ships behind the map
	{
		$show = false;
		if ( isset($_POST["show"]) ) 
			$show = true;
		
		$map = $_SESSION["map"];
		
		echo '<br><br> &nbsp;';
		for ( $x = 0; $x < 10; $x ++ ) //display 0 - 9
			echo $x;
		
		for ( $y = 0; $y < 10; $y ++ )
		{
			echo '<br>'.chr(65 + $y).' '; //display alphabet A - J
			for ( $x = 0; $x < 10; $x ++ )
				if ($map[$x][$y] == "s") 
					if ($show) 
						echo "#"; 
					else 
						echo '.';
				else 
					echo $map[$x][$y];
		}
	}
?>