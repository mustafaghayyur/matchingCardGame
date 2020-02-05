import React, { Component } from 'react';
import { connect } from 'react-redux';
import _ from 'lodash';

class ScoreBoard extends Component {
  
  /**
   * The traditional bubble sort algo to find the 
   * highest scores in array.
   */
  bubbleSort(myArray){
	do {
		var swapped = false;

		for(let i = 0; i < (myArray.length - 1); i++) {
			if( myArray[i] < myArray[i + 1] ) {
				[ myArray[i], myArray[i + 1] ] = [ myArray[i + 1], myArray[i] ];
				swapped = true;
			}
		}

	} while(swapped);

	return myArray;
  }

  /**
   * Using the bubbleSort algo we determine top four scores 
   * to show in the finalScores scoreboard.
   */
  getTopFourScores(){
  	let scores = _.clone(this.props.score.history);
  	let sortedScores = this.bubbleSort(scores);
  	let highestScores = [];
  	let l = (sortedScores.length < 4) ? sortedScores.length : 4;
  	
  	for(let i=0; i < l; i++){
  		highestScores[i] = sortedScores[i];
  	} 

  	return highestScores;
  }

  render() {
    let t = (typeof this.props.turns.num == 'undefined') ? 0 : this.props.turns.num;
    let m = (typeof this.props.matched.num == 'undefined') ? 0 : this.props.matched.num;

    if(m == 12){

    	let highestScores = this.getTopFourScores();
    	let scores = [];

	  	for(let i=0; i < highestScores.length; i++){
	  		scores.push(this.renderHighScore(i, highestScores[i]));
	  	} 

    	return (
		    <div id="finalScoreBoard">
			    <div className="totals">
				    <div className="title">Score Board</div>
					<div id="turns">Total Turns: {t}</div>
					<div id="matches">Total Matches: {m}</div>
					<div id="score">Final Score: {this.props.score.value} pts</div>
					<div id="totalTime">Duration: {this.props.totalTime.value} mins</div>
				</div>
				<div className="highScores">
					<div className="title">Your High Scores</div>
					{scores}
				</div>
			</div>
	    );

    }else{
		
		return (
		    <div id="scoreBoard">
			    <div className="title">ScoreBoard</div>
				<div id="turns">Total Turns: {t}</div>
				<div id="matches">Total Matches: {m}</div>
			</div>
	    );    	
    }
    
  }

  renderHighScore(i, score){
  	return (
  		<div className="score" key={i}> - {score} pts</div>
  		);
  }

}

function mapStateToProps(state){
	return {
		turns: state.turns,
		matched: state.matched,
		score: state.score,
		totalTime: state.totalTime
	}
}

export default connect(mapStateToProps)(ScoreBoard);