<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Extraction de Hashtags</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <header>
            <h1>Extraction de Hashtags</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <?php $text = $_POST['text'] ?? ''; ?>
            <form method="post" action="#">
                <label for="text">Entrez un texte avec des hashtags :</label>
                <input type="text" name="text" id="text" placeholder="Ex: J'adore le #PHP et les #Regex !" value="<?php echo htmlspecialchars($text); ?>" />
                <input type="submit" value="Extraire" />
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Trouve les mots commençant par #, composés de lettres, chiffres ou underscores.
                $regex = "/#(\w+)/";
                $count = preg_match_all($regex, $text, $matches);

                echo '<div class="result">';
                if ($count > 0) {
                    echo "<strong>" . htmlspecialchars($count) . "</strong> hashtag(s) trouvé(s) : ";
                    echo "<code>" . htmlspecialchars(implode(', ', $matches[1])) . "</code>";
                } else {
                    echo "Aucun hashtag trouvé.";
                }
                echo '</div>';
            }
            ?>

            <h3>Le code PHP et l'expression régulière</h3>
            <p>Cette expression utilise <code>preg_match_all</code> pour trouver toutes les occurrences d'un modèle dans une chaîne. Le modèle recherche un <code>#</code> suivi d'un ou plusieurs "caractères de mot" (lettres, chiffres, et underscore).</p>
            <pre><code class="language-php">
$text = "J'adore le #PHP et les #Regex !";
$regex = "/#(\w+)/";
$matches = [];
preg_match_all($regex, $text, $matches);

// $matches[1] contiendra ['PHP', 'Regex']
            </code></pre>
        </main>
    </div>

    <!-- Prism.js pour la coloration syntaxique -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>