<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $auteur = $_POST['auteur'];
        $citation = $_POST['citation'];

        $file = 'citations.txt';
        $citationData = "$auteur: \"$citation\"\n";
        file_put_contents($file, $citationData, FILE_APPEND);

        header('Location: index.php');
        exit;
    } else {
        echo "<p style='color:red;'>Vous devez être connecté pour ajouter des citations.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="citation.css">
</head>
<body>
    <h1>Ajout Citation :</h1>
    <form action="" method="post">
        Auteur : <input type="text" name="auteur" required><br>
        Citation : <input type="text" name="citation" required><br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
