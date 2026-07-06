<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Contrôle de Pseudo</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Contrôle d'un Pseudo</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <form method="post" action="#">
                <label for="pseudo">Entrez un pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" placeholder="Entre 3 et 10 caractères alphanumériques" />
                <input type="submit" value="Vérifier" />
            </form>

            <?php
            if (isset($_POST['pseudo'])) {
                $pseudo = $_POST['pseudo'];
                // Doit contenir entre 3 et 10 caractères alphanumériques (lettres, chiffres) ou underscore.
                // \w est un raccourci pour [a-zA-Z0-9_].
                $regex = "/^\w{3,10}$/";
                $isMatch = preg_match($regex, $pseudo);

                echo '<div class="result">';
                if (!empty($pseudo)) {
                    echo "Le pseudo \"<strong>" . htmlspecialchars($pseudo) . "</strong>\" est " . ($isMatch ? '<span class="valid">valide</span>.' : '<span class="invalid">invalide</span>.');
                } else {
                    echo "Veuillez entrer un pseudo.";
                }
                echo '</div>';
            }
            ?>
        </main>
    </div>
</body>
</html>