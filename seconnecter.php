<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("mysql_connexion.php");

    $identifiant = $_POST['username'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if (!empty($identifiant) && !empty($mot_de_passe)) {
        $sql = "SELECT * FROM administrateurs WHERE identifiant = :identifiant AND mot_de_passe = :mot_de_passe";
        $stmt = $mysqlClient->prepare($sql);
        $stmt->bindParam(':identifiant', $identifiant);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $_SESSION['identifiant'] = $identifiant;
            header("Location: admin.php");
            exit();
        } else {
            $message = "Identifiant non reconnu. Veuillez réessayer.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="cssseconnecter.css">
    <link rel="icon" type="image/png" href="IMG-20240123-WA0094.png.jpg">
</head>
<body>

<header>
    <nav>
        <a href=""> <img src="IMG-20240123-WA0094.png.jpg" alt="" class="logo"></a>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="sondage1.php">Sondage</a></li>
            <li><a href="seconnecter.php">Connexion</a></li>
            <li><a href="processuselectoral.php">Processus </a></li>
        </ul>
        <img src="IMG-20240123-WA0097.png.jpg" alt="" class="menu-icon">
    </nav>
</header>

<h1>Connectez-vous à votre compte...</h1>

<div class="container">
    <!-- Formulaire -->
    <form id="connexion-form" method="post" action="">
        <h3>Se Connecter</h3>
        <input type="text" name="username" placeholder="Identifiant" required><br>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
        <button type="submit" id="submit-button" class="custom-button next">Connexion</button><br>
        <p><a href="">Mot de passe oublié?</a> <a href="">cliquer ici</a><br>
        <a href="">Se connecter avec : <img src="face book.png" alt=""><img src="instagram.png" alt=""> <img src="gmail.png" alt="">  <img src="tiktok.png" alt=""> </p></a><p>
    </form>

    <!-- Ombres -->
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
</div>

<!-- Message d'erreur -->
<p id="error-message"><?php echo $message; ?></p>

<script>
document.getElementById("submit-button").addEventListener("click", function(event) {
    var errorMessage = document.getElementById("error-message");
    errorMessage.innerText = "";
    
    var identifiant = document.querySelector('input[name="username"]').value;
    var motDePasse = document.querySelector('input[name="mot_de_passe"]').value;
    
    // Vérifier si les champs sont vides
    if (identifiant.trim() === "" || motDePasse.trim() === "") {
        errorMessage.innerText = "Veuillez remplir tous les champs.";
        event.preventDefault(); // Empêcher l'envoi du formulaire
    }
});
</script>

</body>
</html>