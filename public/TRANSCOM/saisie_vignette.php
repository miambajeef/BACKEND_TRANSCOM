<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$scan_vignette=$_FILES['scan_vignette'] ['name'];
$file_tmp_name=$_FILES['scan_vignette'] ['tmp_name'];

move_uploaded_file($file_tmp_name,"./imgs/$scan_vignette");

$reff_vignette=$_POST['reff_vignette'];
$date_livraison_vignette=$_POST['date_livraison_vignette'];
$date_expiration_vignette=$_POST['date_expiration_vignette'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO vignette (reff_vignette,date_livraison_vignette,date_expiration_vignette,scan_vignette,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$reff_vignette','$date_livraison_vignette','$date_expiration_vignette','$scan_vignette','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}


?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

    <?php 
  include ('menu_mt.php');
  ?><br>
</head>
<body>
 <a href="deconnexion.php">Deconnexion</a><br>

<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
  REFFERENCE VIGNETTE: <input type="text" name="reff_vignette"><br>
  DATE DE LIVRAISON VIGNETTE: <input type="date" name="date_livraison_vignette"><br>
  DATE D'EXPIRATION VIGNETTE: <input type="date" name="date_expiration_vignette"><br>
  SCAN VIGNETTE: <input type="file" name="scan_vignette"><br>


<?php
$req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_ut_fk" value="<?php echo ($aff2['id_ut'])?>">
<input class="text" type="hidden" name="nom_ut_fk" value="<?php echo ($aff2['nom_ut'])?>">
                  
<?php }?>

<?php

//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_mt_fk" value="<?php echo ($aff2['id_mt'])?>">
<input class="text" type="hidden" name="num_plaque_mt_fk" value="<?php echo ($aff2['num_plaque_mt'])?>"> 
                  
<?php }?>


  <input type="submit" name="submit" value="Enregistrer">
</form>

       <h2 class="mb-4">APERCU GENERAL TAXE VOIRIE</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM vignette WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_vignette DESC ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    Refference : <?php echo ($aff['reff_vignette'])?><br>
    Date livraison: <?php echo ($aff['date_livraison_vignette'])?><br>
    Date d'expiration: <?php echo ($aff['date_expiration_vignette'])?><br>

      <?php $x=abs(floor(strtotime($aff['date_expiration_vignette'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_vignette'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      echo $x-$z .' Jour(s) de validité'.'<br>'; 
      //echo $z .'<br>'; 
      //echo $rest_jours .'<br>';
      ?>  

     <?php
      if($rest_jours>=0){

        echo $alerte='<strong>'.'<p class="">'."La Vignette reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
         echo $alerte='<strong>'.'<p class="blue" >'."La Vignette a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>


   <hr class="two">
      <?php }?>

</body>
</html>