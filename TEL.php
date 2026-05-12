<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGEX - TEL</title>
</head>

<body>
<?php
if(isset($_POST['tel'])) {
$tel = $_POST['tel'];
$regex = "#^0[1-9]([-. ]?[0-9]{2}){4}$#";
$result = preg_match($regex, $tel);
if($result) {
	echo "Ceci est bien un téléphone";	
} else {
	echo "Ceci n'est pas un téléphone";	
}
}
?>
<form method="post" action="#">
	<input type="text" name="tel" />
    <input type="submit" />
</form>
</body>
</html>