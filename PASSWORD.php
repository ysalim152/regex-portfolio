<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Contrôle de Mot de Passe (PHP)</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <header>
            <h1>Contrôle d'un Mot de Passe Robuste</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <?php $password = $_POST['password'] ?? ''; ?>
            <form method="post" action="#">
                <label for="password">Entrez un mot de passe :</label>
                <input type="text" name="password" id="password" placeholder="Min 8 caractères, 1 maj, 1 min, 1 chiffre, 1 spécial" value="<?php echo htmlspecialchars($password); ?>" />
                <input type="submit" value="Vérifier" />
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Doit contenir au moins 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial.
                $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                $isMatch = preg_match($regex, $password);

                echo '<div class="result">';
                if (empty($password)) {
                    echo 'Veuillez entrer un mot de passe.';
                } else {
                    echo "Le mot de passe est " . ($isMatch ? '<span class="valid">robuste</span>.' : '<span class="invalid">faible</span>.');
                }
                echo '</div>';
            }
            ?>

            <h3>Le code PHP et l'expression régulière</h3>
            <p>Cette expression régulière utilise des "lookaheads" (assertions avant) pour vérifier la présence de plusieurs conditions sans consommer de caractères :</p>
            <ul>
                <li><code>(?=.*[a-z])</code> : Doit contenir au moins une minuscule.</li>
                <li><code>(?=.*[A-Z])</code> : Doit contenir au moins une majuscule.</li>
                <li><code>(?=.*\d)</code> : Doit contenir au moins un chiffre.</li>
                <li><code>(?=.*[@$!%*?&])</code> : Doit contenir au moins un caractère spécial.</li>
                <li><code>[A-Za-z\d@$!%*?&]{8,}</code> : Doit être composé d'au moins 8 des caractères autorisés.</li>
            </ul>
            <pre><code class="language-php">
$password = "PassWord123!";
$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$isMatch = preg_match($regex, $password); // Retourne 1 (vrai)
            </code></pre>
        </main>
    </div>

    <!-- Prism.js pour la coloration syntaxique -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>