import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'ADD_MSG':			
			if(typeof state.array === 'undefined'){
				state.array = [];
			}

			state.array.push(actionOutput.msg);
			return _.extend({}, state);

		case 'ADD_MSG_HEADING':			
			state.heading = actionOutput.heading;
			return _.extend({}, state);

		case 'CLEAR_MSGS':
			state.array = undefined;
			state.heading = undefined;
			state = undefined;
			state = {};
			return _.extend({}, state);
			
		default:
			return state;
	}

}