<?php
$col = range(1, 4);
$row = range(1, 13);
//shuffle($numbers);

$matrix = array();
foreach ($col as $m=>$c) {
    //echo "$number ";
	foreach ($row as $s => $r) {
		$matrix[$c][$r] = 0;
	}
}

shuffle($matrix);

echo '<pre>';
var_dump($matrix);
echo '</pre>';
?>