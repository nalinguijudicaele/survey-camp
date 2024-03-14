<?php session_start(); ?>
<?php 
$_SESSION['election1']= $_POST['election1'];
$_SESSION['motivation']= $_POST['motivation'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="csssondage5.css">
    <link rel="icon" type="image/png" href="IMG-20240123-WA0094.png.jpg">
</head>
<body>

<header>
    <nav>
        <a href=""> <img src="IMG-20240123-WA0094.png.jpg" alt=""   class="logo"></a>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="sondage1.php">Sondage</a></li>
            <li><a href="seconnecter.php">Se Connexion</a></li>
            <li><a href="processuselectoral.php">Processus</a></li>
        </ul>
        <img src="IMG-20240123-WA0097.png.jpg" alt=""  class="menu-icon">
    </nav>
</header>

<h1>Enquête sur les intentions de vote</h1>

<div class="container">
    <!--formulaire-->
    <form id="survey-form" action="remerciement.php" method="post">
        
        <div class="custom-radio">
            <p>9. Avez-vous des suggestions sur l'organisation du processus électoral ? Si oui lesquelles ?*</p>
            <textarea name="suggestion" required></textarea>
        </div>

        <div class="custom-radio">
            <p>10. Comment souhaitez-vous recevoir les informations électorales ?*</p>
            <input type="radio" id="color-option1" name="information" value="Grâce à une application mobile" required>
            <label for="color-option1">Grâce à une application mobile</label>
            <input type="radio" id="color-option2" name="information" value="Grâce aux médias"required>
            <label for="color-option2">Grâce aux médias</label>
            <input type="radio" id="color-option3" name="information" value="Grâce à un SMS" required>
            <label for="color-option3">Grâce à un SMS</label>
            <input type="radio" id="color-option4" name="information" value="Sur notre Site Web"  required>
            <label for="color-option4">Sur notre Site Web</label>
            <input type="radio" id="color-option5" name="information" value="Sur les réseaux sociaux"  required>
            <label for="color-option5">Sur les réseaux sociaux</label>
            <input type="radio" id="color-option6" name="information" value="Par Email"  required>
            <label for="color-option6">Par Email</label>
        </div>
      

        <a href="sondage4.php" class="custom-button previous">Précédent</a>
        <button type="submit" id="submit-button" class="custom-button next">Soumettre</button>

        <div id="message" style="display: none;">
            Nous vous remercions d'avoir pris le temps de participer à notre sondage électoral. Vos différents avis nous aideront à améliorer nos programmes pour mieux répondre à vos attentes. Vos réponses ont été enregistrées de manière anonyme et confidentielle.
        </div>
    </form>

    <!--ombres-->
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>

    <script>
        document.getElementById('survey-form').addEventListener('submit', function(event) {
            // Vérifier si toutes les questions obligatoires sont cochées
            var sexChecked = document.querySelector('input[name="information"]:checked');
            
            if (!sexChecked) {
                // Afficher le message d'avertissement dans la boîte
                document.getElementById('message').style.display = 'block';
                event.preventDefault(); // Empêcher le comportement par défaut du formulaire
            } 
        });
    </script>
</div>

</body>
</html>