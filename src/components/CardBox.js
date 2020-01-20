import React, { Component } from 'react';

export default class CardBox extends Component {
  render() {
    return (
		<div class="cardBox">
			<div className="squaredOne">
				<input name="card " id="card" type="checkbox" value="0" />
				<label for="card"></label>
			</div>
		</div>
    );
  }
}
