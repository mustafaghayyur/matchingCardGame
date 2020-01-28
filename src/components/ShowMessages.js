import React, { Component } from 'react';
import _ from 'lodash';

export default class ShowMessages extends Component {
  
  renderSysMsgs(sysMsgs){
	return _.map(sysMsgs, (msg, index) => {
		return (
			<p key={index}>
				{msg}
			</p>
			)
		});
  }

  render() {
  	var sysMsgs = [];

  	if(sysMsgs.length == 0){
  		return(null);
  	}

    return (
		<div>
			<div id="sysMsgs">
				{this.renderSysMsgs(sysMsgs)}
			</div>
		</div>
    );
  }
}
