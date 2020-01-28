
/**
 * Helper function that generates a random number inclusive of 
 * min & max values provided.
 */
export function _randIntGenerator(min, max) {
	min = Math.ceil(min);
	max = Math.floor(max) + 1;
	return Math.floor(Math.random() * (max - min)) + min; 
}

/**
 * Sets up the playing deck of standard 52 playing cards.
 */
export function setupDeck(){
	var deck = {};
	for (var s = 1; s <= 4; s++){
		for(var n = 1; n <= 13; n++){
			let id = s+'.'+n;
			deck[id] = {s:s, n:n, v:0};
		}
	}

	return {
		type: 'ADD_CARDS',
		data: deck
	};
}

/**
 * Picks a card from the deck for placin on the playing screen
 * @param   deck  - State.deck obj
 * @param   card  - Secific card to select. Optional param. Use with care.
 * @param   i     - counter needed as an auto-incrementing key
 */
export function cardPicker(deck, card = null, i){
	if(typeof card == 'string'){
		return {
			type: 'ADD_PICKED_CARD',
			key: i,
			data: card
		}
	}

	var s = _randIntGenerator(1, 4);
	var n = _randIntGenerator(1, 13);
	var card = s+'.'+n;

	if(deck[card].v == 0){
		return {
			type: 'ADD_PICKED_CARD',
			key: i,
			data: card
		}
	}else{
		return cardPicker(deck, null, i);
	}
}

/**
 * Run after every turn..
 */
export function matchCards(card1, card2){
	
	var matrix1 = card1.split('.');
	var matrix2 = card2.split('.');

	if (matrix1[1] == matrix2[1]){

		return {
			type: 'NEW_MATCHED_CARDS',
			data: {
				card1: card1,
				card2: card2,
			}
		};

	}else{
		return {
			type: ''
		};		
	}
}

/**
 * Shuffle the playing cards for the game 
 */
export function playingCardsRandomizer(playingCards){
	return {
			type: 'SHUFFLE_CARDS',
			data: playingCards
		}
}

/**
 * Update state's turns counter
 */
export function turnsCounter (){
	return {
		type: 'TURNS_INCREMENT'
	}
}

/**
 * Calculate total game time at the end of the game for score calculation.
 */
export function startTimer(){
	let d = new Date();
	return {
		type: 'START_TIMER',
		data: d.getTime()
	}
}

/**
 * Calculate total game time at the end of the game for score calculation.
 */
export function stopTimer(){
	let d = new Date();
	return {
		type: 'STOP_TIMER',
		data: d.getTime()
	}
}

/**
 * Calculate total game time at the end of the game for score calculation.
 */
export function totalTimeCalculator(start, end){
	return {
		type: 'TOTAL_TIME_UPDATE',
		data: ( ((start - end) * 1000) / 60)
	}
}

/**
 * Calculates the score at the end of the game.
 */
export function finalScoreCalculator(matches, turns, totalTime){
	return {
		type: 'FINAL_SCORE_UPDATE',
		data: (matches * (100 / turns) * (1000 / totalTime))
	}
}

/**
 * Is game over?
 */
export function gameOver(matches){
	if(matches == 12){
		return true;
	}else{
		return false;
	}
}

