<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGEX - EMAIL</title>
</head>

<body>
<?php
if(isset($_POST['email'])) {
$email = $_POST['email'];
$regex = "#^[a-zA-Z0-9_.-]+@[a-zA-Z0-9_.-]+\.[a-zA-Z]{2,4}$#";
$result = preg_match($regex, $email);
if($result) {
	echo "Ceci est bien un email";	
} else {
	echo "Ceci n'est pas un email";	
}
}
?>
<form method="post" action="#">
	<input type="text" name="email" />
    <input type="submit" />
</form>
</body>
</html>