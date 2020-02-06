import React, { Component } from 'react';
import {connect} from 'react-redux';
import { bindActionCreators } from 'redux';
import _ from 'lodash';
import { clearSysMsg } from '../actions/';

class ShowMessages extends Component {
  
  constructor(props){
  	super(props);
  	this.onClearMsgsClickEvent = this.onClearMsgsClickEvent.bind(this);
  }

  renderSysMsgs(sysMsgs){
	return _.map(sysMsgs, (msg, index) => {
		if(msg.length == 0){
			msg = " ";
		}
		return (
			<p key={index}>
				{msg}
			</p>
			)
		});
  }

  render() {
  	let heading = (typeof this.props.sysMsgs.heading === 'undefined') ? 'Welcome' : this.props.sysMsgs.heading;
    
    return (
		<div id="sysMsgs">
			<div className="heading">{heading}</div>
			{this.renderSysMsgs(this.props.sysMsgs.array)}
			<input type="submit" name="sysMsgsClear" value="OK" className="button clearMsgs" onClick={this.onClearMsgsClickEvent} />
		</div>
    );
  }

  onClearMsgsClickEvent(e){
  	this.props.clearSysMsg();
  }
}

function mapStateToProps(state) {
	return (
		{
			sysMsgs: state.sysMsgs
		}
	);
}

function mapDispatchToProps(dispatch){
	return bindActionCreators({clearSysMsg:clearSysMsg}, dispatch);
}

export default connect(mapStateToProps, mapDispatchToProps)(ShowMessages);