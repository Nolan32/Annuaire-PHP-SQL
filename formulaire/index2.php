<?php
  // connection a la base de donnée
try {
  $bdd = new
  PDO('mysql:hsotname=localhost;dbname=Annuaire;charset=utf8','nolan','adminannu');
} catch (Exception $e) {
  die('Erreur: ' .$e->getMessage());
}
  // recuperation des données envoyé par le formulaire
$Contact = array(
  'LastName' => $_POST['LastName'],
  'FirstName' => $_POST['FirstName'],
  'Company' => $_POST['Company'],
  'Address' => $_POST['Address'],
  'Birthdate' => $_POST['Birthdate'],
  'CellPhone' => $_POST['CellPhone'],
);
  // récuperation des groupes selectionné
$relation = array(
  'group1' =>$_POST['Famille'],
  'group2' =>$_POST['Boulot'],
);
  // condition pour verifier qu'elle groupe son cocher pour envoyer les requete d'enregistrement
          // La première sera pour les deux groupe cocher
if($relation['group1'] ==='1' && $relation['group2'] ==='2'){
      // enregistrement sur la table contact
  $req = $bdd->prepare('INSERT INTO Contact(Nom,Prenom,Entreprise,birthday,adresse,NumTel)VALUES(:LastName, :FirstName, :Company, :Birthdate, :Address, :CellPhone)');
  $req->execute($Contact);
  $LastID=$bdd->lastinsertId();
      // enregistrement sur la table appartenir pour le groupe1
  $req = $bdd->prepare('INSERT INTO appartenir(fk_contact,fk_groupe)VALUES(:id, :group1)');
  $req->execute(array(
  'id' => $LastID,
  'group1' =>$relation['group1'],
  ));
      // enregistrement sur la table appartenir pour le groupe2
   $req = $bdd->prepare('INSERT INTO appartenir(fk_contact,fk_groupe)VALUES(:id, :group2)');
   $req->execute(array(
  'id' => $LastID,
  'group2' => $relation['group2']
   ));
          // deuxieme pour si juste la deuxieme checkbox est cocher
}elseif($relation['group2']==='2'){
  $req = $bdd->prepare('INSERT INTO Contact(Nom,Prenom,Entreprise,birthday,adresse,NumTel)VALUES(:LastName, :FirstName, :Company, :Birthdate, :Address, :CellPhone)');
  $req->execute($Contact);
  $LastID=$bdd->lastinsertId();
  $req=$bdd->prepare('INSERT INTO appartenir(fk_contact,fk_groupe)VALUES(:id, :group2)');
  $req->execute(array(
    'id' =>$LastID,
    'group2' =>$relation['group2'],
  ));
        // troisieme pour si juste la premiere checkbox est cocher
}elseif ($relation['group1']==='1') {
  $req = $bdd->prepare('INSERT INTO Contact(Nom,Prenom,Entreprise,birthday,adresse,NumTel)VALUES(:LastName, :FirstName, :Company, :Birthdate, :Address, :CellPhone)');
  $req->execute($Contact);
  $LastID=$bdd->lastinsertId();
  $req=$bdd->prepare('INSERT INTO appartenir(fk_contact,fk_groupe)VALUES(:id, :group1)');
  $req->execute(array(
    'id' =>$LastID,
    'group1' =>$relation['group1'],
  ));
    // si aucune checkbox est cocher renvoie un message d'erreur
}else{
  echo 'ko';
}

 ?>
