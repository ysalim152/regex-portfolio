<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Contrôle de Mot de Passe</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Contrôle d'un Mot de Passe Robuste</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <form method="post" action="#">
                <label for="password">Entrez un mot de passe :</label>
                <input type="text" name="password" id="password" placeholder="Min 8 caractères, 1 maj, 1 min, 1 chiffre, 1 spécial" />
                <input type="submit" value="Vérifier" />
            </form>

            <?php
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                // Doit contenir au moins 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial.
                $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                $isMatch = preg_match($regex, $password);

                echo '<div class="result">';
                echo "Le mot de passe est " . ($isMatch ? '<span class="valid">robuste</span>.' : '<span class="invalid">faible</span>.');
                echo '</div>';
            }
            ?>
        </main>
    </div>
</body>
</html>