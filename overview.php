<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		$roll = 2.2;
		echo '<h2>roll is '. $roll.'</h2>';
		
		$beautiful = 'feni';
		$beautiful2 = 'feni';
	?>
	
	<?php if($beautiful == $beautiful2): ?>
	<h2>I'm from feni</h2>
	<?php else: ?>
	<h2>I'm from khulna</h2>
	<?php endif; ?>
	
	<?php 
		echo '<h2>I\'m from khulna</h2>';
	?>
	
	<?php 
		$cities = array('one','two','three');
		
		echo $cities[1];
	?>
</body>
</html>