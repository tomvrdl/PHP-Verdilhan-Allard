<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_citation'])) {
    $citationIndex = $_POST['citation_index'];
    $citations = file_exists('citations.txt') ? file('citations.txt', FILE_IGNORE_NEW_LINES) : [];

    if (isset($citations[$citationIndex])) {
        unset($citations[$citationIndex]);
        file_put_contents('citations.txt', implode(PHP_EOL, $citations));
    }
}

$citations = file_exists('citations.txt') ? file('citations.txt', FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Citations</title>
</head>
<body>
    <h1>Tableau de Bord Admin - Gestion des Citations</h1>

    <?php if (!empty($citations)): ?>
        <ul>
            <?php foreach ($citations as $index => $citation): ?>
                <li>
                    <?php echo htmlspecialchars($citation); ?>
                    <form action="admin_dashboard.php" method="post" style="display:inline;">
                        <input type="hidden" name="citation_index" value="<?php echo $index; ?>">
                        <input type="submit" name="delete_citation" value="Supprimer">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune citation à afficher.</p>
    <?php endif; ?>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>