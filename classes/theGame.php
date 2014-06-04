<?php
/*=======================
The controller class
================================*/

class TheGame{

	public $errorMsgs = array();
	public $response = array();
	public $assets;
	public $views;

	function __construct($newGame = 0){
		$this->assets = new AssetsManager();
		$this->views = new Views();

		$fp = fopen(SITE_PATH.'/classes/logs.txt', 'w+');
		if($newGame == 1 ) {
			session_start();
			session_regenerate_id(TRUE);
			unset($_SESSION['cardsDeck']); //-- do not use uset on entire $_SESSION variable ... only a specici key
			unset($_SESSION['playingCards']);
			unset($_SESSION['turns']);
			unset($_SESSION['totalTime']);
			unset($_SESSION['timeStart']);
			unset($_SESSION['timeEnd']);
			unset($_SESSION['matched']);
			unset($_SESSION['matches']);
			unset($_SESSION['disabledCards']);
			unset($_SESSION['score']);

    		//start fresh...
			//session_start();
			$_SESSION['timeStart'] = time();
			$this->assets->setupDeck();
			$this->assets->createPlayingCardsArray();
			fwrite($fp, 'Craeted a new session 1');
			$this->response[] = 'New game started.';

		}else{
			session_start();
			if(!isset($_SESSION['playingCards'])){
				session_start();
				session_regenerate_id(TRUE);
				unset($_SESSION['cardsDeck']); //-- do not use uset on entire $_SESSION variable ... only a specici key
				unset($_SESSION['playingCards']);
				unset($_SESSION['turns']);
				unset($_SESSION['totalTime']);
				unset($_SESSION['timeStart']);
				unset($_SESSION['timeEnd']);
				unset($_SESSION['matched']);
				unset($_SESSION['matches']);
				unset($_SESSION['disabledCards']);
				unset($_SESSION['score']);


	    		//start fresh...
				//session_start();
				$this->assets->setupDeck();
				$this->assets->createPlayingCardsArray();

				fwrite($fp, 'Craeted a new session 2');
				$this->response[] = 'New game started.';
			}else{
				fwrite($fp, 'We\'re good with the old session and playing cards!');
			}
		}
		
		fclose($fp);

	}

	
	public function endOfTurn($card1, $card2){
		
		//Turn Ended...
		$this->assets->matcher($card1, $card2);
		$this->assets->turnsCounter();


		
		if (!$this->assets->gameOver()){
			return true;
		}else{
			$_SESSION['timeEnd'] = time();
			$this->assets->timeDuration();
			$this->assets->scoreCalculator();
			return false;
		}
	}
		 

	
	/* the $cardsSelected array is a matrix with the first index being from 0-1, 
	  0 - first card
	  1 - second card
	the second index being 
	  0 - for the actual card value, 
	  1 - for the $i value (which essentially tells us the position of the card in the playingCards array).
	*/
	public function formCardsSelected($post){
		$cardsSelected = array();

		for($i = 0; $i < 24; $i++) {
			if(isset($post['card'.$i])){
				$cardsSelected[] = array($post['card'.$i], $i);
			}
		}

		return $cardsSelected;
	}

	/*
	Complicated function, but essentially it is determining the position of 
	the two picked cards from the playingCards array, and storing the position 
	value (from 0-23) in the $keys array.
	*/ 
	public function cardsPicked($cardsSelected){
		
		$keys = array();
		for($i=0;$i<24;$i++){
			if ($cardsSelected[0][0] == $_SESSION['playingCards'][$i]){
				$keys[] = $i;
			}
			if ($cardsSelected[1][0] == $_SESSION['playingCards'][$i]){
				$keys[] = $i;
			}
		}
		return $keys;
	}

	public function cardsAvailable(){

		$cardsArray = array();
		for($i=0;$i<24;$i++){
			$cardsArray[$i]=array($_SESSION['playingCards'][$i], '');
		}

		foreach($_SESSION['disabledCards'] as $card){
			$key = array_search($card, $_SESSION['playingCards']);
			$cardsArray[$key][1] = 'disabled';
		}

		return $cardsArray;
	}

	public function showGameBoard($try, $cardsSelected=array()){
		//in this function you need determin the PSOITION of the picked cards 
		//in the playingCards array, for the view to work correctly
		$keys = $this->cardsPicked($cardsSelected); 

		$card = $this->cardsAvailable(); 

		$turns = isset($_SESSION['turns']) ? $_SESSION['turns'] : 0;
		$matches = isset($_SESSION['matches']) ? $_SESSION['matches'] : 0;

		$this->views->showGameBoard($try, $turns, $matches, $keys, $card, $cardsSelected);
	}

	public function showScore(){
		$score =  $_SESSION['score'];
		$turns =  $_SESSION['turns'];
		$matches =  $_SESSION['matches'];
		$totalTime = $_SESSION['totalTime'];
		$this->views->showScore($score, $turns, $matches, $totalTime);
		
	}

	public function showErrors(){
		$this->views->showErrors($this->errorMsgs);
		$this->showGameBoard('try');
	}

}


?>