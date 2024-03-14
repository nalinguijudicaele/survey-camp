<!DOCTYPE html>
<html >
<head >
    <meta charset="UTF-8">
    <title>SurveyCamp</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="csssondage1.css">
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

    <h1>Enquête sur les intentions de vote</h1>

    <div class="container">
        <!--formulaire-->
        <form action="sondage2.php" method="post">
            <h3>Bienvenue</h3>
            <div class="custom-radio">
                <p>1. Quel est votre sexe ?*</p>
                <input type="radio" id="color-option1" name="sexe" value="Féminin" required>
                <label for="color-option1">Féminin</label>
                <input type="radio" id="color-option2" name="sexe" value="Masculin" required>
                <label for="color-option2">Masculin</label>
            </div>


            <div class="custom-radio">
                <p>2. Quel est votre trance d'âge ?*</p>
                <input type="radio" id="age-option1" name="age" value="Moins de 18 ans" required>
                <label for="age-option1">Moins de 18 ans</label>
                <input type="radio" id="age-option2" name="age" value="18-25 ans" required>
                <label for="age-option2">18-25 ans</label>
                <input type="radio" id="age-option3" name="age" value="26-35 ans" required>
                <label for="age-option2">26-35 ans</label>
                <input type="radio" id="age-option4" name="age" value="36-45 ans" required>
                <label for="age-option2">36-45 ans</label>
                <input type="radio" id="age-option5" name="age" value="46-55 ans"required>
                <label for="age-option2">46-55 ans</label>
                <input type="radio" id="age-option6" name="age" value="56-65 ans" required>
                <label for="age-option2">56-65 ans</label>
                <input type="radio" id="age-option7" name="age" value="66-75 ans" required>
                <label for="age-option2">66-75 ans</label>
                <input type="radio" id="age-option8" name="age" value="Plus de 75 ans" required>
                <label for="age-option2">Plus de 75 ans</label>
            </div>

            <a href="#" class="custom-button previous">Précédent</a>
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
    var sexChecked = document.querySelector('input[name="sexe"]:checked'); // Changer 'color' en 'sexe'
    
    if (!sexChecked) {
        // Afficher le message d'avertissement dans la boîte
        document.getElementById('message').style.display = 'block';
        event.preventDefault(); // Empêchser le comportement par défaut du formulaire
    } 
});
    </script>
    

</body>
</html>