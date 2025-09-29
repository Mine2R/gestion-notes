<?php
require_once __DIR__ . '/../models/db.php';// connexion à la base de données
require_once __DIR__ . '/../models/noteModel.php';// Importation des fonctions CRUD

// appel des fonctions (noteModel.php) si ces conditions sont présentes
// si formulaire on ajoute grâce à la fonction addNote
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        addNote($pdo, $_POST['title'], $_POST['content']);
    }
    header("Location: index.php");// Redirige en get pour la mise à jour des notes permet d'éviter les doublons d ajout
    exit;
}
// permet la suppression d une note 
if (isset($_GET['delete'])) {
    deleteNote($pdo, $_GET['delete']);
    header("Location: index.php");// redirige après la suppression
    exit;
}

$notes = getNotes($pdo);// récuperation des notes
?>