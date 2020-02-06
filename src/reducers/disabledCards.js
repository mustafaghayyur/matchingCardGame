import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'NEW_MATCHED_CARDS':
			state[actionOutput.data.card1] = 1;
			state[actionOutput.data.card2] = 1;
			return _.extend({}, state);

		case 'NEW_GAME':
			state = {};
			return state;
			
		default:
			return state;
	}

}