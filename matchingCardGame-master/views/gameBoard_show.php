
<div id="scoreBoard">
	<div id="turns">Total Turns: <?php __($turns);?></div>
	<div id="matches">Total Matches: <?php __($matches);?></div>
</div>

<div id="gameBoard">
  <form name="gameBoard" action="<?php echo SITE_URL.'/index.php'; ?>">	
	<table colspan="6" cellpadding="0" cellspacing="0">
	<?php
		for ($i=0; $i < 24; $i++){

			if($keys[0] == $i){
				echo '<div class="cardBox"><div class="'.$card1[0].'"><span class="card'.$card1[1].'">'.$card1[1].'
					  </span></div></div>';
			}elseif($keys[1] == $i){
	    		echo '<div class="cardBox"><div class="'.$card2[0].'"><span class="card'.$card2[1].'">'.$card2[1].'
					  </span></div></div>';
			}else{
				
				if($card[$i][1] == 'disabled') {
					echo '<div class="cardBox"><div class="'.$suites[(int) substr($card[$i][0], 0, 1) - 1].' matched"><span class="card'.$ranks[(int) substr($card[$i][0], 2) - 1].'">'.$ranks[(int) substr($card[$i][0], 2) - 1].'
						  </span></div></div>';
				}else{
					echo '<div class="cardBox"><div class="squaredOne"><input name="card'.$i.'" id="card'.$i.'" type="checkbox" value="'.$card[$i][0].'" disbaled>
					  	  <label for="card'.$i.'"></label></div></div>';
				}



			}
		}
	?>
	      <input value="Try Again" name="TryAgain" type="submit" class="button tryAgain">
  </form>
  <form action="<?php echo SITE_URL.'/index.php';?>" method="post" name="startNew">
	  <input type="submit" name="submit" value="New Game" class="button newGame">
	  <input type="hidden" name="newGame" value="1">
	</form>
</div>
