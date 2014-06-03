<?php
/*=======================
The controller class
================================*/

class Views{

	public $errorMsgs = array();
	public $assets;

	function __construct($newGame){

	}


	
	

	public function cardVisualizer($card){
		$suites = array('Spades', 'Hearts', 'Diamonds', 'Clubs');
		$ranks = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King');
		$matrix = explode(',', $card);

		$suite = $suites[((int)$matrix[0]-1)];
		$rank = $ranks[((int)$matrix[1]-1)];

		return array($suite, $rank);
	}


	public function showGameBoard($try, $turns, $matches, $keys = array(), $card = array(), $cardsSelected = array()){
		if($try == 'try'){
			include(SITE_PATH . VIEWS_URI . '/gameBoard.php');
		}elseif($try == 'tryAgain'){
			$card1 = $this->cardVisualizer($cardsSelected[0][0]);
			$card2 = $this->cardVisualizer($cardsSelected[1][0]);
			include(SITE_PATH . VIEWS_URI . '/gameBoard_show.php');
		}
		
	}

	public function showScore($score, $turns, $matches, $totalTime){
		include(SITE_PATH . VIEWS_URI . '/show_score.php');
	}

	public function showErrors($errorMsgs){
		if(count($errorMsgs) > 0){
			echo '<div id="sysMsgs">';
			foreach($errorMsgs as $error){
				echo '<p>'. $error .'</p>';
			}
			echo '</div>';
		}
	}

	public function showHeader(){
		include(SITE_PATH . VIEWS_URI . '/header.php');
	}

	public function showFooter(){
		include(SITE_PATH . VIEWS_URI . '/footer.php');
	}

	public function showResponse($response){
		include(SITE_PATH . VIEWS_URI . '/response.php');
	}



}


?>