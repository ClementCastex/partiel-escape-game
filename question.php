<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("Aucune question spécifiée.");
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM questions WHERE id = ?");
$stmt->execute([$id]);
$question = $stmt->fetch();

if (!$question) {
    die("Question introuvable.");
}

$stmtPrev = $pdo->prepare("SELECT id FROM questions WHERE id < ? ORDER BY id DESC LIMIT 1");
$stmtPrev->execute([$id]);
$prevQuestion = $stmtPrev->fetch();


$stmtNext = $pdo->prepare("SELECT id FROM questions WHERE id > ? ORDER BY id ASC LIMIT 1");
$stmtNext->execute([$id]);
$nextQuestion = $stmtNext->fetch();

$taux_reussite = $question['total_essais'] > 0 ? round(($question['total_reussites'] / $question['total_essais']) * 100, 2) : 0;


$message = "";
$form_visible = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $reponse_user = strtolower(trim($_POST['reponse']));


    $pdo->prepare("UPDATE questions SET total_essais = total_essais + 1 WHERE id = ?")->execute([$id]);

    if ($reponse_user === strtolower(trim($question['reponse']))) {

        $pdo->prepare("UPDATE questions SET total_reussites = total_reussites + 1 WHERE id = ?")->execute([$id]);
        $message = "<div class='alert alert-success text-center'>".htmlspecialchars($question['message_success'])."</div>";
        $form_visible = false;
    } else {
        $message = "<div class='alert alert-danger text-center'>".htmlspecialchars($question['message_failure'])."</div>";
    }
}

$title = "Répondre à une question"; // Titre personnalisé ici
include 'header.php'; 
?>
<body class="bg-dark text-light">
  <div class="container py-5">
    <a href="index.php" class="btn btn-secondary mb-4">Retour à la liste</a>
    <div class="p-4 bg-secondary rounded shadow">
      <h1 class="exo text-primary text-center"><?php echo htmlspecialchars($question['question']); ?></h1>
      <p class="text-center">Taux de réussite : <span class="text-warning"><?php echo $taux_reussite; ?>%</span></p>
      
      <?php echo $message; ?>

      <?php if ($form_visible): ?>
      <form method="POST" class="mt-4">
        <div class="mb-3">
          <label class="form-label">Votre réponse :</label>
          <input type="text" name="reponse" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning w-100">Valider</button>
      </form>
      <?php endif; ?>


      <div class="d-flex justify-content-between mt-4">
        <a href="question.php?id=<?php echo $prevQuestion ? $prevQuestion['id'] : '#'; ?>" 
           class="btn btn-outline-light <?php echo $prevQuestion ? '' : 'disabled'; ?>">
          Question précédente
        </a>
        <a href="question.php?id=<?php echo $nextQuestion ? $nextQuestion['id'] : '#'; ?>" 
           class="btn btn-outline-light <?php echo $nextQuestion ? '' : 'disabled'; ?>">
          Question suivante
        </a>
      </div>
    </div>
  </div>
</body>
</html>
