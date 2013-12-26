<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>URL Shortener</title>
	
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
	<h1 class="gradient2 logo">URL Shortener</h1>

	<div id="body">
		<form method="POST">
			<div class="group">
				<span class="group-element">
					<input type="text" name="url" value="<?php echo $url; ?>" placeholder="Paste your link here"> 
				</span>
				<span class="group-element small gradient">
					<button type="submit">Submit</button>
				</span>
			</div>
		</form>
			
		<?php if ( $code ): ?>		
		<div class="preview">
			<h2>Result</h2>
			<input type="text" value="<?php echo str_replace("index.php/", "", site_url($code) ); ?>">
			<img src="<?php echo $code; ?>.png" alt="<?php echo $code; ?>">
		</div>
		<?php endif; ?>
		
		
	</div>

</body>
</html>