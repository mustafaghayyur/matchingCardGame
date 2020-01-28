import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'TURNS_INCREMENT':
			let obj = {};
			obj['num'] = (typeof state.num == 'undefined') ? 1 : state.num + 1; 
			return _.assign(state, obj);

		default:
			return state;
	}

}