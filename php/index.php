<?php
	// $_SERVER is available in any php running under php 
	// it is an associative array, set of name and value pairs
	// for an ordered array, you just use numbers
	$url = parse_url($_SERVER['REQUEST_URI']);
	// $name = 'Dave';
	// if you do localhost:9000/Dave it would come out as 'Hello Dave'
	$name = substr($url['path'], 1);
	// if there is no path at all
	if (strlen($name) == 0) {
		$name = 'World';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Hello <?= htmlentitites($name) ?></title>
</head>
<body>
	
	<h1>
		Hello <?= htmlentities($name) ?>!
	</h1>	
	
</body>
</html>

<!--sublime text use emmet cheat sheet-->