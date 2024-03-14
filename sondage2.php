<?php session_start();?>
<?php
// je garde les valeurs de sexe choisies et age dans des variables de session pour pouvoir les faire transiter vers la page songae 3
$_SESSION['sexe']=$_POST['sexe'];
$_SESSION['age']=$_POST['age'];


?>
<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="csssondage2.css">
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
        <form action="sondage3.php" method="post">
            
            <div class="custom-radio">
                <p>3. Quel est votre niveau d'étude ?*</p>
                <input type="radio" id="color-option1" name="niveau" value="Certificat d'étude primaire" required>
                <label for="color-option1">Certificat d'étude primaire(CEP)</label>
                <input type="radio" id="color-option2" name="niveau" value="BEPC/CAP" required>
                <label for="color-option2">BEPC/CAP</label>
                <input type="radio" id="color-option3" name="niveau" value="Baccalauréat/B.T." required>
                <label for="color-option3">Baccalauréat/B.T.</label>
                <input type="radio" id="color-option4" name="niveau" value="Bacc + 1" required>
                <label for="color-option4">Bacc + 1</label>
                <input type="radio" id="color-option5" name="niveau" value="Bacc + 2" required>
                <label for="color-option5">Bacc + 2</label>
                <input type="radio" id="color-option6" name="niveau" value="Licence" required>
                <label for="color-option6">Licence</label>
                <input type="radio" id="color-option7" name="niveau" value="Master" required>
                <label for="color-option7">Master</label>
                <input type="radio" id="color-option8" name="niveau" value="Doctorat" required>
                <label for="color-option8">Doctorat</label>
                <input type="radio" id="color-option8" name="niveau" value="Agrégation" required>
                <label for="color-option8">Agrégation</label>
            </div>

            <div class="custom-radio">
                <p>4. Vous êtes originaire de quelle région ?*</p>
                <input type="radio" id="age-option1" name="region" value="Adamaoua" required>
                <label for="age-option1">Adamaoua</label>
                <input type="radio" id="age-option2" name="region" value="Centre" required>
                <label for="age-option2">Centre</label>
                <input type="radio" id="age-option3" name="region" value="Est" required>
                <label for="age-option2">Est</label>
                <input type="radio" id="age-option4" name="region" value="Extrême-Nord" required>
                <label for="age-option2">Extrême-Nord</label>
                <input type="radio" id="age-option5" name="region" value="Littoral" required>
                <label for="age-option2">Littoral</label>
                <input type="radio" id="age-option6" name="region" value="Nord" required>
                <label for="age-option2">Nord</label>
                <input type="radio" id="age-option7" name="region" value="Nord-Ouest" required>
                <label for="age-option2">Nord-Ouest</label>
                <input type="radio" id="age-option8" name="region" value="Ouest" required>
                <label for="age-option2">Ouest</label>
                <input type="radio" id="age-option8" name="region" value="Sud" required>
                <label for="age-option2">Sud</label>
                <input type="radio" id="age-option8" name="region" value="Sud-Ouest" required>
                <label for="age-option2">Sud-Ouest</label>
            </div>
           
            <a href="sondage1.php" class="custom-button previous">Précédent</a>
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
    var sexChecked = document.querySelector('input[name="region"]:checked'); // Changer 'color' en 'sexe'
    
    if (!sexChecked) {
        // Afficher le message d'avertissement dans la boîte
        document.getElementById('message').style.display = 'block';
        event.preventDefault(); // Empêchser le comportement par défaut du formulaire
    } 
});
    </script>
    


</body>
</html>