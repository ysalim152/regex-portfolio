<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Contrôle de Date</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Contrôle de Date (JJ/MM/AAAA)</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <form method="post" action="#">
                <label for="date">Entrez une date :</label>
                <input type="text" name="date" id="date" placeholder="Ex: 31/12/2025" />
                <input type="submit" value="Vérifier" />
            </form>

            <?php
            if (isset($_POST['date'])) {
                $date = $_POST['date'];
                // Valide une date au format JJ/MM/AAAA. Attention, ne valide pas la cohérence (ex: 31/02/2025).
                $regex = "#^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}$#";
                $isMatch = preg_match($regex, $date);

                echo '<div class="result">';
                echo "La date <code>" . htmlspecialchars($date) . "</code> est " . ($isMatch ? 'au <span class="valid">bon format</span>.' : 'au <span class="invalid">mauvais format</span>.');
                echo '</div>';
            }
            ?>
        </main>
    </div>
</body>
</html>