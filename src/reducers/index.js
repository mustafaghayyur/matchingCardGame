import { combineReducers } from 'redux';
import CardsDeckReducers from './cardsDeck';
import PlayingCardsReducers from './playingCards';
import MatchedReducers from './matched';
import DisabledCardsReducers from './disabledCards';

import ScoreReducers from './score';
import TurnsReducers from './turns';
import TotalTimeReducers from './totalTime';
import TimeStartReducers from './timeStart';
import TimeEndReducers from './timeEnd';
import SysMsgReducers from './sysMsgs';

const rootReducer = combineReducers({
  deck: CardsDeckReducers, //the full deck of 52 cards to deal from.
  playingCards: PlayingCardsReducers, //the 24 cards drawn on the gameboard
  matched: MatchedReducers, //contains the matched cards data 
  disabledCards: DisabledCardsReducers,
  turns: TurnsReducers,
  totalTime: TotalTimeReducers,
  timeStart: TimeStartReducers,
  timeEnd: TimeEndReducers,
  score: ScoreReducers,
  sysMsgs: SysMsgReducers
});

export default rootReducer;
