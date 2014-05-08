<?php
/*=======================
The controller class
================================*/

class TheGame(){

	public $selectedCards = array();
	public $errorMsgs = array();
	public $assets;

	private function __constructor(){
		if( !isset( $_SESSION ) ) {
			session_start();
		}
		$this->assets = new AssetsManager();
		$this->assets->setupDeck();
	}

	
	private function endOfTurn($card1, $card2);
		
		//Turn Ended...
		$this->assets->matcher($card1, $card2);
		$this->assets->turnsCounter();
		
		if (!$this->assets->gameOver()){
			return true;
		}else{
			$this->assets->scoreCalculator();
			$this->assets->timeDuration();
			return false;
		}
	}
		 
	
	/*
	runs after every turn to see if there is a new match,
	if so, the interal records are updated and true is returned*/
	public function matcher($card1, $card2){
		$matrix1 = explode(',', $card1);
		$matrix2 = explode(',', $card2);

		if ($matrix1[1] == $matrix2[1]){
			$_SESSION['matched'][] = $card1 .'|'. $card2;
			$_SESSION['matches']++;
			$_SESSION['disabledCards'][] = $card1;
			$_SESSION['disabledCards'][] = $card2;
			return true;
		}else{
			return false;		
		}
	}

	public function cardVisualizer($card){
		$suites = array('Spades', 'Hearts', 'Diamonds', 'Clubs');
		$ranks = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King');
		$matrix = explode(',', $card);

		$suite = $suites[$matrix[0]];
		$rank = $rank[$matrix[1]];

		return array($suite, $rank);
	}

	public function gameOver(){
		if($this->matches == 12){
			return true;
		}else{
			return false;
		}
	}

	public function formCardsSelected($post){
		
		for($i = 1; $i <= 24; $i++) {
			if($post['card'.$i]){
				$selectedCards[] = $post['card'.$i];
			}
		}
	}

}


?>