<?php header("Location: $url"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>URL Shortener</title>
	<meta http-equiv="refresh" content="0;url=<?php echo $url; ?>">
</head>
<body>
	<a href="<?php echo $url; ?>">Direct link</a>
</body>
</html>