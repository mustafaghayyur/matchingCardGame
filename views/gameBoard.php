<h1>The Matching Card Game</h1>
<h4>Developed by Malaika Ghayyur: www.web-dotz.com</h4>

<div id="scoreBoard">
	<div id="turns"><?php __($turns);?></div>
	<div id="matches"><?php __($matches);?></div>
</div>

<div id="gameBoard">
  <form name="gameBoard" action="">	
	<table colspan="6" cellpadding="0" cellspacing="0">
	  <tr>
	    <td><input name="card1" id="card1" type="checkbox" value="<?php __($card[1]);?>"></td>
	    <td><input name="card2" id="card2" type="checkbox" value="<?php __($card[2]);?>"></td>
	    <td><input name="card3" id="card3" type="checkbox" value="<?php __($card[3]);?>"></td>
	    <td><input name="card4" id="card4" type="checkbox" value="<?php __($card[4]);?>"></td>
	    <td><input name="card5" id="card5" type="checkbox" value="<?php __($card[5]);?>"></td>
	    <td><input name="card6" id="card6" type="checkbox" value="<?php __($card[6]);?>"></td>
	  </tr>
	  <tr>
	    <td><input name="card7" id="card7" type="checkbox" value="<?php __($card[7]);?>"></td>
	    <td><input name="card8" id="card8" type="checkbox" value="<?php __($card[8]);?>"></td>
	    <td><input name="card9" id="card9" type="checkbox" value="<?php __($card[9]);?>"></td>
	    <td><input name="card10" id="card10" type="checkbox" value="<?php __($card[10]);?>"></td>
	    <td><input name="card11" id="card11" type="checkbox" value="<?php __($card[11]);?>"></td>
	    <td><input name="card12" id="card12" type="checkbox" value="<?php __($card[12]);?>"></td>
	  </tr>
	  <tr>
	    <td><input name="card13" id="card13" type="checkbox" value="<?php __($card[13]);?>"></td>
	    <td><input name="card14" id="card14" type="checkbox" value="<?php __($card[14]);?>"></td>
	    <td><input name="card15" id="card15" type="checkbox" value="<?php __($card[15]);?>"></td>
	    <td><input name="card16" id="card16" type="checkbox" value="<?php __($card[16]);?>"></td>
	    <td><input name="card17" id="card17" type="checkbox" value="<?php __($card[17]);?>"></td>
	    <td><input name="card18" id="card18" type="checkbox" value="<?php __($card[18]);?>"></td>
	  </tr>
	  <tr>
	    <td><input name="card19" id="card19" type="checkbox" value="<?php __($card[19]);?>"></td>
	    <td><input name="card20" id="card20" type="checkbox" value="<?php __($card[20]);?>"></td>
	    <td><input name="card21" id="card21" type="checkbox" value="<?php __($card[21]);?>"></td>
	    <td><input name="card22" id="card22" type="checkbox" value="<?php __($card[22]);?>"></td>
	    <td><input name="card23" id="card23" type="checkbox" value="<?php __($card[23]);?>"></td>
	    <td><input name="card24" id="card24" type="checkbox" value="<?php __($card[24]);?>"></td>
	  </tr>
	  <tr>
	    <td colspan="6">
	      <?php
	      if($try = 'try'){
	      	echo '<input name="Try" type="submit">';
	      }elseif($try == 'tried'){
	      	echo '<input name="Try Again" type="submit">';
	      }
	      
	    </td>
	  </tr>
	</table>
  </form>
</div>
