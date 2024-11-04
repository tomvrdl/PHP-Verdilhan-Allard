<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && $password === $admin['password']) {
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user && $password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: citation.php');
                exit;
            } else {
                echo "<p style='color:red;'>Nom d'utilisateur ou mot de passe incorrect.</p>";
            }
        }
    }
}

$citations = file_exists('citations.txt') ? file('citations.txt', FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="Index.css">

    <script>
    let citations = <?php echo json_encode($citations); ?>;
    let index = 0;

    function afficherCitation() {
        if (citations.length > 0) {
            document.getElementById('citationBox').innerText = citations[index];
            index = (index + 1) % citations.length;
        }
    }

    window.onload = afficherCitation;
    setInterval(afficherCitation, 15000);
    </script>
</head>
<body>
    <h1>Bienvenue</h1>

    <form action="" method="post">
        Identifiant : <input type="text" name="username" required><br>
        Mot de passe : <input type="password" name="password" required><br>
        <input type="submit" value="Valider">
    </form>

    <div id="citationBox">Chargement des citations...</div>
</body>
</html>
