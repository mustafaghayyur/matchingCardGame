import React, { Component } from 'react';
import { bindActionCreators } from 'redux'; 
import { connect } from 'react-redux';
import _ from 'lodash';
import $ from 'jquery';

import { turnsCounter, matchCards } from '../actions';

class PlayingCards extends Component {
  
  constructor(props){
  	super(props);
  	this.state = {};
  	this.onClickEvent = this.onClickEvent.bind(this);
  }

  componentWillMount(){
	this.setState(
			{ 
				card1: {i: '', k: ''}, 
				card2: {i: '', k: ''} 
			}
		);
  }
  
  render(){
  	let pcArr = [];
	
	var suits = ['Spades', 'Hearts', 'Diamonds', 'Clubs']
  	var ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];


  	console.log('rendered', this.state);
  	for (let i=0; i < 24; i++){
		let suit = suits[parseInt(this.props.deck[this.props.playingCards[i]].s) - 1];
		let rank = ranks[parseInt(this.props.deck[this.props.playingCards[i]].n) - 1];
	
		if(typeof this.props.disabledCards[this.props[i]] == 'undefined') {
			//console.log('enabled', suit, rank);
			let pi = parseInt(this.state['card1'].i);
			if(i != pi && i != pi){
				pcArr.push(this.renderEnabledCard(i, suit, rank));
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
			<div class="cardBox" key={i}>
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
		this.setState( function(state){
				console.log('Turn ended', this);
				return { card2: cObj };
			} );
		
		this.props.turnsCounter();
		this.props.matchCards(this.state['card1'].k, cObj.k);

		setTimeout(this.setState( { card1: '', card2: '' } ), 4000);
	}	

  }

  updateCardsStates(state){
  	if(_.isEmpty(state['card2'].k) == false){

		//$('#cardBox #squaredOne').remove(); 
		//$('#cardBox #squaredOne label[for="#card'+this.state['card1'].i+'"]').remove(); 

		this.setState( { card1: '', card2: '' } );
	}
  }
}

function mapStateToProps(state){
	return {
		deck: state.deck,
		playingCards: state.playingCards,
		disabledCards: state.disabledCards,
		matched: state.matched,
		turns: state.turns
	}
}

function mapDispatchToProps(dispatch){
	return bindActionCreators({turnsCounter:turnsCounter, matchCards:matchCards}, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(PlayingCards);
