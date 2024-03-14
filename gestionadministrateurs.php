<?php
session_start();

include_once("mysql_connexion.php");

if (!isset($_SESSION['identifiant'])) {
    header("Location: seconnecter.php");
    exit();
}

$identifiant = $_SESSION['identifiant'];

// Récupérer les informations de l'administrateur connecté depuis la base de données
$sql = "SELECT * FROM administrateurs WHERE identifiant = :identifiant";
$stmt = $mysqlClient->prepare($sql);
$stmt->bindParam(':identifiant', $identifiant);
$stmt->execute();
$adminInfo = $stmt->fetch();

$poste = $adminInfo['poste'];
$photoProfil = $adminInfo['photo_profil'];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données soumises par le formulaire
    $nouvelIdentifiant = $_POST['nouvelIdentifiant'];
    $nouveauPoste = $_POST['nouveauPoste'];
    $nouvellePhotoProfil = $_POST['nouvellePhotoProfil'];
    $nouveauMotDePasse = $_POST['nouveauMotDePasse'];

    // Préparer et exécuter la requête SQL pour insérer les données dans la table administrateurs
    $sqlInsert = "INSERT INTO administrateurs (identifiant, poste, photo_profil, mot_de_passe) VALUES (:identifiant, :poste, :photoProfil, :motDePasse)";
    $stmtInsert = $mysqlClient->prepare($sqlInsert);
    $stmtInsert->bindParam(':identifiant', $nouvelIdentifiant);
    $stmtInsert->bindParam(':poste', $nouveauPoste);
    $stmtInsert->bindParam(':photoProfil', $nouvellePhotoProfil);
    $stmtInsert->bindParam(':motDePasse', $nouveauMotDePasse);

    if ($stmtInsert->execute()) {
        echo "Nouvel administrateur ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'administrateur: " . $stmtInsert->error;
    }
}
?>


<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="cssgestionadministrateurs.css">
    <link rel="icon" type="image/png" href="IMG-20240123-WA0094.png.jpg">
</head>


<body>
    <div class="dashbord-container">

        <div class="main-sidebar">
             <div class="aside-header">
               <div class="brand"> 
                <img src="IMG-20240123-WA0094.png.jpg" alt="" class="logo">
                <h3>SurveyCamp</h3> 
                </div>
              </div>

          <div class="sidebar">
            
            <ul class="list-items">
              <li class="item">
                <a href="admin.php" class="active">
                  <span class="material-icons-sharp"></span>
                  <span> <strong>Tableau de Bord</strong></span>
                </a>
              </li>
              <li class="item">
                <a href="index.php">
                  <span class="material-icons-sharp"></span>
                  <span>Accueil</span>
                </a>
              </li>
              <li class="item">
                <a href="sondage1.php">
                  <span class="material-icons-sharp"></span>
                  <span>Sondage</span>
                </a>
              </li>
              <li class="item gestion">
                <a href="gestionadministrateurs.php">
                  <span class="material-icons-sharp"></span>
                  <span>Gestion des administrateurs </span>
                </a>
              </li>
              <li class="item">
                <a href="gestionformulaire.php">
                  <span class="material-icons-sharp"></span>
                  <span>Gestion du Formulaire</span>
                </a>
              </li>
              <li class="item disconnect">
                <a href="index.php" class="gestion">
                  <span class="material-icons-sharp"></span>
                  <span>Se Déconnecter</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="main-container">
          <div class="title"><strong>Gestion des Administrateurs</strong></div>
          <h1>Liste des Administrateurs</h1>

          <div class="inside">
    <div class="entete">
        <div class="entete-search">
            <label for="search"> <strong>Nom/ID:</strong></label>
            <input type="text" id="search" name="search" placeholder="Saisir le nom ou l'ID">
            <a href="#" class="search-btn" onclick="searchAdmins()"><strong>Rechercher</strong></a>
        </div>
    </div>
</div>

<section class="recent-orders">
  <div class="ro-title">
    <h2 class="recent-orders-title">Administrateurs</h2>
  </div>

  <div class="recent-update" id="adminList">
    <h2>Liste des administrateurs</h2>
    <?php
    // Sélectionner les données des colonnes identifiant et poste de la table administrateurs
    $sql = "SELECT identifiant, poste FROM administrateurs";
    $stmt = $mysqlClient->query($sql);

    // Vérifier s'il y a des résultats
    if ($stmt->rowCount() > 0) {
        echo '<table>';
        echo '<tr><th>#</th><th>Identifiant</th><th>Poste</th></tr>';
        $count = 1;
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>' . $count . '</td>';
            echo '<td>' . $row['identifiant'] . '</td>';
            echo '<td>' . $row['poste'] . '</td>';
            echo '</tr>';
            $count++;
        }
        echo '</table>';
    } else {
        echo 'Aucun administrateur trouvé.';
    }
    ?>
</div>

</section>
        </div>

        <div class="extrabar">
        <header>
    <div class="extrabar">
        <header class="header-right">
            <div class="profile">
                <div class="profile-info">
                <p> <strong><?php echo $identifiant; ?></strong></p>    
                <p><?php echo $poste; ?></p>
                </div>
            </div>
        </header>
    </div>
</header>
<form method="post">
                <h3>Ajouter nouvel Administrateur</h3>
                <div class="nom">
                    <label for="nouvelIdentifiant"> <strong>Identifiant:</strong></label>
                    <input type="text" id="nouvelIdentifiant" name="nouvelIdentifiant" placeholder="Saisir l'identifiant">
                </div>
                <div class="nom">
                    <label for="nouveauPoste"> <strong>Poste:</strong></label>
                    <input type="text" id="nouveauPoste" name="nouveauPoste" placeholder="Saisir le poste ">
                </div>
                <div class="nom">
                    <label for="nouvellePhotoProfil"> <strong>Photo:</strong></label>
                    <input type="text" id="nouvellePhotoProfil" name="nouvellePhotoProfil" placeholder="Mettez le lien de la photo ">
                </div>
                <div class="nom">  
                    <label for="nouveauMotDePasse"> <strong>Mot de passe:</strong></label>
                    <input type="password" id="nouveauMotDePasse" name="nouveauMotDePasse" placeholder="Saisir le Mot De Passe ">
                </div>
                <button type="submit" class="creer"><strong>Créer</strong></button>
            </form>


        </div>
  </div>

  <script>
    function searchAdmins() {
        // Récupérer la valeur saisie dans l'input
        var searchValue = document.getElementById('search').value.toLowerCase();
        // Récupérer la liste des administrateurs
        var admins = document.getElementById('adminList').getElementsByTagName('tr');

        // Parcourir les administrateurs
        for (var i = 1; i < admins.length; i++) { // Commencer à 1 pour éviter l'en-tête de tableau
            var adminName = admins[i].getElementsByTagName('td')[1].innerText.toLowerCase();
            var adminPost = admins[i].getElementsByTagName('td')[2].innerText.toLowerCase();

            // Vérifier si le nom ou l'identifiant correspond à la valeur de recherche
            if (adminName.includes(searchValue) || adminPost.includes(searchValue)) {
                admins[i].style.display = ""; // Afficher l'administrateur correspondant
            } else {
                admins[i].style.display = "none"; // Masquer les administrateurs qui ne correspondent pas
            }
        }
    }
</script>
  
 <script src="style.js"></script>
  
</body>
</html>