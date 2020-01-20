<h1>The Matching Card Game</h1>
<h4>Developed by Malaika Ghayyur: www.web-dotz.com</h4>

<div id="scoreBoard">
	<div id="turns">Total Turns: <?php __($turns);?></div>
	<div id="matches">Total Matches: <?php __($matches);?></div>
</div>

<div id="gameBoard">
  <form name="gameBoard" action="<?php echo SITE_URL.'/index.php'; ?>">	
	<table colspan="6" cellpadding="0" cellspacing="0">
	  <tr>
	    <td><input name="card0" id="card0" type="checkbox" value="<?php __($card[0][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 0)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 0)
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card1" id="card1" type="checkbox" value="<?php __($card[1][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 1)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 1) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card2" id="card2" type="checkbox" value="<?php __($card[2][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 2)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 2) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card3" id="card3" type="checkbox" value="<?php __($card[3][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 3)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 3) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card4" id="card4" type="checkbox" value="<?php __($card[4][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 4)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 4) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card5" id="card5" type="checkbox" value="<?php __($card[5][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 5)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 5) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	  </tr>
	  <tr>
	    <td><input name="card6" id="card6" type="checkbox" value="<?php __($card[6][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 6)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 6) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card7" id="card7" type="checkbox" value="<?php __($card[7][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 7)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 7) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card8" id="card8" type="checkbox" value="<?php __($card[8][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 8)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 8) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card9" id="card9" type="checkbox" value="<?php __($card[9][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 9)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 9) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card10" id="card10" type="checkbox" value="<?php __($card[10][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 10)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 10) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card11" id="card11" type="checkbox" value="<?php __($card[11][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 11)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 11) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	  </tr>
	  <tr>
	    <td><input name="card12" id="card12" type="checkbox" value="<?php __($card[12][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 12)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 12) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card13" id="card13" type="checkbox" value="<?php __($card[13][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 13)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 13) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card14" id="card14" type="checkbox" value="<?php __($card[14][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 14)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 14) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card15" id="card15" type="checkbox" value="<?php __($card[15][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 15)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 15) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card16" id="card16" type="checkbox" value="<?php __($card[16][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 16)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 16) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card17" id="card17" type="checkbox" value="<?php __($card[17][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 17)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 17) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	  </tr>
	  <tr>
	    <td><input name="card18" id="card18" type="checkbox" value="<?php __($card[18][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 18)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 18) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card19" id="card19" type="checkbox" value="<?php __($card[19][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 19)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 19) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card20" id="card20" type="checkbox" value="<?php __($card[20][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 20)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 20) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card21" id="card21" type="checkbox" value="<?php __($card[21][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 21)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 21) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card22" id="card22" type="checkbox" value="<?php __($card[22][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 22)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 22) 
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	    <td><input name="card23" id="card23" type="checkbox" value="<?php __($card[23][0]);?>" disbaled>
	    <?php
	    if($keys[0] == 23)
	    	echo $card1[1].' of '.$card1[0];
	    if($keys[1] == 23)
	    	echo $card2[1].' of '.$card2[0];
	    ?>
	    </td>
	  </tr>
	  <tr>
	    <td colspan="6">

	      <input value="TryAgain" name="TryAgain" type="submit">
	      
	    </td>
	  </tr>
	</table>
  </form>
</div>
