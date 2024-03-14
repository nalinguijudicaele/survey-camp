<?php session_start(); ?>
<?php

include('mysql_connexion.php');
// Ecriture de la requête
$sqlQuery = 'INSERT INTO enquete (sexe,age,niveau_etude,region_origine,election, membre_parti, participation, motivation, suggestion, info_elec) VALUES (:sexe, :age, :niveau_etude, :region_origine, :election, :membre_parti, :participation, :motivation, :suggestion, :info_elec)';

// Préparation
$insertRecipe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
$insertRecipe->execute([
  'sexe' => $_SESSION['sexe'],
  'age' => $_SESSION['age'],
  'niveau_etude' => $_SESSION['niveau'],
  'region_origine' => $_SESSION['region'],
    'election' => $_SESSION['election'],
    'membre_parti' => $_SESSION['membre'],
    'participation' => $_SESSION['election1'],
    'motivation' => $_SESSION['motivation'],
    'suggestion' => $_POST['suggestion'],
    'info_elec' => $_POST['information']

]);
?>

<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="cssremerciement.css">
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
        <form >

        <p><strong>Nous vous remercions d'avoir pris le temps de participer à notre sondage électoral.</strong></p>
        <p><strong>Vos différents avis nous aideront à améliorer nos programmes pour mieux répondre à vos attentes.</strong></p>
        <p><strong>Vos réponses ont été enregistrées de manière anonyme et confidentielle.</strong></p>
              


          </form>

        <!--ombres-->
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
    </div>

</body>
</html>