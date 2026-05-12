<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGEX - CODE POSTAL</title>
</head>

<body>
<?php
if(isset($_POST['cp'])) {
$cp = $_POST['cp'];
$regex = "#^[0-9]{5}$#";
$result = preg_match($regex, $cp);
if($result) {
	echo "Ceci est bien un code postal";	
} else {
	echo "Ceci n'est pas un code postal";	
}
}
?>
<form method="post" action="#">
	<input type="text" name="cp" />
    <input type="submit" />
</form>
</body>
</html>