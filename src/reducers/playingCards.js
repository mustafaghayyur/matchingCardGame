import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'ADD_PICKED_CARD':
			var obj = {};
			obj[actionOutput.key] = actionOutput.data;
			return _.assign(state, obj);

		case 'SHUFFLE_CARDS':
			var obj = _.shuffle(actionOutput.data);
			return _.assign(state, obj);

		default:
			return state;
	}

}