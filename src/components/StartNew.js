import React, { Component } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

import {setupDeck,
		createPlayingCardsArray,
		startTimer,
		newGame } from '../actions/index';

class StartNew extends Component {
  
  constructor(props){
  	super(props);
  	this.onNewGameClickEvent = this.onNewGameClickEvent.bind(this);
  }

  render() {
    return (
		<div>
			<input type="submit" name="newGame" value="New Game" className="button newGame" onClick={this.onNewGameClickEvent} />
		</div>
    );
  }

  onNewGameClickEvent(e){
  	if(e.target.value == 'New Game') {
  		this.props.newGame();
  		this.props.setupDeck();
		this.props.createPlayingCardsArray();
		this.props.startTimer();
  	}
  }
}

function mapStateToProps(state){
	return {}
}

function mapDispatchToProps(dispatch){
	return bindActionCreators({
			newGame:newGame,
			setupDeck: setupDeck,
			createPlayingCardsArray: createPlayingCardsArray,
			startTimer: startTimer
		}, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(StartNew);
