<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGEX - PSEUDO</title>
</head>

<body>
<?php
if(isset($_POST['pseudo'])) {
	$pseudo = $_POST['pseudo'];
	$regex ="#^\w{3,10}$#i";
	$result = preg_match($regex, $pseudo);
	if($result) {
		echo "Le pseudo est ok";
	} else {
		echo "Le pseudo n'est  pas ok";
	}
}
?>

<form method="post" action="#">
	<input type="text" name="pseudo" />
    <input type="submit" />
</form>
</body>
</html>