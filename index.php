<?php


//Turn Ended...
$this->matcher($card1, $card2);
		$this->turnsCounter();
		
		if (!$this->gameOver()){
			$this->playAgain();
		}else{
			$this->scoreCalculator();
			$this->timeDuration();
		}


?>