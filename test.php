<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" /></head>
    <body>
        <h2>Voici la liste des jeux de Patrick</h2>
            <?php
// créer variable "bdd" contenant le 'lien' de celle-ci (chemin d'accès, nomdelabd, gestion des accents, utilisateur, mdp)
try
{
  $bdd = new PDO('mysql:host=localhost; dbname=test; charset=utf8', 'root', 'ecodair');
// créer variable "reponse" contenant la requete souhaitée
$reponse = $bdd->query('SELECT * FROM jeux_video WHERE possesseur= \'Patrick\' AND console= \'PS2\'');

  // boucle qui permet d'afficher la requete tant qu'il y a des données
  while ($donnees = $reponse->fetch())
{
  //On inscrit le texte souhaité en ajoutant "echo" pour afficher le ou les champs que l'on souhaiterait voir.
  ?>
  <p>Il possède la <?php echo $donnees['console']; ?> avec le jeu <?php echo $donnees['nom']; ?> <br /></p>
  //echo "<p>".$donnees ['prix']." ".$donnees['commentaires']"</p>"
  <?php
  }

// la fonction "closeCursor()" permet de terminer le travail de la requete
$reponse->closeCursor();

}
catch (Exception $e)
{
        die('EUne erreur est survenue : ' . $e->getMessage());
}
?>
</html>
