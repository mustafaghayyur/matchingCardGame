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
			$this->assets->timeDuration();
			$this->assets->scoreCalculator();
			return false;
		}
	}
		 

	

	public function formCardsSelected($post){
		$cardsSelected = array();

		for($i = 0; $i < 24; $i++) {
			if(isset($post['card'.$i])){
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
		$score =  $_SESSION['score'];
		$turns =  $_SESSION['turns'];
		$matches =  $_SESSION['matches'];
		$totalTime = $_SESSION['totalTime'];
		$this->views->showScore($score, $turns, $matches, $totalTime);
		
	}

	public function showErrors(){
		$this->views->showErrors($this->errorMsgs);
		//$this->views->showGameBoard('try');
	}

}


?>