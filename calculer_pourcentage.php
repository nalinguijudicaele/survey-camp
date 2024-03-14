<?php
include_once("mysql_connexion.php");

// Vérifier si le paramètre de région est défini
if(isset($_GET['region'])) {
    // Récupérer la région sélectionnée depuis la requête GET
    $region = $_GET['region'];

    // Fonction pour récupérer le pourcentage en fonction de la région sélectionnée
    function getPercentageByRegion($region, $mysqlClient) {
        // Calcul du nombre de 'oui' dans la colonne 'participation' pour la région sélectionnée
        $sqlOui = "SELECT COUNT(*) as oui FROM enquete WHERE region_origine = :region AND participation = 'oui'";
        $stmtOui = $mysqlClient->prepare($sqlOui);
        $stmtOui->bindParam(':region', $region);
        $stmtOui->execute();
        $oui = $stmtOui->fetch()['oui'];

        // Calcul du nombre de 'non' dans la colonne 'participation' pour la région sélectionnée
        $sqlNon = "SELECT COUNT(*) as non FROM enquete WHERE region_origine = :region AND participation = 'non'";
        $stmtNon = $mysqlClient->prepare($sqlNon);
        $stmtNon->bindParam(':region', $region);
        $stmtNon->execute();
        $non = $stmtNon->fetch()['non'];

        // Calcul du nombre total de réponses dans la colonne 'participation' pour la région sélectionnée
        $total = $oui + $non;

        if ($total > 0) {
            $pourcentage = ($oui / $total) * 100;
        } else {
            $pourcentage = 0;
        }

        return round($pourcentage, 2);
    }

    // Appeler la fonction pour récupérer le pourcentage
    $pourcentage = getPercentageByRegion($region, $mysqlClient);

    // Retourner le pourcentage au format JSON
    echo json_encode(['pourcentage' => $pourcentage]);
} else {
    // Si le paramètre de région n'est pas défini, retourner une erreur
    echo json_encode(['error' => 'Paramètre de région non défini']);
}
?>








<div class="carre">
        <div class="card-container">
            <div class="card-header">
                <span class="material-icons-sharp"></span>
            </div>
            <div class="card-body">
                <div class="card-info">
                    <h3>Répartition par Sexe</h3>
                    <h5>
                        <select id="regionSelect" onchange="updatePercentage()">
                            <option value="Adamaoua">feminin</option>
                            <option value="Est">masculin</option>
                        </select>
                    </h5>
                </div>
                <?php
                // Calcul du pourcentage de 'oui'  dans la colonne 'participation' 
                $sqlOui = "SELECT COUNT(*) as oui FROM enquete WHERE participation = 'oui'";
                $stmtOui = $mysqlClient->query($sqlOui);
                $oui = $stmtOui->fetch()['oui'];

                 // Calcul du nombre de 'non' dans la colonne 'participation'
                 $sqlNon = "SELECT COUNT(*) as non FROM enquete WHERE participation = 'non'";
                 $stmtNon = $mysqlClient->query($sqlNon);
                 $non = $stmtNon->fetch()['non'];

                // Calcul du pourcentage de 'oui'  dans la colonne 'participation' correspondant a 'femme' dans la colonne sexe
                $sqlOui = "SELECT COUNT(*) as oui FROM enquete WHERE participation = 'oui' and sexe = 'femme'";
                $stmtOui = $mysqlClient->query($sqlOui);
                $oui = $stmtOui->fetch()['oui'];
                
                // Calcul du pourcentage de 'oui'  dans la colonne 'participation' correspondant a 'homme' dans la colonne sexe
                $sqlOui = "SELECT COUNT(*) as oui FROM enquete WHERE participation = 'oui' and sexe = 'homme'" ;
                $stmtOui = $mysqlClient->query($sqlOui);
                $oui = $stmtOui->fetch()['oui'];
               

                // Calcul du total des réponses dans la colonne 'participation'
                $total = $oui + $non;
                // Calcul du pourcentage
                $pourcentage = ($oui / $total) * 100;
                ?>
                <h1><?= round($pourcentage) ?>%</h1>
            </div>
            <div class="card-progress">
                <svg width="96" height="96" class="bg-blue">
                    <?php
                    // Calcul de l'angle d'ouverture pour le remplissage du cercle
                    $angle = ($pourcentage / 100) * 360;
                    ?>
                    <path d="M48,48 L48,12 A36,36 0 <?= $pourcentage > 50 ? 1 : 0 ?>,1 <?= cos(deg2rad($angle - 90)) * 36 + 48 ?>,<?= sin(deg2rad($angle - 90)) * 36 + 48 ?> Z" fill="#ffcc00"></path>
                </svg>
            </div>
            </div>
        </div>
    </div>