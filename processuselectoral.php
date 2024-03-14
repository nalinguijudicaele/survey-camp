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
    <link rel="stylesheet" type="text/css" href="processuselectoral.css">
    <link rel="icon" type="image/png" href="IMG-20240123-WA0094.png.jpg">
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
  
               <div class="slider-container">

                <div class="slide">
                    <h1><strong>Processus électoral</strong></h1>
                  </div>

                <div class="slide">
                  <h5><strong>1.Quels sont les différents types d'élections?</strong></h5>
                  <p>Nous avons les élections présidentielles , les élections législatives , les élections municipales.</p>
                </div>
                <div class="slide">
                  <h5><strong>2.Quels sont les critères pour voter?</strong></h5>
                  <p>Les critères pour être éligible à voter sont d’être âgé d’au moins 20 ans, d’être de nationalité camerounaise, d’être inscrit sur la liste électorale et de ne pas être sous tutelle ou en détention.</p>
                </div>
                <div class="slide">
                  <h5><strong>3.Comment se déroule le dépouillement des votes et comment sont annoncés les résultats ?</strong></h5>
                  <p>Le dépouillement des votes se déroule dans les bureaux de vote et les résultats sont annoncés par la Commission Électorale Nationale.</p>
                </div>
                <div class="slide">
                  <h5><strong>4.Quels sont les droits et les devoirs des électeurs lors d’une élection ?</strong></h5>
                  <p>Les droits et les devoirs des électeurs lors d’une élection comprennent le droit de voter librement et secrètement, le devoir de respecter les règles électorales et de ne pas perturber le processus électoral.</p>
                </div>
                <div class="slide">
                  <h5><strong>5.Quelles sont les mesures de sécurité mises en place pour garantir l’intégrité du processus électoral ?</strong></h5>
                  <p>Les mesures de sécurité mises en place pour garantir l’intégrité du processus électoral peuvent inclure la présence de forces de sécurité, la surveillance électronique et la vérification des identités des électeurs.</p>
                </div>
                <div class="slide">
                  <h5><strong>6.Comment faire une procuration si vous ne pouvez pas voter en personne ?</strong></h5>
                  <p>Pour faire une procuration, vous devez remplir un formulaire et le remettre à une personne de confiance qui votera à votre place.</p>
                </div>
              </div>

              <div class="newsletter">
        <h2>Recevez nos NewsLetters</h2>
        <form method="post">
            <input type="text" name="emailOrPhone" placeholder="Entrez votre adresse Email ou votre Contact" required>
            <button type="submit" id="submit-button" class="custom-button next">Envoyer</button>
        </form>
    </div>

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
                      <P><a href="#"><img src="Whatsapp.png" alt=""> <img src="face book.png" alt=""></a></p>
                      <P><a href="#"><img src="instagram.png" alt=""><img src="gmail.png" alt=""></a></p>
                  </div>
            
                </div>
                <div class="copy">
                  <p>© SurveyCamp 2023 Tous droits réservés. Réalisé par SurveyCamp. </p>
                </div>
               
              </footer>
            </div>

</body>
</html>