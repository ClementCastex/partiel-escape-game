<?php 
include 'config.php'; 
$title = "Ajouter une question"; // Ici pour changer le titre de la page 
include 'header.php'; 
?>
<body class="bg-dark text-light">
<div class="container py-5">
  <a href="index.php" class="btn btn-secondary mb-4">Retour à l'accueil</a>
  <h1 class="exo text-primary text-center mb-4">Ajouter une question</h1>
    <form action="traiter_ajout.php" method="POST" class="p-4 bg-secondary rounded shadow">
      <div class="mb-3">
        <label class="form-label">Question :</label>
        <textarea name="question" class="form-control" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Réponse attendue :</label>
        <input type="text" name="reponse" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Message de succès :</label>
        <textarea name="message_success" class="form-control" rows="2" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Message d'échec :</label>
        <textarea name="message_failure" class="form-control" rows="2" required></textarea>
      </div>
      <button type="submit" class="btn btn-warning w-100">Ajouter</button>
    </form>
  </div>
</body>
</html>