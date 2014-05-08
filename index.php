<?php

//Find out how many cards have been selected
$theGame = new TheGame();
$cardsSelected = $theGame->formCardsSelected($_POST);

if(count($cardsSelected) !== 2){
	$theGame->errorMsgs[] = "Please select only 2 cards from the board. Try again.";
}

if(count($theGame->errorMsgs) == 0){
	if($_POST){
		$continue = $theGame->endOfTurn($cardsSelected[0], $cardsSelected[1]);
		if($continue){
			$theGame->showGameBoard();
		}else{
			$theGame->showScore();
		}
	}else{
		$theGame->showGameBoard();
	}
}else{
	$theGame->showErrors();
}
?>