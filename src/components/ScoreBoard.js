import React, { Component } from 'react';

export default class ScoreBoard extends Component {
  render() {
    return (
	    <div id="scoreBoard">
		    <div className="title">ScoreBoard</div>
			<div id="turns">Total Turns: turns</div>
			<div id="matches">Total Matches: matches</div>
		</div>
    );
  }
}
