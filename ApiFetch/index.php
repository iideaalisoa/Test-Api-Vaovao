
  <?php
    header('Content-Type: application/json');


    try {
      $pdo = new PDO('mysql:host=localhost;port=3306;dbname=api', 'root', '');
      $retour["succes"]= true;
      $retour["message"] = "Connexion à la base de donnees reussie";
    }catch (Exception $e){
      $retour["succes"]= false;
      $retour["message"] = "Connexion à la base de donnees impossible";
    }

    $requete =$pdo->prepare("SELECT * FROM `login` ");
    $requete->execute();
    $resultats =$requete->fetchAll();

    $retour["succes"]= true;
    $retour["message"] = "La table login:";
    $retour["results"]["nbr"] = count($resultats);
    $retour["results"]["login"] = $resultats;
    echo json_encode($retour);
?>