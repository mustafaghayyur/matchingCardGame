import React, { Component } from 'react';

export default class StartNew extends Component {
  render() {
    return (
		<form action="index.html" method="post" name="startNew">
			<input type="submit" name="submit" value="New Game" className="button newGame" />
			<input type="hidden" name="newGame" value="1" />
		</form>
    );
  }
}
