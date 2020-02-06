import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import _ from 'lodash';

import { setupDeck, 
		createPlayingCardsArray,
		startTimer,
		addSysMsg,
		addSysMsgHeading } from '../actions';

import ShowMessages from './ShowMessages';
import PlayingCards from './PlayingCards';

class GameBoard extends Component {

  componentWillMount(){

  	this.props.setupDeck();
	this.props.createPlayingCardsArray();
	this.props.startTimer();

	this.props.addSysMsgHeading('Welcome!');
	this.props.addSysMsg('The game has started. Press ok to begin. To play the game:');
	this.props.addSysMsg('- Pick two cards and see if they match.');
	this.props.addSysMsg('- Repeat above step until you successfully match all cards.');
	this.props.addSysMsg('- Your score is calculated based on the number of turns and amount of time taken.');
	this.props.addSysMsg('- Your top four scores are tracked during your session here.');

  }
  
  render() {
	console.log('This is the end', this.props);
    let m = (typeof this.props.matched.num == 'undefined') ? 0 : this.props.matched.num;

    if(typeof this.props.sysMsgs.array !== 'undefined' && this.props.sysMsgs.array.length > 0){
	    
	    return (<ShowMessages />);
    
    }else if(m == 12) {

    	return( <div></div> );

    }else{
    	
    	return (
			<div id="gameBoard">
				<form name="gameBoard" action="/index.php" method="POST">	
					<PlayingCards />
				</form>
			</div>
	    );

    }

  }

}

function mapStateToProps(state){
	return {
		deck: state.deck,
		playingCards: state.playingCards,
		matched: state.matched,
		sysMsgs:state.sysMsgs
	}
}

function mapDispathToProps(dispatch) {
	return bindActionCreators({
				setupDeck: setupDeck, 
				createPlayingCardsArray: createPlayingCardsArray,
				startTimer: startTimer,
				addSysMsgHeading: addSysMsgHeading,
				addSysMsg:addSysMsg
			}, dispatch);
}

export default connect(mapStateToProps, mapDispathToProps)(GameBoard);
