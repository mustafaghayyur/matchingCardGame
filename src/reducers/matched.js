import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'NEW_MATCHED_CARDS':
			let i = (typeof state.num == 'undefined') ? 1 : state.num + 1; 
			state['num'] = i;
			state[i] = [actionOutput.data.card1, actionOutput.data.card2];
			return _.extend({}, state);

		case 'NEW_GAME':
			state = {};
			return state;
			
		default:
			return state;
	}

}