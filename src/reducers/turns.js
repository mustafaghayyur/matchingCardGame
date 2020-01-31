import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'TURNS_INCREMENT':
			state['num'] = (typeof state.num == 'undefined') ? 1 : state.num + 1; 
			return _.extend({}, state);

		case 'NEW_GAME':
			state = {};
			return state;
			
		default:
			return state;
	}

}