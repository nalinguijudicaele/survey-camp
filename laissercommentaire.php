<?php
session_start();

include_once("mysql_connexion.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ emailOrPhone est défini et non vide
    if (isset($_POST['emailOrPhone']) && !empty($_POST['emailOrPhone'])) {
        // Récupérer la valeur soumise du champ emailOrPhone
        $emailOrPhone = $_POST['emailOrPhone'];

        // Préparer et exécuter la requête SQL pour insérer les données dans la table newsletters
        $sql = "INSERT INTO newsletters (emailOrPhone) VALUES (:emailOrPhone)";
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindParam(':emailOrPhone', $emailOrPhone);

        if ($stmt->execute()) {
            echo "Adresse e-mail ou numéro de téléphone enregistré avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement de l'adresse e-mail ou du numéro de téléphone: " . $stmt->error;
        }
    } else {
        echo "Veuillez entrer une adresse e-mail ou un numéro de téléphone valide.";
    }
}
?>

<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="laissercommentaire.css">
    <link rel="icon" type="image/png" href="IMG-20240123-WA0094.png.jpg">
    <style>
        .container {
            display: inline-block;
            vertical-align: top;
        }
    </style>
</head>
<body>

    <header>
        <nav>
          <a href=""> <img src="IMG-20240123-WA0094.png.jpg" alt=""   class="logo"></a>
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="sondage1.php">Sondage</a></li>
            <li><a href="seconnecter.php">Connexion</a></li>
            <li><a href="processuselectoral.php">Processus </a></li>
          </ul>
          <img src="IMG-20240123-WA0097.png.jpg" alt=""  class="menu-icon">
        </nav>
      </header>

      <div>
    <div class="container">
        <h1>Laissez-nous un commentaire...</h1>

        <!-- Formulaire de commentaire -->
        <form>
            <h3>Laissez votre commentaire ici </h3>
            <textarea name="motivation"></textarea>
            <a href="#" class="custom-button next" id="submit-button">Soumettre</a>
            <div id="message" style="display: none;">
                Nous vous remercions d'avoir pris le temps de laisser un message, votre commentaire a été envoyé avec succès ✅ de manière anonyme et confidentielle.
            </div>
        </form>

        <!-- Ombres -->
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>

        <script>
            document.getElementById('submit-button').addEventListener('click', function(event) {
                event.preventDefault(); // Empêche le comportement par défaut du lien
                document.getElementById('message').style.display = 'block'; // Affiche le message de remerciement
                document.getElementById('form-container').style.display = 'none'; // Cache le formulaire
            });
        </script>
    </div>

   
</div>

</body>
</html>