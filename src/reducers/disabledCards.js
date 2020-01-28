import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'NEW_MATCHED_CARDS':
			let obj = {};			
			obj[actionOutput.data.card1] = 1;
			obj[actionOutput.data.card2] = 1;

			return _.assign(state, obj);

		default:
			return state;
	}

}