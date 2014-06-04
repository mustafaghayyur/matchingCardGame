
<div id="scoreBoard">
	<div id="turns">Total Turns: <?php __($turns);?></div>
	<div id="matches">Total Matches: <?php __($matches);?></div>
</div>

<div id="gameBoard">
  <form name="gameBoard" action="<?php echo SITE_URL.'/index.php'; ?>">	
	<table colspan="6" cellpadding="0" cellspacing="0">
	<?php
		for ($i=0; $i < 24; $i++){

			if($i == 0 || $i == 6 || $i == 12 || $i == 18 ){
				echo '<tr>';
			}

			if($keys[0] == $i){
				echo '<td><div class="'.$card1[0].'"><span class="card'.$card1[1].'">'.$card1[1].'
					  </span></div></td>';
			}elseif($keys[1] == $i){
	    		echo '<td><div class="'.$card2[0].'"><span class="card'.$card2[1].'">'.$card2[1].'
					  </span></div></td>';
			}else{
				echo '<td><div class="squaredOne"><input name="card'.$i.'" id="card'.$i.'" type="checkbox" value="'.$card[$i][0].'" disbaled>
					  <label for="card'.$i.'"></label></div></td>';
			}

			if($i == 5 || $i == 11 || $i == 17 || $i == 23 ){
				echo '</tr>';
			}
		}
	?>


	  <tr>
	    <td colspan="6">

	      <input value="Try Again" name="TryAgain" type="submit" class="button tryAgain">
	      
	    </td>
	  </tr>
	</table>
  </form>
  <form action="<?php echo SITE_URL.'/index.php';?>" method="post" name="startNew">
	  <input type="submit" name="submit" value="New Game" class="button newGame">
	  <input type="hidden" name="newGame" value="1">
	</form>
</div>
