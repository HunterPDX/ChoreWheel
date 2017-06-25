<?php

	$myList = ['Item1','Item2','Item3','Item4','Item5','Item6','Item7','Item8','Item9','Item10'];

	for( $x = 0; $x < count($myList); $x++ ){
		echo '<div class="item">' . $myList[$x] . '</div>';
	}
?>