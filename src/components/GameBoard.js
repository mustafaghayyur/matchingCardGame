import React, { Component } from 'react';
import CardBox from './CardBox';
import CardBoxDisabled from './CardBoxDisabled';
import StartNew from './StartNew';

export default class GameBoard extends Component {
  
  _showCards(){
  	var card = [{0:0, state:'disabled'},{1:0, state:'null'}];
  	for (var i=0; i < 2; i++){
		if(card[i].state == 'disabled') {
			<CardBoxDisabled />
		}else{
			<CardBox />
		}
	}
  }
  render() {
    return (
		<div id="gameBoard">
			<form name="gameBoard" action="/index.php" method="POST">	
				
				{this._showCards()}
			    
			    <input name="Try" type="submit" value="Match!" className="button try" />
			</form>

			<StartNew />
		</div>
    );
  }
}
