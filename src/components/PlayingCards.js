import React, { Component } from 'react';
import { bindActionCreators } from 'redux'; 
import { connect } from 'react-redux';
import _ from 'lodash';
import $ from 'jquery';

import { turnsCounter, 
		matchCards, 
		gameOver,
		stopTimer,
		totalTimeCalculator,
		finalScoreCalculator } from '../actions';

class PlayingCards extends Component {
  
  constructor(props){
  	super(props);
  	this._isMounted = false;
  	this.state = {};
  	this.onClickEvent = this.onClickEvent.bind(this);
  }

  componentWillMount(){
  	this._isMounted = true;

	this.setState(
		{ 
			card1: {i: '', k: ''}, 
			card2: {i: '', k: ''} 
		}
	);
  }

  componentWillUnmount(){
  	this._isMounted = false;
  }
  
  render(){
  	let pcArr = [];
	var suits = ['Spades', 'Hearts', 'Diamonds', 'Clubs']
  	var ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

  	//console.log('rendered', this.state);
  	for (let i=0; i < 24; i++){
		let suit = suits[parseInt(this.props.deck[this.props.playingCards[i]].s) - 1];
		let rank = ranks[parseInt(this.props.deck[this.props.playingCards[i]].n) - 1];
		let turnOver = true;

		if(_.isEmpty(this.state['card1'].k) || _.isEmpty(this.state['card2'].k)){
			turnOver = false;
		}

		if(typeof this.props.disabledCards[this.props.playingCards[i]] == 'undefined') {
			//console.log('enabled', suit, rank);
			if(i != parseInt(this.state['card1'].i) && i != parseInt(this.state['card2'].i)){
				if(turnOver) {
					pcArr.push(this.renderEnabledCard(i, suit, rank, true));
				}else{
					pcArr.push(this.renderEnabledCard(i, suit, rank));
				}
			}else{				
				pcArr.push(this.renderPickedCard(i, suit, rank));
			}
		}else{
			//console.log('disabled', suit, rank);
			pcArr.push(this.renderDisabledCard(i, suit, rank));
		}
	}

	return pcArr;
  }

  renderEnabledCard(i, suit, rank, disabled = false) {

  	return (
			<div className="cardBox" key={i}>
				<div className="squaredOne">
					<input name={"card" + i} id={"card" + i} type="checkbox" onClick={this.onClickEvent} value={i+'.'+this.props.playingCards[i]} disabled={disabled} />
					<label htmlFor={"card" + i}></label>
				</div>
			</div>
	    );    
  }

  renderPickedCard(i, suit, rank, disabled = false){
  	return(
  			<div className="cardBox" key={i}>
  				<div className={suit}>
  					<span className={"card" + rank}> {rank} </span>
  				</div>
  			</div>
  		);
  }

  renderDisabledCard(i, suit, rank) {

	return (
			<div className="cardBox" key={i}>
				<div className={suit + " matched"}>
					<span className={"card" + rank}> {rank} </span>
				</div>
			</div>
	    );    
  }

  onClickEvent(e){
  	var c = e.target.value.split('.');
  	var cObj = { i: c[0], k: c[1]+'.'+c[2] };

	if(_.isEmpty(this.state['card1'].k)){
		this.setState( function(state){
				return { card1: cObj };
			} );
	}else{
		this.setState( { card2: cObj } );

		this.props.turnsCounter();
		this.props.matchCards(this.state['card1'].k, cObj.k);

		// matchedCards() is an action, but it determines a successful match
		// as well. We just use it to determine if we can skip the 3 second 
		// lag for the user, as time is factor in determining user score.
		let m = matchCards(this.state['card1'].k, cObj.k);
		if(_.isEmpty(m.type)){
			//m.type is empty so no match occured..
			setTimeout(()=>{
						if(this._isMounted){
							this.setState( { card1: '', card2: '' } );
						}
					}, 3000);
		}else{
			setTimeout(()=>{
						if(this._isMounted){
							this.setState( { card1: '', card2: '' } );
						}						
					}, 500);		
		}

		this.isGameOver();
	}	
  }

  isGameOver(){
	if(this.props.matched.num == 12){
		this.props.stopTimer();
		this.props.totalTimeCalculator(this.props.timeStart.value, this.props.timeEnd.value);
		this.props.finalScoreCalculator(this.props.matched.num, this.props.turns.num, this.props.totalTime.value);
	}else{
		return false;
	}
  }

}

function mapStateToProps(state){
	return {
		deck: state.deck,
		playingCards: state.playingCards,
		disabledCards: state.disabledCards,
		matched: state.matched,
		turns: state.turns,
		timeStart: state.timeStart,
		timeEnd: state.timeEnd,
		totalTime: state.totalTime
	}
}

function mapDispatchToProps(dispatch){
	return bindActionCreators({
				turnsCounter:turnsCounter, 
				matchCards:matchCards, 
				gameOver:gameOver, 
				stopTimer: stopTimer, 
				totalTimeCalculator:totalTimeCalculator,
				finalScoreCalculator 
				}, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(PlayingCards);
