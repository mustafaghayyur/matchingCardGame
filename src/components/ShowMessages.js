import React, { Component } from 'react';

export default class ShowMessages extends Component {
  render() {
    return (
		<div>
			<div id="sysMsgs">
				foreach(errorMsgs as error){
					<p> error </p>
				}
			</div>

			<div id="response">
				response
			</div>
		</div>
    );
  }
}
