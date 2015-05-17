<?php
	function createShip($size)
	{
		do
		{
			$start_x = rand($size - 1, 10 - $size);
			$start_y = rand($size - 1, 10 - $size);

			$dir = rand(0, 3);	// [0] - top, [1] - bottom, [2] - left, [3] - right
			
			$temp_map = $_SESSION["map"];
			$success = false;
			
			$x = 0;
			$y = 0;
			for ($i = 0; $i < $size; $i ++)
			{
				if ($dir == 0)
				{
					$x = $start_x;
					$y = $start_y - $i;
				} else if ($dir == 1)
				{
					$x = $start_x;
					$y = $start_y + $i;
				} else if ($dir == 2)
				{
					$x = $start_x - $i;
					$y = $start_y;
				} else if ($dir == 3)
				{
					$x = $start_x + $i;
					$y = $start_y;
				}
				
				if ($temp_map[$x][$y] == ".") 
					$temp_map[$x][$y] = "s"; 
				else 
					break;
				if ($i == $size - 1) 
					$success = true;
			}
		} while ($success == false); //loop until the ship is created
		
		if ($success)
		{
			$_SESSION["map"] = $temp_map;
			return true;
		}
		
		return false;
	}
	
	function initShips()
	{
		createShip(5); //battleship
		createShip(4); //destroyer
		createShip(4); //destroyer
	}
?>