import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import _ from 'lodash';

import { setupDeck, 
		createPlayingCardsArray,
		playingCardsRandomizer, 
		startTimer } from '../actions';
import PlayingCards from './PlayingCards';
import StartNew from './StartNew';

class GameBoard extends Component {

  componentWillMount(){
  	this.props.setupDeck();
	this.props.createPlayingCardsArray();
	this.props.playingCardsRandomizer(this.props.playingCards);
	this.props.startTimer();
	console.log('GameBoard COmponentDidMount', this.props, this.propertyIsEnumerable('props'), this.props.propertyIsEnumerable('playingCards'));
  }
  
  render() {
	console.log('This is the end', this.props);
    let m = (typeof this.props.matched.num == 'undefined') ? 0 : this.props.matched.num;

    if(m == 12){
    	
    	return(
			<div id="gameBoard">
				<div className="buffer-scoreboard"></div>
				<StartNew />
			</div>
		);

    }else{
    	
    	return (
			<div id="gameBoard">
				<form name="gameBoard" action="/index.php" method="POST">	
					<PlayingCards />
				</form>

				<StartNew />
			</div>
	    );
    }
  }

}

function mapStateToProps(state){
	return {
		deck: state.deck,
		playingCards: state.playingCards,
		matched: state.matched
	}
}

function mapDispathToProps(dispatch) {
	return bindActionCreators({
				setupDeck: setupDeck, 
				createPlayingCardsArray: createPlayingCardsArray,
				playingCardsRandomizer: playingCardsRandomizer, 
				startTimer: startTimer
			}, dispatch);
}

export default connect(mapStateToProps, mapDispathToProps)(GameBoard);
