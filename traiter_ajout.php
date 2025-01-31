<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $question = trim($_POST['question']);
    $reponse = strtolower(trim($_POST['reponse'])); 
    $message_success = trim($_POST['message_success']);
    $message_failure = trim($_POST['message_failure']);

    if (empty($question) || empty($reponse) || empty($message_success) || empty($message_failure)) {
        die("Tous les champs doivent être remplis !");
    }


    $stmt = $pdo->prepare("INSERT INTO questions (question, reponse, message_success, message_failure) VALUES (?, ?, ?, ?)");
    $stmt->execute([$question, $reponse, $message_success, $message_failure]);

    $id = $pdo->lastInsertId();

    $lien_question = "question.php?id=$id";
}
?>

<?php 
$title = "Question ajoutée"; // le titre ici
include 'header.php'; 
?>
<body class="bg-dark text-light">
  <div class="container py-5">
    <div class="p-4 bg-secondary rounded shadow">
      <h1 class="exo text-primary text-center">Question ajoutée avec succès !</h1>
      <p class="text-center mt-3">Votre question a été enregistrée dans la base de données.</p>
      <p class="text-center">Vous pouvez consulter ou répondre à la question en cliquant sur le lien ci-dessous :</p>
      <div class="text-center mt-4">

        <a href="<?php echo $lien_question; ?>" class="btn btn-warning">Répondre à la question</a>

        <a href="index.php" class="btn btn-secondary">Retourner à la liste</a>
      </div>
    </div>
  </div>
</body>
</html>
