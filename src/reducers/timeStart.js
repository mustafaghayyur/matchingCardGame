import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'START_TIMER':
			//console.log('start time reducer', actionOutput);
			state['value'] = actionOutput.data;
			return _.extend({}, state);

		case 'NEW_GAME':
			state = {};
			return state;
			
		default:
			return state;
	}

}