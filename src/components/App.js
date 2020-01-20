import React, { Component } from 'react';

import ScoreBoard from './ScoreBoard';
import ShowMessages from './ShowMessages';
import GameBoard from './GameBoard';

export default class App extends Component {
  render() {
    return (
	    <div>
		    <ScoreBoard />
		    <ShowMessages />
		    <GameBoard />
		</div>
    );
  }
}
