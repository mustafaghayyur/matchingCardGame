import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'FINAL_SCORE_UPDATE':
			state.value = actionOutput.data;
			
			if(typeof state.history === 'undefined'){
				state.history = [];
			}

			state.history.push(actionOutput.data);
			
			return _.extend({}, state);

		case 'NEW_GAME':
			state.value = undefined;
			return _.extend({}, state);
			
		default:
			return state;
	}

}