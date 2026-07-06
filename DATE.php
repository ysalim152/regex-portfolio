<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Contrôle de Date (PHP)</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <header>
            <h1>Contrôle d'une Date (JJ/MM/AAAA) avec PHP</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <?php $date = $_POST['date'] ?? ''; ?>
            <form method="post" action="#">
                <label for="date">Entrez une date :</label>
                <input type="text" name="date" id="date" placeholder="Ex: 31/12/2025" value="<?php echo htmlspecialchars($date); ?>" />
                <input type="submit" value="Vérifier" />
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Valide une date au format JJ/MM/AAAA. Attention, ne valide pas la cohérence (ex: 31/02/2025).
                $regex = "#^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}$#";
                $isMatch = preg_match($regex, $date);

                echo '<div class="result">';
                echo "La date <code>" . htmlspecialchars($date) . "</code> est " . ($isMatch ? 'au <span class="valid">bon format</span>.' : 'au <span class="invalid">mauvais format</span>.');
                echo '</div>';
            }
            ?>

            <h3>Le code PHP et l'expression régulière</h3>
            <p>Cette expression régulière valide une date au format <code>JJ/MM/AAAA</code>. Elle ne vérifie pas la validité calendaire (ex: 31/02/2025 sera accepté par la regex).</p>
            <pre><code class="language-php">
$date = "31/12/2025";
// Regex pour le format JJ/MM/AAAA
$regex = "#^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}$#";
$isMatch = preg_match($regex, $date); // Retourne 1 (vrai)
            </code></pre>
            <p>Détails de la regex : <code>^</code> début, <code>(0[1-9]|[12][0-9]|3[01])</code> pour le jour, <code>/</code>, <code>(0[1-9]|1[0-2])</code> pour le mois, <code>/</code>, <code>[0-9]{4}</code> pour l'année, et <code>$</code> pour la fin.</p>
        </main>
    </div>

    <!-- Prism.js pour la coloration syntaxique -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>