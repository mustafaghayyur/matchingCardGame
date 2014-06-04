<div id="finalScoreBoard">
	<div class="title">ScoreBoard</div>
	<div id="score">Final Score: <?php __(round($score,0));?> pts</div>
	<div id="turns">Total Turns: <?php __($turns);?></div>
	<div id="totalTime">Total Time: <?php __(round($totalTime, 2));?> mins</div>
	<div id="matches">Total Matches: <?php __($matches);?></div>

	<form action="<?php echo SITE_URL.'/index.php';?>" method="post" name="startNew">
		<input type="submit" name="submit" value="New Game" class="button newGame">
		<input type="hidden" name="newGame" value="1">
	</form>
</div>

  

