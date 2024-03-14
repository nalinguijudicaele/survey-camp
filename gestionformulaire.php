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
    <link rel="stylesheet" type="text/css" href="cssgestionformulaire.css">
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
          <div class="title"><strong>Gestion du Formulaire</strong></div>
          <h1>Liste des Questions</h1>

          <div class="inside">
            
                <div class="entete">
                    <div class="entete-search">
                        <label for="search"> <strong>Numéro de la question:</strong></label>
                        <input type="text" id="search" name="search" placeholder="Saisir le nom ou l'ID">
                        <a href="#" class="search-btn"><strong>Rechercher</strong></a>
                    </div>
                </div>
            
        </div>

<section class="recent-orders">
  <div class="ro-title">
    <h2 class="recent-orders-title">Questions</h2>
  </div>

  <table>
    <thead>
      <tr>
        <th>Numéro</th>
        <th>Question</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>01</td>
        <td>kjzwzxijezoooooeio</td>
      </tr>
      <tr>
        <td>01</td>
        <td>sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssoooeio</td>
      </tr>
    </tbody>
  </table>
</section>
        </div>

        <div class="extrabar">
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

        <form >
          <h2>Ajouter une nouvelle Question</h2>

          <div class="nom">
            <label for="search"> <strong>Numéro:</strong></label>
            <input type="text" id="search" name="search" placeholder="Saisir le Numéro ">
        </div>
        <div class="nom">
          <label for="search"> <strong>Question: </strong></label>
          <input type="text" id="search" name="search" placeholder="Saisir la QUestion ">
      </div>
      <div class="nom">
        <label for="type"><strong>Type de Question:</strong></label>
        <select id="type" name="type">
            <option value="texte">Champ de Texte</option>
            <option value="liste">Liste déroulante</option>
            <option value="unique">Case à cocher</option>
            <option value="multiple">Choix multiple</option>
            <option value="texte">Echelle de notation</option>
            <option value="liste">Boutons Radio</option>
            <option value="texte">Email</option>
            <option value="liste">Date/Heure</option>
        </select>
    </div>
      

<a href="#" class="creer"><strong>Créer</strong></a>

        </form>


        </div>
  </div>


  
 <script src="style.js"></script>
  
</body>
</html>