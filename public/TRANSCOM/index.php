<?php
session_start();
include('connexion.php');
$id;

//declaration pour la session

if(isset($_POST['submit'])){
$nom_ut=htmlspecialchars($_POST['nom_ut']);
$mdp_ut=htmlspecialchars($_POST['mdp_ut']);

$req="SELECT * FROM utilisateur WHERE nom_ut='".$nom_ut."' AND mdp_ut='".$mdp_ut."' AND act_desact=1 AND role='operateur' limit 1";

$res=mysqli_query($conn,$req);

if(mysqli_num_rows($res)>=1){
$_SESSION['nom_ut'] =htmlentities ($_POST['nom_ut']);

header('location: dashboard_operateur.php');
}

elseif(mysqli_num_rows($res)!==1) {

 $req="SELECT * FROM utilisateur WHERE nom_ut='".$nom_ut."' AND mdp_ut='".$mdp_ut."' AND act_desact=1 AND role='roullage' limit 1";

$res=mysqli_query($conn,$req);
 
$_SESSION['nom_ut'] =htmlentities ($_POST['nom_ut']);
header('location:dashboard_roullage.php'); 
}

}

?>

<!doctype html>
<html lang="en">
  <head>

  </head>
  <body>

              <h2 class="mb-4">Connectez-vous</h2>
              <form method="POST" action="" >
               
                    <label for="name">Nom d'utilisateur</label>
                    <input type="text" id="nom_ut" name="nom_ut" class="form-control py-2">
           
                    <label for="name">Mot de passe</label>
                    <input type="password" name="mdp_ut" id="mdp_ut" class="form-control py-2">
                 
                    <input type="submit" value="Connexion" name="submit" class="btn btn-primary px-5 py-2">
               
    <br>          
<a href="saisie_utilisateur.php">creation compte</a>               

 <?php
 //include('footer.php');
 ?>
  </body>
</html>