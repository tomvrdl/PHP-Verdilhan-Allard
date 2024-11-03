<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === '1234') {
            $_SESSION['admin_id'] = 1;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $_SESSION['user'] = $username;
            header('Location: citation.php');
            exit;
        }
    }

    if (isset($_POST['auteur']) && isset($_POST['citation'])) {
        $auteur = $_POST['auteur'];
        $citation = $_POST['citation'];

        $citationToSave = htmlspecialchars($auteur) . ': ' . htmlspecialchars($citation) . PHP_EOL;
        file_put_contents('citations.txt', $citationToSave, FILE_APPEND);

        header('Location: citation.php');
        exit;
    }
}

$citations = file_exists('citations.txt') ? file('citations.txt', FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="login.css">

    <script>
        let citations = <?php echo json_encode($citations); ?>;
        let index = 0;

        function afficherCitation() {
            document.getElementById('citationBox').innerText = citations[index];
            index = (index + 1) % citations.length;
        }

        setInterval(afficherCitation, 15000);
    </script>
</head>
<body>
    <h1>BIENVENUE</h1>

    <form action="" method="post">
        Identifiant : <input type="text" name="username" required><br>
        Mot de passe : <input type="password" name="password" required><br>
        <input type="submit" value="Valider">
    </form>

    <h3>Citations</h3>
    <div id="citationBox">Chargement des citations...</div>
</body>
</html>
