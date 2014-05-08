<?php
/*=======================
The controller class
================================*/

class theGame(){

	public $suites = array('Spades', 'Hearts', 'Diamonds', 'Clubs');
	public $ranks = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King');

	private function __constructor(){
		$assets = new AssetsManager();
		$assets->setupDeck();
	}

	
	private function endOfTurn();
		
		//Turn Ended...
		$assets->matcher($card1, $card2);
		$assets->turnsCounter();
		
		if (!$assets->gameOver()){
			$assets->playAgain();
		}else{
			$assets->scoreCalculator();
			$assets->timeDuration();
		}
	}
		 
	
	/*
	runs after every turn to see if there is a new match,
	if so, the interal records are updated and true is returned*/
	public function matcher($card1, $card2){
		$matrix1 = explode(',', $card1);
		$matrix2 = explode(',', $card2);

		if ($matrix1[1] == $matrix2[1]){
			$assets->matched[] = $card1 .'|'. $card2;
			$assets->matches++;
			$assets->disabledCards[] = $card1;
			$assets->disabledCards[] = $card2;
			return true;
		}else{
			return false;		
		}
	}

	public cardVisualizer($card){
		$matrix = explode(',', $card);

		$suite = $this->suites[$matrix[0]];
		$rank = $this->rank[$matrix[1]];

		return array($suite, $rank);
	}

	public function gameOver(){
		if($this->matches == 12){
			return true;
		}else{
			return false;
		}
	}

}


?>