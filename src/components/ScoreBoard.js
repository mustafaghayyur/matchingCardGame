import React, { Component } from 'react';
import { connect } from 'react-redux';

class ScoreBoard extends Component {

  render() {
    console.log(this.props, this.props.turns.num);
    let t = (typeof this.props.turns.num == 'undefined') ? 0 : this.props.turns.num;
    let m = (typeof this.props.matched.num == 'undefined') ? 0 : this.props.matched.num;
    
    if(m == 12){
    	return (
		    <div id="finalScoreBoard">
			    <div className="title">ScoreBoard</div>
				<div id="turns">Total Turns: {t}</div>
				<div id="matches">Total Matches: {m}</div>
				<div id="score">Final Score: {this.props.score.value} pts</div>
				<div id="totalTime">Duration: {this.props.totalTime.value} mins</div>
			</div>
	    );
    }
    return (
	    <div id="scoreBoard">
		    <div className="title">ScoreBoard</div>
			<div id="turns">Total Turns: {t}</div>
			<div id="matches">Total Matches: {m}</div>
		</div>
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