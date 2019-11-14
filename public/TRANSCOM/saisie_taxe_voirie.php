<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$scan_taxe_voirie=$_FILES['scan_taxe_voirie'] ['name'];
$file_tmp_name=$_FILES['scan_taxe_voirie'] ['tmp_name'];

move_uploaded_file($file_tmp_name,"./imgs/$scan_taxe_voirie");

$reff_taxe_voirie=$_POST['reff_taxe_voirie'];
$date_livraison_taxe_voirie=$_POST['date_livraison_taxe_voirie'];
$date_expiration_taxe_voirie=$_POST['date_expiration_taxe_voirie'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO taxe_voirie (reff_taxe_voirie,date_livraison_taxe_voirie,date_expiration_taxe_voirie,scan_taxe_voirie,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$reff_taxe_voirie','$date_livraison_taxe_voirie','$date_expiration_taxe_voirie','$scan_taxe_voirie','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

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
	REFFERENCE TAXE VOIRIE: <input type="text" name="reff_taxe_voirie"><br>
	DATE DE LIVRAISON TAXE VOIRIE: <input type="date" name="date_livraison_taxe_voirie"><br>
	DATE D'EXPIRATION TAXE VOIRIE: <input type="date" name="date_expiration_taxe_voirie"><br>
  SCAN TAXE VPOIRIE: <input type="file" name="scan_taxe_voirie"><br>



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
      $req=("SELECT * FROM taxe_voirie WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_taxe_voirie DESC ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    Numero matricule: <?php echo ($aff['reff_taxe_voirie'])?><br>
    Numero matricule: <?php echo ($aff['date_livraison_taxe_voirie'])?><br>
    Numero matricule: <?php echo ($aff['date_expiration_taxe_voirie'])?><br>

      <?php $x=abs(floor(strtotime($aff['date_expiration_taxe_voirie'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_taxe_voirie'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      echo $x-$z .' Jour(s) de validité'.'<br>'; 
      //echo $z .'<br>'; 
      //echo $rest_jours .'<br>';
      ?>  

     <?php
      if($rest_jours>=0){

        echo $alerte='<strong>'.'<p class="">'."La Taxe Voirie reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
         echo $alerte='<strong>'.'<p class="blue" >'."La Taxe Voirie reste a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>

   <hr class="two">
      <?php }?>

</body>
</html>