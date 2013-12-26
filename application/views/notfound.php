<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>URL Shortener</title>
	
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
	<h1 class="logo gradient2">URL Shortener</h1>

	<div id="body">
		<h1>NOT FOUND</h1>
		<h2><i><?php echo $code;?></i> seems to be invalid code, back to <a href="<?php echo str_replace("index.php/", "", site_url("/") ); ?>">home page</a></h2>
	</div>

</body>
</html>