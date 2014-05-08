<?php
ini_set('display_errors', 1); 
error_reporting(E_ERROR);
require_once('config.php');

require('classes/assetsManager.php');

require_once('classes/theGame.php');
require_once('classes/views.php');
$newGame = isset($_GET['newGame']) ? 1 : 0;
$theGame = new TheGame($newGame);

$view = new Views();
$view->showHeader();


if($_POST){

	//Find out how many cards have been selected
	$cardsSelected = $theGame->formCardsSelected($_POST);

	//Collect error messages..
	if(count($cardsSelected) !== 2){
		$theGame->errorMsgs[] = "Please select only 2 cards from the board. Try again.";
	}

	//If no errors, proceed... 
	if(count($theGame->errorMsgs) == 0){
		
		
		$continue = $theGame->endOfTurn($cardsSelected[0][0], $cardsSelected[1][0]);
		
		if($continue){
			$theGame->showGameBoard('tryAgain', $cardsSelected);
		}/*else{
			
			$theGame->showScore();
		}*/

	//Show errors...
	}else{
		$theGame->showErrors();
	}

}else{
	$theGame->showGameBoard('try');
}

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
$view->showFooter();
?>