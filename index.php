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
<html lang="fr">
<head >
    <meta charset="ISO_8859_1">
    <title>SurveyCamp</title>
    <meta charset="ISO_8859_1">
    <link rel="stylesheet" type="text/css" href="cssformulaire.css">
    <link rel="icon" type="image/png" href="IMG-20240123-WA0094.png.jpg">
</head>

  
  <body>
   
    <header>
      <nav>
          <a href=""> <img src="IMG-20240123-WA0094.png.jpg" alt="" class="logo"></a>
          <ul>
              <li><a href="formulaire.php">Accueil</a></li>
              <li><a href="sondage1.php">Sondage</a></li>
              <li><a href="seconnecter.php">Connexion</a></li>
              <li><a href="processuselectoral.php">Processus</a></li>
          </ul>
          <img src="IMG-20240123-WA0097.png.jpg" alt="" class="menu-icon">
      </nav>
  </header>

   
  <div class="main-content">
    <section class="text">
        <h1>Survey Camp <span class="auto-typing"></span></h1>
        <h3><strong>Your Opinion Counts</strong> <span class="auto-typing"></span></h3>
    </section>
    <!--lien sondage-->
    <a href="sondage1.php" class="message">Votre Opinion Compte! Donnez votre avis en répondant à notre sondage électoral dès maintenant ici 👆🏽.</a>
</div>




<div id="square-container">
  <p id="typewriter-text"></p>
</div>




<div class="contenu">
  <div class="text">
    <!-- Votre contenu ici -->
  </div>
  <div class="video-container">
    <video id="maVideo" controls autoplay loop>
      <source src="VID-20231129-WA0096(1).mp4" type="video/mp4">
    </video>
  </div>
</div>


<div class="newsletter">
        <h2>Recevez nos NewsLetters</h2>
        <form method="post">
            <input type="text" name="emailOrPhone" placeholder="Entrez votre adresse Email ou votre Contact" required>
            <button type="submit" id="submit-button" class="custom-button next">Envoyer</button>
        </form>
 </div>

<script>
        document.getElementById('survey-form').addEventListener('submit', function(event) {
            // Vérifier si toutes les questions obligatoires sont cochées
            var sexChecked = document.querySelector('input[name="emailOrPhone"]:checked');
            
            if (!sexChecked) {
                // Afficher le message d'avertissement dans la boîte
                document.getElementById('message').style.display = 'block';
                event.preventDefault(); // Empêcher le comportement par défaut du formulaire
            } 
        });
    </script>



<div class="conteneur"></div>  
  <footer>
    <div class="contenu-footer">

      <div class="footer-services">
        <h3>Nos Services</h3>
          <p>Sondages personnalisés</p>
          <p>Analyse des tendaces éléctorales</p>
          <p>Informations électorales</p>
      </div>
      
      <div class="footer-contacts">
        <h3>Restons en contacts</h3>
          <p>📞 00 237 699 999 999</p>
          <p><img src="localisation.png" alt=""> Douala,Cameroun</p>
          <p><a href="mailto:Info@surveycamp.net"><img src="gmail.png" alt=""> Info@surveycamp.net</a></p>
      </div>
      
      <div class="footer-horaires">
        <h3>Nos Horaires</h3>
          <p> ✅Lundi - Vendredi: 8h - 16h30</p>
          <p>❌Samedi et Dimanche: Fermé</p>
      </div>

      
      <div class="footer-informations">
        <h3>Informations suplémentaires</h3>
          <p><a href="lien-de-à-propos">A propos</a></p>
          <p><a href="laissercommentaire.php">Laisser un commentaire</a></p>
      </div>
      
      <div class="footer-reseaux">
        <h3>Nos Réseaux</h3>
          <P><a href=""><img src="Whatsapp.png" alt=""> <img src="face book.png" alt=""></a></p>
          <P><a href=""><img src="instagram.png" alt=""><img src="gmail.png" alt=""></a></p>
      </div>

    </div>
    <div class="copy">
      <p>© SurveyCamp 2023 Tous droits réservés. Réalisé par SurveyCamp. </p>
    </div>
   
  </footer>
</div>

<script src="style.js"></script>


  </body>
  </html>