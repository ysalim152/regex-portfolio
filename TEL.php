<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Contrôle de Numéro de Téléphone</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Contrôle de Numéro de Téléphone</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <form method="post" action="#">
                <label for="tel">Entrez un numéro de téléphone français :</label>
                <input type="text" name="tel" id="tel" placeholder="Ex: 06 12 34 56 78" />
                <input type="submit" value="Vérifier" />
            </form>

            <?php
            if (isset($_POST['tel'])) {
                $tel = $_POST['tel'];
                // Valide les numéros français (01 à 09), avec séparateurs optionnels.
                $regex = "#^0[1-9]([-. ]?[0-9]{2}){4}$#";
                $isMatch = preg_match($regex, $tel);

                echo '<div class="result">';
                echo "Le numéro <code>" . htmlspecialchars($tel) . "</code> est " . ($isMatch ? '<span class="valid">valide</span>.' : '<span class="invalid">invalide</span>.');
                echo '</div>';
            }
            ?>
        </main>
    </div>
</body>
</html>