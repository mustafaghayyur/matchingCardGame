import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'STOP_TIMER':
			//console.log('start time reducer', actionOutput);
			var obj = {};
			obj['value'] = actionOutput.data;
			return _.assign(state, obj);

		default:
			return state;
	}

}