<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGEX - URL</title>
</head>

<body>
<?php
if(isset($_POST['url'])) {
$url = $_POST['url'];
$regex = "#^https?://([wW]{3}\.)?[a-zA-Z-0-9._-]+\.[a-zA-Z]{2,4}$#";
$result = preg_match($regex, $url);
if($result) {
	echo "Ceci est bien une URL";	
} else {
	echo "Ceci n'est pas une URL";	
}
}
?>
<form method="post" action="#">
	<input type="text" name="url" />
    <input type="submit" />
</form>
</body>
</html>