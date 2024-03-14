<?php session_start();?>
<?php 

$_SESSION['niveau']=$_POST['niveau'];
$_SESSION['region']=$_POST['region'];
?>
<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="csssondage3.css">
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
        <form action="sondage4.php" method="post" >
            
            <div class="custom-radio">
                <p>5. Avez-vous déjà participé à une élection électorale ?*</p>
                <input type="radio" id="color-option1" name="election" value="Oui" required>
                <label for="color-option1">Oui</label>
                <input type="radio" id="color-option2" name="election" value="Non" required>
                <label for="color-option2">Non</label>
            </div>

            <div class="custom-radio">
                <p>6. Êtes-vous membre d'un parti politique?</p>
                <input type="radio" id="age-option1" name="membre" value="Oui">
                <label for="age-option1">Oui</label>
                <input type="radio" id="age-option2" name="membre" value="Non">
                <label for="age-option2">Non</label>
            </div>
           
            <a href="sondage2.php" class="custom-button previous">Précédent</a>
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
    var sexChecked = document.querySelector('input[name="membre"]:checked'); // Changer 'color' en 'sexe'
    
    if (!sexChecked) {
        // Afficher le message d'avertissement dans la boîte
        document.getElementById('message').style.display = 'block';
        event.preventDefault(); // Empêchser le comportement par défaut du formulaire
    } 
});
    </script>
    

</body>
</html>