<?php session_start(); ?>
<?php

$_SESSION['election']= $_POST['election'];
$_SESSION['membre']= $_POST['membre'];
?>

<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="csssondage4.css">
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
            <li><a href="processuselectoral.php">Processus</a></li>
          </ul>
          <img src="IMG-20240123-WA0097.png.jpg" alt=""  class="menu-icon">
        </nav>
      </header>
      
    <h1>Enquête sur les intentions de vote</h1>

    <div class="container">
        <!--formulaire-->
        <form action="sondage5.php" method="post">
            
            <div class="custom-radio">
                <p>7. Souhaitez-vous participer aux prochaines élections électorales ?*</p>
                <input type="radio" id="color-option1" name="election1" value="Oui" required>
                <label for="color-option1">Oui</label>
                <input type="radio" id="color-option2" name="election1" value="Non" required>
                <label for="color-option2">Non</label>
            </div>

            <div class="custom-radio">
                <p>8. quelles et la motivation de votre choix ?*</p>
                <textarea name="motivation"  required></textarea>
            </div>
           
            <a href="sondage3.php" class="custom-button previous">Précédent</a>
            <button type="submit" id="submit-button" class="custom-button next">Suivant</button>

        </form>

        <!--ombres-->
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
    </div>
    
    <script>
        document.getElementById('survey-form').addEventListener('submit', function(event) {
    // Vérifier si toutes les questions obligatoires sont cochées
    var sexChecked = document.querySelector('input[name="election1"]:checked'); // Changer 'color' en 'sexe'
    
    if (!sexChecked) {
        // Afficher le message d'avertissement dans la boîte
        document.getElementById('message').style.display = 'block';
        event.preventDefault(); // Empêchser le comportement par défaut du formulaire
    } 
});
    </script>

</body>
</html>