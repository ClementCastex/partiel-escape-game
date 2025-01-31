<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $question = trim($_POST['question']);
    $reponse = strtolower(trim($_POST['reponse'])); // Normalisation de la réponse
    $message_success = trim($_POST['message_success']);
    $message_failure = trim($_POST['message_failure']);

    // Validation des données
    if (empty($question) || empty($reponse) || empty($message_success) || empty($message_failure)) {
        die("Tous les champs doivent être remplis !");
    }

    // Insertion dans la base de données
    $stmt = $pdo->prepare("INSERT INTO questions (question, reponse, message_success, message_failure) VALUES (?, ?, ?, ?)");
    $stmt->execute([$question, $reponse, $message_success, $message_failure]);

    // Récupération de l'ID de la question ajoutée
    $id = $pdo->lastInsertId();

    // Génération du lien vers la question ajoutée
    $lien_question = "question.php?id=$id";
}
?>

<?php 
$title = "Question ajoutée"; // Titre personnalisé pour la page
include 'header.php'; 
?>
<body class="bg-dark text-light">
  <div class="container py-5">
    <div class="p-4 bg-secondary rounded shadow">
      <h1 class="exo text-primary text-center">Question ajoutée avec succès !</h1>
      <p class="text-center mt-3">Votre question a été enregistrée dans la base de données.</p>
      <p class="text-center">Vous pouvez consulter ou répondre à la question en cliquant sur le lien ci-dessous :</p>
      <div class="text-center mt-4">
        <!-- Lien pour répondre à la question -->
        <a href="<?php echo $lien_question; ?>" class="btn btn-warning">Répondre à la question</a>
        <!-- Bouton pour retourner à la liste -->
        <a href="index.php" class="btn btn-secondary">Retourner à la liste</a>
      </div>
    </div>
  </div>
</body>
</html>
