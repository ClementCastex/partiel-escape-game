<?php
include 'config.php';

$title = "Accueil - Liste des questions";
include 'header.php';

$order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';

$query = "
    SELECT 
        id, 
        question, 
        total_essais, 
        total_reussites, 
        (CASE 
            WHEN total_essais > 0 
            THEN (total_reussites / total_essais) * 100 
            ELSE 0 
        END) AS taux_reussite
    FROM questions
    ORDER BY taux_reussite $order
";
$stmt = $pdo->query($query);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<body class="bg-dark text-light">
  <div class="container py-5">
    <h1 class="exo text-primary text-center mb-4">Accueil - Liste des questions</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <a href="ajouter.php" class="btn btn-warning">Ajouter une question</a>
      <div>
        <a href="index.php?order=asc" class="btn btn-secondary <?php echo $order == 'ASC' ? 'active' : ''; ?>">Tri croissant</a>
        <a href="index.php?order=desc" class="btn btn-secondary <?php echo $order == 'DESC' ? 'active' : ''; ?>">Tri décroissant</a>
      </div>
    </div>

    <?php if (count($questions) > 0): ?>
      <table class="table table-striped table-dark table-hover">
        <thead>
          <tr>
            <th>Question</th>
            <th>Taux de réussite</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($questions as $question): ?>
            <tr>
              <td><?php echo htmlspecialchars($question['question']); ?></td>
              <td><?php echo round($question['taux_reussite'], 2); ?>%</td>
              <td>
                <a href="question.php?id=<?php echo $question['id']; ?>" class="btn btn-primary btn-sm">Répondre à cette question </a>
                <a href="supprimer.php?id=<?php echo $question['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-center">Aucune question n'a été ajoutée pour l'instant.</p>
    <?php endif; ?>
  </div>
</body>
</html>
