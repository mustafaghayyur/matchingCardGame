<div id="scoreBoard">
	<div class="title">ScoreBoard</div>
	<div id="turns">Total Turns: <?php __($turns);?></div>
	<div id="matches">Total Matches: <?php __($matches);?></div>
</div>

<div id="gameBoard">
  <form name="gameBoard" action="<?php echo SITE_URL.'/index.php'; ?>" method="POST">	
	<?php
		for ($i=0; $i < 24; $i++){
			if($card[$i][1] == 'disabled') {
				echo '<div class="cardBox"><div class="'.$suites[(int) substr($card[$i][0], 0, 1) - 1].' matched"><span class="card'.$ranks[(int) substr($card[$i][0], 2) - 1].'">'.$ranks[(int) substr($card[$i][0], 2) - 1].'
					  </span></div></div>';
			}else{
				echo '<div class="cardBox"><div class="squaredOne"><input name="card'.$i.'" id="card'.$i.'" type="checkbox" value="'. $card[$i][0] .'" '. $card[$i][1] .'>
						  <label for="card'.$i.'"></label></div></div>';
			}
		}
	?>

	      <input name="Try" type="submit" value="Match!" class="button try">
  </form>
  <form action="<?php echo SITE_URL.'/index.php';?>" method="post" name="startNew">
  	<input type="submit" name="submit" value="New Game" class="button newGame">
	<input type="hidden" name="newGame" value="1">
  </form>
</div>
