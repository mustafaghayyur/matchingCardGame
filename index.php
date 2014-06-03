<?php
ini_set('display_errors', 1); 
error_reporting(E_ERROR);

require_once('config.php');
require_once('classes/assetsManager.php');
require_once('classes/theGame.php');
require_once('classes/views.php');

$newGame = (int)$_POST['newGame'];
$theGame = new TheGame($newGame);
$view = new Views();
$view->showHeader();

foreach($theGame->response as $response){
	$resp .= $response .'<br/>';
}

if($newGame == 1){
	header('Location: '.SITE_URL .'/index.php'.'?response='.urlencode($resp));
	exit;
}

if(count($theGame->response) > 0){
	foreach($theGame->response as $response){
		$view->showResponse($response);
	}
}

if(isset($_GET['response'])){
	$view->showResponse(urldecode($_GET['response']));
}

if($_POST['Try']){

	//Find out how many cards have been selected
	$cardsSelected = $theGame->formCardsSelected($_POST);

	//Collect error messages..
	if(count($cardsSelected) !== 2){
		$theGame->errorMsgs[] = "Please select only 2 cards from the board. Try again.";
	}

	//If no errors, proceed... 
	if(count($theGame->errorMsgs) == 0){
		
		
		$continue = $theGame->endOfTurn($cardsSelected[0][0], $cardsSelected[1][0]);
		$fp = fopen(SITE_PATH.'/classes/logs.txt', 'a');
		fwrite($fp, 'index: '. $cardsSelected[0][0] .' | '. $cardsSelected[1][0] ."\n");
		fclose($fp);
		if($continue){
			$theGame->showGameBoard('tryAgain', $cardsSelected);
		}else{			
			$theGame->showScore();
		}

	//Show errors...
	}else{
		$theGame->showErrors();
	}

}else{

	$theGame->showGameBoard('try');
}

$view->showFooter();
/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/
?>