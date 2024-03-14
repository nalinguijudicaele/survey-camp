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


?>


<!DOCTYPE html>
<html >
<head>
    <title>SurveyCamp</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
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
                <a href="formulaire.php">
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
              <li class="item">
                <a href="gestionadministrateurs.php">
                  <span class="material-icons-sharp"></span>
                  <span>Gestion des administrateurs </span>
                </a>
              </li>
              <li class="item">
                <a href="gestionformulaire.php">
                  <span class="material-icons-sharp"></span>
                  <span>Gestion du Formulaire </span>
                </a>
              </li>
              <li class="item disconnect">
                <a href="formulaire.php">
                  <span class="material-icons-sharp"></span>
                  <span>Se Déconnecter</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="main-container">
          <div class="title"> <strong>Tableau de Bord</strong></div>

          <div class="inside">


          <div class="carre">
    <div class="card-container">
        <div class="card-header">
            <span class="material-icons-sharp"></span>
        </div>
        <div class="card-body">
            <div class="card-info">
                <h3>Tendance Générale</h3>
                <?php
                // Calcul du pourcentage de 'oui' dans la colonne 'participation' pour les femmes
                $sqlOuiFeminin = "SELECT COUNT(*) as oui_feminin FROM enquete WHERE participation = 'oui' AND sexe = 'feminin'";
                $stmtOuiFeminin = $mysqlClient->query($sqlOuiFeminin);
                $ouiFeminin = $stmtOuiFeminin->fetch()['oui_feminin'];
                
                // Calcul du pourcentage de 'oui' dans la colonne 'participation' pour les hommes
                $sqlOuiMasculin = "SELECT COUNT(*) as oui_masculin FROM enquete WHERE participation = 'oui' AND sexe = 'masculin'";
                $stmtOuiMasculin = $mysqlClient->query($sqlOuiMasculin);
                $ouiMasculin = $stmtOuiMasculin->fetch()['oui_masculin'];

                // Calcul du total des réponses dans la colonne 'participation' pour les femmes
                $sqlTotalFeminin = "SELECT COUNT(*) as total_feminin FROM enquete WHERE sexe = 'feminin'";
                $stmtTotalFeminin = $mysqlClient->query($sqlTotalFeminin);
                $totalFeminin = $stmtTotalFeminin->fetch()['total_feminin'];

                // Calcul du total des réponses dans la colonne 'participation' pour les hommes
                $sqlTotalMasculin = "SELECT COUNT(*) as total_masculin FROM enquete WHERE sexe = 'masculin'";
                $stmtTotalMasculin = $mysqlClient->query($sqlTotalMasculin);
                $totalMasculin = $stmtTotalMasculin->fetch()['total_masculin'];

                // Calcul du total des réponses dans la colonne 'participation'
                $total = $totalFeminin + $totalMasculin;

                // Calcul du pourcentage total de 'oui' en fonction du sexe
                $pourcentageTotal = (($ouiFeminin + $ouiMasculin) / $total) * 100;
                ?>
                <h1><?= round($pourcentageTotal) ?>%</h1>
            </div>
            <div class="card-progress">
                <svg width="96" height="96" class="bg-blue">
                    <?php
                    // Calcul de l'angle d'ouverture pour le remplissage du cercle
                    $angle = ($pourcentageTotal / 100) * 360;
                    ?>
                    <path d="M48,48 L48,12 A36,36 0 <?= $pourcentageTotal > 50 ? 1 : 0 ?>,1 <?= cos(deg2rad($angle - 90)) * 36 + 48 ?>,<?= sin(deg2rad($angle - 90)) * 36 + 48 ?> Z" fill="#ffcc00"></path>
                </svg>
            </div>
        </div>
        <div class="card-footer">
            <small>Sur les 48H précédentes</small>
        </div>
    </div>
</div>



<?php
// Calcul du pourcentage de 'oui' dans la colonne 'participation' pour les femmes
$sqlOuiFeminin = "SELECT COUNT(*) as oui_feminin FROM enquete WHERE participation = 'oui' AND sexe = 'feminin'";
$stmtOuiFeminin = $mysqlClient->query($sqlOuiFeminin);
$ouiFeminin = $stmtOuiFeminin->fetch()['oui_feminin'];

// Calcul du total des réponses dans la colonne 'participation' pour les femmes
$sqlTotalFeminin = "SELECT COUNT(*) as total_feminin FROM enquete WHERE sexe = 'feminin'";
$stmtTotalFeminin = $mysqlClient->query($sqlTotalFeminin);
$totalFeminin = $stmtTotalFeminin->fetch()['total_feminin'];

// Calcul du total des réponses dans la colonne 'participation' pour les hommes
$sqlTotalMasculin = "SELECT COUNT(*) as total_masculin FROM enquete WHERE sexe = 'masculin'";
$stmtTotalMasculin = $mysqlClient->query($sqlTotalMasculin);
$totalMasculin = $stmtTotalMasculin->fetch()['total_masculin'];

// Calcul du total des réponses dans la colonne 'participation'
$total = $totalFeminin + $totalMasculin;

// Calcul du pourcentage total de 'oui' en fonction des femmes uniquement
$pourcentageTotal = ($ouiFeminin / $total) * 100;

// Définition de la couleur en fonction du pourcentage
if ($pourcentageTotal <= 50) {
    $color = "#ff69b4"; // Rose fuchsia
} else {
    $color = "#4169e1"; // Bleu indigo
}
?>
<div class="carre">
    <div class="card-container">
        <div class="card-header">
            <span class="material-icons-sharp"></span>
        </div>
        <div class="card-body">
            <div class="card-info">
                <h3>Répartition par Sexe:</h3>
                <h3>Féminin</h3>
                <h1><?= round($pourcentageTotal) ?>%</h1>
            </div>
            <div class="card-progress">
                <svg width="96" height="96" class="bg-blue">
                    <?php
                    // Calcul de l'angle d'ouverture pour le remplissage du cercle
                    $angle = ($pourcentageTotal / 100) * 360;
                    ?>
                    <path d="M48,48 L48,12 A36,36 0 <?= $pourcentageTotal > 50 ? 1 : 0 ?>,1 <?= cos(deg2rad($angle - 90)) * 36 + 48 ?>,<?= sin(deg2rad($angle - 90)) * 36 + 48 ?> Z" fill="<?= $color ?>"></path>
                </svg>
            </div>
        </div>
    </div>
</div>


       

<?php
// Calcul du pourcentage de 'oui' dans la colonne 'participation' pour les hommes
$sqlOuiMasculin = "SELECT COUNT(*) as oui_masculin FROM enquete WHERE participation = 'oui' AND sexe = 'masculin'";
$stmtOuiMasculin = $mysqlClient->query($sqlOuiMasculin);
$ouiMasculin = $stmtOuiMasculin->fetch()['oui_masculin'];

// Calcul du total des réponses dans la colonne 'participation' pour les hommes
$sqlTotalMasculin = "SELECT COUNT(*) as total_masculin FROM enquete WHERE sexe = 'masculin'";
$stmtTotalMasculin = $mysqlClient->query($sqlTotalMasculin);
$totalMasculin = $stmtTotalMasculin->fetch()['total_masculin'];

// Calcul du pourcentage total de 'oui' en fonction des hommes uniquement
$pourcentageTotalMasculin = ($ouiMasculin / $total) * 100;

// Définition des couleurs en fonction du pourcentage
if ($pourcentageTotalMasculin <= 50) {
    $color = "#8a2be2"; // Violet tirant vers l'indigo
} else {
    $color = "#4169e1"; // Bleu indigo
}
?>
<div class="carre">
    <div class="card-container">
        <div class="card-header">
            <span class="material-icons-sharp"></span>
        </div>
        <div class="card-body">
            <div class="card-info">
                <h3>Répartition par Sexe:</h3>
                <h3>Masculin</h3>
                <h1><?= round($pourcentageTotalMasculin) ?>%</h1>
            </div>
            <div class="card-progress">
                <svg width="96" height="96" class="bg-blue">
                    <?php
                    // Calcul de l'angle d'ouverture pour le remplissage du cercle
                    $angle = ($pourcentageTotalMasculin / 100) * 360;
                    ?>
                    <path d="M48,48 L48,12 A36,36 0 <?= $pourcentageTotalMasculin > 50 ? 1 : 0 ?>,1 <?= cos(deg2rad($angle - 90)) * 36 + 48 ?>,<?= sin(deg2rad($angle - 90)) * 36 + 48 ?> Z" fill="<?= $color ?>"></path>
                </svg>
            </div>
        </div>
        
    </div>
</div>


          </div>

          <section class="recent-orders">
  <div class="ro-title">
    <h2 class="recent-orders-title" style="text-align: center;">Motivations récentes</h2>
    <a href="#" class="show all">Tout afficher</a>
  </div>

  <div class="recent-update">
    <h2 style="text-align: center;">Motivations des utilisateurs</h2>
    <?php
    // Sélectionner les données de la table enquete
    $sql = "SELECT motivation FROM enquete";
    $stmt = $mysqlClient->query($sql);

    // Vérifier s'il y a des résultats
    if ($stmt->rowCount() > 0) {
        echo '<ul>';
        $count = 1;
        while ($row = $stmt->fetch()) {
            echo '<div class="message" style="text-align: left;">';
            echo '<p>' . $count . '. ' . $row['motivation'] . '</p>';
            echo '</div>';
            $count++;
        }
        echo '</ul>';
    } else {
        echo 'Aucune motivation trouvée.';
    }
    ?>
  </div>
</section>
        </div>
        <header>
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

        <div class="recent-update">
    <h2 style="text-align: center;">Suggestions sur l'organisation</h2>
    <?php
    // Sélectionner les données de la table enquete
    $sql = "SELECT suggestion FROM enquete";
    $stmt = $mysqlClient->query($sql);

    // Vérifier s'il y a des résultats
    if ($stmt->rowCount() > 0) {
        echo '<ul>';
        $count = 1;
        while ($row = $stmt->fetch()) {
            echo '<div class="message" style="text-align: left;">';
            echo '<p>' . $count . '. ' . $row['suggestion'] . '</p>';
            echo '</div>';
            $count++;
        }
        echo '</ul>';
    } else {
        echo 'Aucune suggestion trouvée.';
    }
    ?>
</div>

        
<div class="recent-update">
    <h2>News letters</h2>
    <?php
    // Récupérer toutes les adresses email de la table newsletters avec les ID par ordre d'inscription
    $sql = "SELECT id, emailOrPhone FROM newsletters ORDER BY id";
    $stmt = $mysqlClient->query($sql);

    // Vérifier s'il y a des résultats
    if ($stmt->rowCount() > 0) {
        echo '<div class="message">';
        // Afficher chaque adresse email avec son ID
        while ($row = $stmt->fetch()) {
            echo '<p><strong>ID : </strong>' . $row['id'] . ' - <strong>Email : </strong>' . $row['emailOrPhone'] . '</p>';
        }
        echo '</div>';
    } else {
        echo 'Aucune adresse email trouvée.';
    }
    ?>
</div>

        </div>
  </div>

 <script src="style.js"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updatePercentage() {
        var region = $('#regionSelect').val();

        // Faire une requête AJAX pour récupérer le pourcentage basé sur la région sélectionnée
        $.ajax({
            url: 'calculer_pourcentage.php',
            type: 'GET',
            dataType: 'json',
            data: {
                region: region
            },
            success: function(response) {
                // Mettre à jour l'affichage du pourcentage
                $('#percentage').text(response.pourcentage + '%');

                // Mettre à jour la couleur du cercle de progression en fonction du pourcentage
                var pourcentage = response.pourcentage;
                var angle = (pourcentage / 100) * 360;
                var circle = $('#circle');
                circle.css('stroke', '#ff69b4'); // Couleur rose fuchsia
                circle.css('strokeDasharray', angle + ' 360'); // Définir la longueur du segment de progression
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du pourcentage:', error);
            }
        });
    }

    // Appeler la fonction updatePercentage lors du chargement de la page pour initialiser le pourcentage
    $(document).ready(function() {
        updatePercentage();
    });
</script>
  
</body>
</html>