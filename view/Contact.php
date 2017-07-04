<?php
try {
  $bdd = new
  PDO('mysql:hostname=Localhost;dbname=Annuaire;charset=utf8','nolan','adminannu');
} catch (Exception $e) {
  die('ERREUR : ' .$e->getMessage());
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>RecapContact</title>
  </head>
  <body>
    <h3>Mes Contacts</h3>
    <table>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Entreprise</th>
        <th>Adresse</th>
        <th>Numero de téléphone</th>
        <th>Groupe</th
        <th>Supprimer</th>
        <th>Modifier</th>
      </tr><?php
$response = $bdd->query('SELECT * FROM Contact JOIN appartenir ON Contact.id = appartenir.fk_contact JOIN groupe ON appartenir.fk_groupe = groupe.id');
while ($donnees = $response->fetch()) {
$id = $donnees['fk_contact'];
$nom = $donnees['Nom'];
$prenom = $donnees['Prenom'];
$birthday = $donnees['birthday'];
$Entreprise = $donnees['Entreprise'];
$Adresse = $donnees['Adresse'];
$NumTel = $donnees['NumTel'];
$group1 = $donnees['fk_groupe'];

?>
      <tr>
        <td><?php
          echo $id;

        ?></td>
        <td><?php
          echo $nom;

        ?>
      </td>
      <td><?php
         echo $prenom;
        ?></td>
       <td><?php
        echo $birthday;
        ?></td>
        <td><?php
          echo $Entreprise;
        ?></td>
        <td><?php
          echo $Adresse;

        ?></td>
        <td><?php
          echo $NumTel;
          ?></td>
          <td><?php
          echo $group1,'
          <td><button type="button">Supprimer</button></td>
          <td><button type="button">Modifier</button></td>';
        }
        ?>
        </td>
      </tr>
    </table>
    <h4>Famille :</h4>
    <table>
      <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Entreprise</th>
        <th>Adresse</th>
        <th>Numero de téléphone</th>
        <th>Groupe</th>
        <th>Supprimer</th>
        <th>Modifier</th>
      </tr>
      <tr>
        <?php
        $response = $bdd->query('SELECT * FROM Contact JOIN appartenir ON Contact.id = appartenir.fk_contact JOIN groupe ON appartenir.fk_groupe = groupe.id WHERE groupe.id = 1');
        while ($donnees = $response->fetch()) {
        $id = $donnees['fk_contact'];
        $nom = $donnees['Nom'];
        $prenom = $donnees['Prenom'];
        $birthday = $donnees['birthday'];
        $Entreprise = $donnees['Entreprise'];
        $Adresse = $donnees['Adresse'];
        $NumTel = $donnees['NumTel'];
        $group1 = $donnees['fk_groupe'];
         ?>
      </tr>
      <tr>
        <td><?php
          echo $id;

        ?></td>
        <td><?php
          echo $nom;

        ?>
      </td>
      <td><?php
         echo $prenom;
        ?></td>
       <td><?php
        echo $birthday;
        ?></td>
        <td><?php
          echo $Entreprise;
        ?></td>
        <td><?php
          echo $Adresse;

        ?></td>
        <td><?php
          echo $NumTel;
          ?></td>
          <td><?php
          echo $group1,'
          <td><button type="button">Supprimer</button></td>
          <td><button type="button">Modifier</button></td>';
        }
        ?>
        </td>
      </tr>
    </table>
    <h4>Boulot :</h4>
    <table>
      <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Entreprise</th>
        <th>Adresse</th>
        <th>Numero de téléphone</th>
        <th>Groupe</th>
        <th>Supprimer</th>
        <th>Modifier</th>
      </tr>
      <tr>
        <?php
        $response = $bdd->query('SELECT * FROM Contact JOIN appartenir ON Contact.id = appartenir.fk_contact JOIN groupe ON appartenir.fk_groupe = groupe.id WHERE groupe.id = 2');
        while ($donnees = $response->fetch()) {
        $id = $donnees['fk_contact'];
        $nom = $donnees['Nom'];
        $prenom = $donnees['Prenom'];
        $birthday = $donnees['birthday'];
        $Entreprise = $donnees['Entreprise'];
        $Adresse = $donnees['Adresse'];
        $NumTel = $donnees['NumTel'];
        $group1 = $donnees['fk_groupe'];
         ?>
      </tr>
      <tr>
        <td><?php
          echo $id;

        ?></td>
        <td><?php
          echo $nom;

        ?>
      </td>
      <td><?php
         echo $prenom;
        ?></td>
       <td><?php
        echo $birthday;
        ?></td>
        <td><?php
          echo $Entreprise;
        ?></td>
        <td><?php
          echo $Adresse;

        ?></td>
        <td><?php
          echo $NumTel;
          ?></td>
          <td><?php
          echo $group1,'
          <td><button type="button">Supprimer</button></td>
          <td><button type="button">Modifier</button></td>';
        }
        ?>
        </td>
      </tr>
    </table>










  </body>
</html>
