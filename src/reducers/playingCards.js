import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'ADD_PICKED_CARDS':
			//console.log('playingcards recuer', state);
			let obj2 = _.extend(state, actionOutput.data);
			return _.extend({}, state);

		case 'ADD_PICKED_CARD':
			let obj1 = {};
			obj1[actionOutput.key] = actionOutput.data;
			//console.log('playingcards recuer', state);
			return _.extend(state, obj1);

		case 'NEW_GAME':
			state = {};
			return state;
			
		default:
			return state;
	}

}