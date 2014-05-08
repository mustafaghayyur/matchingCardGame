<?php
ini_set('display_errors', 1); 
error_reporting(E_ERROR);
/*=======================
The main model class for this game
Takes care of core functions to initialize the game, 
and make it function. Handles all the assets...
================================*/

class AssetsManager{

	/*public cardsDeck = array();
	public playingCards = array();
	public matches = 0;
	public matched = array();
	public disabledCards = array(); // once the card is matched, it is added here to it cannot be picked again.

	private timeStart = ''; //timestamp
	private timeEnd = ''; //timestamp
	public turns = 0; // number of turns
	public totalTime = ''; // total duration of the game in seconds
	public score = 0; // total score calculaed at the end of the game
*/

	function __construct(){
		//code... if any....
		//$this->setupDeck();
	}


	// The deck will be made of a matrix array consisting 
	// of 4 columns and 13 rows The 4 columns represent 
	// (1)Spades, (2)Hearts, (3)Diamonds, and (4)Clubs
	// The rows will represent (1)Ace, (2)2, (3)3, ... (10)10, (11)Jack, (12)Queens, (13)King
	// respectively. The values for each card will be defaulted 
	// to 0, meaning the card has not been picked from the deck 
	// for the matching game.
	
	// Once the card is picked by the game, it's value in this array will become 1
	
	public function setupDeck(){

		for ($c = 1; $c <= 4; $c++){
			for($r = 1; $r <= 13; $r++){
				$this->cardsDeck[$c][$r] = 0;
			}
		}

		$_SESSION['cardsDeck'] = $this->cardsDeck;
	}
		 
	public function cardPicker(){
		$c = rand(1, 4);
		$r = rand(1, 13);

		if($_SESSION['cardsDeck'][$c][$r] == 0){
			$_SESSION['cardsDeck'][$c][$r] = 1;
			return $c.','.$r;
		}else{
			return $this->cardPicker();
		}
		
	}

	public function matchingCardPicker($card){
		$matrix = explode(',', $card);
		
		for($i=1; $i <= 4; $i++){
			if($_SESSION['cardsDeck'][$i][$matrix[1]] == 0){
				$match = $i;
				$_SESSION['cardsDeck'][$i][$matrix[1]] = 1;
				break;
			}
		}
		
		return $match.','.$matrix[1];
	}

	public function playingCardsRandomizer($cardsArray){
		return shuffle($cardsArray);
	}

	public function turnsCounter (){
		return $_SESSION['turns']++; 
	}

	public function timeDuration(){
		return $_SESSION['totalTime'] = $_SESSION['timeStart'] - $_SESSION['timeEnd'];
	}

	//runs after every turn to see if there is a new match,
	//if so, the interal records are updated and true is returned
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

	public function cardsAvailable(){
		
		$cardsArray = array();
		for($i=0;$i<24;$i++){
			$cardsArray[$i]=array($_SESSION['playingCards'][$i], '');
		}

		foreach($_SESSION['disabledCards'] as $card){
			$key = array_search($card, $_SESSION['playingCards']);
			$cardsArray[$key] = array($_SESSION['playingCards'][$i], 'disabled');
		}

		return $cardsArray;
	}

	public function createPlayingCardsArray(){
		$_SESSION['playingCards'] = array();

		while (count($_SESSION['playingCards']) < 24){
			$_SESSION['playingCards'][] = $this->cardPicker();
		}
	}

	//Explanation behind logic for score is documented in my scketches...
	public function scoreCalculator(){
		$_SESSION['score'] = $_SESSION['matches'] * (100 / $_SESSION['turns']) * (1000 / $_SESSION['totalTime']);
	}

	public function gameOver(){
		if($_SESSION['matches'] == 12){
			return true;
		}else{
			return false;
		}
	}
}


?>