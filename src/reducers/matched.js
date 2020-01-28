import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'NEW_MATCHED_CARDS':
			let obj = {};
			let i = (typeof state.num == 'undefined') ? 1 : state.num + 1; 
			obj['num'] = i;
			obj[i] = [actionOutput.data.card1, actionOutput.data.card2];
			
			return _.assign(state, obj);

		default:
			return state;
	}

}