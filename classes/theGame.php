<?php
/*=======================
The controller class
================================*/

class TheGame{

	public $errorMsgs = array();
	public $assets;
	public $views;

	function __construct($newGame){
		$this->assets = new AssetsManager();
		$this->views = new Views();

		if($newGame=1 ) {
			session_regenerate_id(TRUE);
			unset($_SESSION);
    		session_unset();

    		//start fresh...
			session_start();
			$this->assets->setupDeck();
			$this->assets->createPlayingCardsArray();
		}else{
			session_start();
		}
		

	}

	
	public function endOfTurn($card1, $card2){
		
		//Turn Ended...
		$this->assets->matcher($card1, $card2);
		$this->assets->turnsCounter();
		
		if (!$this->assets->gameOver()){
			return true;
		}else{
			$this->assets->timeDuration();
			$this->assets->scoreCalculator();
			return false;
		}
	}
		 

	

	public function formCardsSelected($post){
		$cardsSelected = array();

		for($i = 0; $i < 24; $i++) {
			if($post['card'.$i] !== ''){
				$cardsSelected[] = array($post['card'.$i], $i);
			}
		}

		return $cardsSelected;
	}

	public function showGameBoard($try, $cardsSelected=array()){
		//setup Arrays & Variables for the view..
		$card = $this->assets->cardsAvailable(); 

		$this->views->showGameBoard($try, $card, $cardsSelected);
	}

	public function showScore(){
		$this->assets->
		$score =  $_SESSION['score'];
		$turns =  $_SESSION['turns'];
		$matches =  $_SESSION['matches'];
		$totalTime = $_SESSION['totalTime'];
		$this->views->showScore($score, $turns, $matches, $totalTime);
		
	}

	public function showErrors(){
		$this->views->showErrors($this->errorMsgs);
		$this->views->showGameBoard('try');
	}

}


?>