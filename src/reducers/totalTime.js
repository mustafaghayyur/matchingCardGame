import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'TOTAL_TIME_UPDATE':
			//console.log('start time reducer', actionOutput);
			let obj = {};
			obj['value'] = actionOutput.data;
			return _.assign(state, obj);

		default:
			return state;
	}

}