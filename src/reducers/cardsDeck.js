import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'ADD_CARDS':			
			let obj3 = _.extend(state, actionOutput.data);
			return _.extend({}, state);

		case 'ADD_PICKED_CARD':
			state[actionOutput.data].v = 1;
			return _.extend({}, state);
			
		default:
			return state;
	}

}