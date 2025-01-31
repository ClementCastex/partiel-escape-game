<?php 
include 'config.php'; 
$title = "Question ajoutée";// Ici pour changer le titre de la page 
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
      </div>
    </div>
  </div>
</body>
</html>
