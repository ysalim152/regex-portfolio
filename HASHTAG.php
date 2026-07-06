<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Extraction de Hashtags</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Extraction de Hashtags</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <form method="post" action="#">
                <label for="text">Entrez un texte avec des hashtags :</label>
                <input type="text" name="text" id="text" placeholder="Ex: J'adore le #PHP et les #Regex !" />
                <input type="submit" value="Extraire" />
            </form>

            <?php
            if (isset($_POST['text'])) {
                $text = $_POST['text'];
                // Trouve les mots commençant par #, composés de lettres, chiffres ou underscores.
                $regex = "/#(\w+)/";
                $count = preg_match_all($regex, $text, $matches);

                echo '<div class="result">';
                echo "<strong>" . htmlspecialchars($count) . "</strong> hashtag(s) trouvé(s) : ";
                echo "<code>" . htmlspecialchars(implode(', ', $matches[1])) . "</code>";
                echo '</div>';
            }
            ?>
        </main>
    </div>
</body>
</html>