import React, { Component } from 'react';

import ScoreBoard from './ScoreBoard';
import ShowMessages from './ShowMessages';
import GameBoard from './GameBoard';
import StartNew from './StartNew';

export default class App extends Component {
  render() {
    return (
	    <div>
		    <ShowMessages />
		    <GameBoard />
		    <ScoreBoard />
			<StartNew />
		</div>
    );
  }
}
