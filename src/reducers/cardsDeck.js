import _ from 'lodash';

export default function(state = {}, actionOutput) {

	switch (actionOutput.type) {
		case 'ADD_CARDS':			
			let obj3 = _.extend(state, actionOutput.data);
			return _.extend({}, state);

		case 'ADD_PICKED_CARDS':
			// Picked cards should be updated in the deck reducer 
			// as well..
			_.forOwn(actionOutput.data, function(value, key) {
				state[value].v = 1;			
			});
			return _.extend({}, state);

		case 'ADD_CARDS':
			state = undefined;
			state = {};
			return _.extend({}, state);
			
		default:
			return state;
	}

}