<?php
//secure data
if (!empty($_POST) && isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    session_start();
    $_SESSION['pseudo'] = $_POST['pseudo'];
    header('Location:tchat.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- JavaScript -->
    <script type="text/javascript" rel="script" src="js/chat_app.js"></script>
</head>

<body>