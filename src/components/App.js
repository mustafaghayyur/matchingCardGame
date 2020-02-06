import React, { Component } from 'react';

import ScoreBoard from './ScoreBoard';
import GameBoard from './GameBoard';
import StartNew from './StartNew';

export default class App extends Component {
  render() {
    return (
	    <div>
		    <GameBoard />
		    <ScoreBoard />
			<StartNew />
		</div>
    );
  }
}
