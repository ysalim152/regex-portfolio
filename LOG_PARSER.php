<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>REGEX - Analyseur de Logs (PHP)</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />
<style>
    .log-data {
        background-color: #272822; /* okaidia theme background */
        color: #f8f8f2;
        padding: 15px;
        border-radius: var(--border-radius);
        white-space: pre-wrap;
        font-family: monospace;
        margin-bottom: 20px;
        font-size: 0.9em;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 0.9em;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        word-break: break-all;
    }
    th {
        background-color: var(--primary-color);
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Analyseur de Logs (Parsing) avec PHP</h1>
            <p><a href="index.html">Retour à l'accueil</a></p>
        </header>

        <main>
            <h3>Objectif</h3>
            <p>Cet exemple montre comment utiliser <code>preg_match_all</code> pour analyser (parser) un bloc de texte multi-lignes, comme un fichier de log de serveur web, et en extraire des informations structurées pour chaque ligne.</p>

            <h3>Données de log brutes</h3>
            <div class="log-data">
<?php
$log_data = <<<LOG
127.0.0.1 - - [10/Oct/2000:13:55:36 -0700] "GET /apache_pb.gif HTTP/1.0" 200 2326
192.168.1.1 - user [10/Oct/2000:13:55:38 -0700] "POST /login.php HTTP/1.1" 401 512
203.0.113.45 - - [10/Oct/2000:13:56:12 -0700] "GET /index.html HTTP/1.1" 200 8765
198.51.100.12 - - [10/Oct/2000:13:56:15 -0700] "GET /nonexistent.css HTTP/1.1" 404 345
invalid line that will not be matched
8.8.8.8 - - [10/Oct/2000:14:01:02 -0700] "PUT /api/v1/data HTTP/2.0" 204 0
LOG;
echo htmlspecialchars($log_data);
?>
            </div>

            <h3>Le code PHP et l'expression régulière</h3>
            <p>L'expression régulière est conçue pour capturer les différentes parties de chaque ligne de log. Le modificateur <code>m</code> (multi-ligne) est crucial pour que <code>^</code> et <code>$</code> correspondent au début et à la fin de chaque ligne, et non seulement du texte entier.</p>
            <pre><code class="language-php">
$log_data = "..."; // Contenu des logs ci-dessus

// Regex pour capturer les différentes parties d'une ligne de log
$regex = '/^(\S+) \S+ \S+ \[(.+)\] "(\S+) (.+) \S+" (\d{3}) (\d+)$/m';

$matches = [];
preg_match_all($regex, $log_data, $matches, PREG_SET_ORDER);

// Affichage des résultats dans un tableau
echo "&lt;table&gt;";
echo "&lt;tr&gt;&lt;th&gt;IP&lt;/th&gt;&lt;th&gt;Date/Heure&lt;/th&gt;&lt;th&gt;Méthode&lt;/th&gt;&lt;th&gt;URL&lt;/th&gt;&lt;th&gt;Statut&lt;/th&gt;&lt;th&gt;Taille&lt;/th&gt;&lt;/tr&gt;";

foreach ($matches as $match) {
    echo "&lt;tr&gt;";
    echo "&lt;td&gt;" . htmlspecialchars($match[1]) . "&lt;/td&gt;"; // IP
    echo "&lt;td&gt;" . htmlspecialchars($match[2]) . "&lt;/td&gt;"; // Timestamp
    echo "&lt;td&gt;" . htmlspecialchars($match[3]) . "&lt;/td&gt;"; // Method
    echo "&lt;td&gt;" . htmlspecialchars($match[4]) . "&lt;/td&gt;"; // URL
    echo "&lt;td&gt;" . htmlspecialchars($match[5]) . "&lt;/td&gt;"; // Status Code
    echo "&lt;td&gt;" . htmlspecialchars($match[6]) . "&lt;/td&gt;"; // Size
    echo "&lt;/tr&gt;";
}

echo "&lt;/table&gt;";
            </code></pre>

            <h3>Résultat de l'analyse</h3>
            <div class="result">
                <?php
                // Regex pour capturer les différentes parties d'une ligne de log
                $regex = '/^(\S+) \S+ \S+ \[(.+)\] "(\S+) (.+) \S+" (\d{3}) (\d+)$/m';

                $matches = [];
                preg_match_all($regex, $log_data, $matches, PREG_SET_ORDER);

                echo "<table>";
                echo "<tr><th>IP</th><th>Date/Heure</th><th>Méthode</th><th>URL</th><th>Statut</th><th>Taille (octets)</th></tr>";

                foreach ($matches as $match) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($match[1]) . "</td>"; // IP
                    echo "<td>" . htmlspecialchars($match[2]) . "</td>"; // Timestamp
                    echo "<td>" . htmlspecialchars($match[3]) . "</td>"; // Method
                    echo "<td>" . htmlspecialchars($match[4]) . "</td>"; // URL
                    echo "<td>" . htmlspecialchars($match[5]) . "</td>"; // Status Code
                    echo "<td>" . htmlspecialchars($match[6]) . "</td>"; // Size
                    echo "</tr>";
                }
                echo "</table>";
                ?>
            </div>
        </main>
    </div>

    <!-- Prism.js pour la coloration syntaxique -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>