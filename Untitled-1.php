// Ecriture de la requête
$sqlQuery = 'INSERT INTO election VALUES (:sexe, :age, :niveauetude, :region, :participationelection, :partipolitique, :voterprochaineelection, :motivationchoixvote, :suggestionorganisation, :receptioninfo)';

// Préparation
$insertRecipe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
$insertRecipe->execute([
    'sexe' => $_SESSION['sexe'],
    'age' => $_SESSION['age'],
    'niveauetude' => $_SESSION['color'],
    'region '=>$_SESSION['region'],
    'participationelection' => $_SESSION['election'],
    'partipolitique' => $_SESSION['membre'],
    'voterprochaineelection' => $_SESSION['election1'],
    'motivationchoixvote' => $_SESSION['motivation'],
    'suggestionorganisation' => $_SESSION['suggestion'],
    'receptioninfo' => $_SESSION['information'],
]);