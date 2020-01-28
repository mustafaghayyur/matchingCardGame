import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'ADD_CARDS':
			return _.assign(state, actionOutput.data);

		case 'ADD_PICKED_CARD':
			state[actionOutput.data].v = 1;
			return state;
			
		default:
			return state;
	}

}