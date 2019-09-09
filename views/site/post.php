<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		foreach ($model as $key) {
			echo '<div id="title">'.$key[title].'</div>
				<div id="body">'.$key[body].'</div>
				<div id="created">'.$key[created_at].'</div>
				<div id="updated">'.$key[updated_at].'</div>
				<div id="author">'.$key[author].'</div>';
		}
		?>
	
</body>
</html>