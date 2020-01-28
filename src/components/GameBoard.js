import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import _ from 'lodash';

import { setupDeck, 
			cardPicker, 
			playingCardsRandomizer, 
			startTimer, 
			stopTimer, 
			totalTimeCalculator, 
			_randIntGenerator } from '../actions';
import PlayingCards from './PlayingCards';
import StartNew from './StartNew';

class GameBoard extends Component {

  componentWillMount(){
  	this.props.setupDeck();
	this.createPlayingCardsArray();
	this.props.playingCardsRandomizer(this.props.playingCards);
	this.props.startTimer();
	//console.log(this.props);
  }

  _pickSuiteForPairSelection(x, iteration = 0){
	iteration++;
	let s = _randIntGenerator(1, 4);
  	let c = this.props.playingCards[x - 12].split(".");
		//console.log('hello', Object.keys(this.props.playingCards), typeof x, this.props.playingCards[x-12]);
	if(s == c[0] && s == 1){
		s = s + 1;
	}else if(s == c[0] && s == 4){
		s = s - 1;
	}

	if(this.props.deck[s+'.'+c[1]].v == 1){
		if(iteration >= 4){
			//all possibilities are failing, 
			//time to make very literal choices...
			for(var i = 1; i < 5; i++){
				if(this.props.deck[i+'.'+c[1]].v == 0){
					//console.log('NON RANDOM S picked');
					return i;
				}
			}
			//we have failed. 
			//Reload the app, and cross your fingers.
			console.log('Error - should not have happenned', c, this.props.deck);
			location.reload();
			throw new Error('Card Generation failed. Retrying..');
		}

		//console.log('_pickSuiteForPairSelection failed, trying again', this.props.playingCards, iteration);
		return this._pickSuiteForPairSelection(x, iteration);
	}

	return s;
  }

  createPlayingCardsArray(){
	for(var i = 0; i < 12; i++){
		this.props.cardPicker(this.props.deck, null, i);
	}

	//catch any card's whos instances number more than 2
	var cardInstanceCounter = {};
	for(var i = 0; i < 12; i++){	  		
   		let c = this.props.playingCards[i].split(".");
 		cardInstanceCounter[c[1]]= (typeof cardInstanceCounter[c[1]] == 'undefined') ? 1 : cardInstanceCounter[c[1]] + 1;
		
		if(cardInstanceCounter[c[1]] > 2){
  			console.log('Error - Maximum pair selection capability exceeded in createPlayingCardsArray()', cardInstanceCounter, this.props.playingCards);
			location.reload();
			throw new Error('Card Generation failed. Retrying..');
  		}
	}


	//pick a pair..
	for(var x = 12; x < 24; x++){  		
  		let s = this._pickSuiteForPairSelection(x, 0);
  		let c = this.props.playingCards[x - 12].split(".");

		if(this.props.deck[s+'.'+c[1]].v == 1){
			console.log('Error - SERIOUSLY should not have happenned', c, s, cardInstanceCounter, this.props.playingCards);
			location.reload();
			throw new Error('Card Generation failed. Retrying..');
  		}

		this.props.cardPicker(this.props.deck, s+'.'+c[1], x);
	}

	//shuffle($_SESSION['playingCards']);

  }
  
  render() {
  	this.props.stopTimer();
	this.props.totalTimeCalculator(this.props.timeStart, this.props.timeEnd);
	console.log('This is the end', this.props);

    return (
		<div id="gameBoard">
			<form name="gameBoard" action="/index.php" method="POST">	
				<PlayingCards />
			    <input name="Try" type="submit" value="Match!" className="button try" />
			</form>

			<StartNew />
		</div>
    );
  }
}

function mapStateToProps(state){
	return {
		deck: state.deck,
		playingCards: state.playingCards,
		disabledCards: state.disabledCards,
		matched: state.matched,
		turns: state.turns,
		score: state.score,
		timeStart: state.timeStart,
		timeEnd: state.timeEnd,
		totalTime: state.totalTime
	}
}

function mapDispathToProps(dispatch) {
	// whenever selectBook is called, the result should be passed
	// to all reducers...
	return bindActionCreators({setupDeck: setupDeck, cardPicker: cardPicker, playingCardsRandomizer: playingCardsRandomizer, startTimer: startTimer, stopTimer: stopTimer, totalTimeCalculator: totalTimeCalculator}, dispatch);
}

export default  connect(mapStateToProps, mapDispathToProps)(GameBoard);
