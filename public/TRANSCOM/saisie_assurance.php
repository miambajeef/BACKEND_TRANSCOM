<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$scan_assurance=$_FILES['scan_assurance'] ['name'];
$file_tmp_name=$_FILES['scan_assurance'] ['tmp_name'];

move_uploaded_file($file_tmp_name,"./imgs/$scan_assurance");

$reff_assurance=$_POST['reff_assurance'];
$date_livraison_assurance=$_POST['date_livraison_assurance'];
$date_expiration_assurance=$_POST['date_expiration_assurance'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO assurance (reff_assurance,date_livraison_assurance,date_expiration_assurance,scan_assurance,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$reff_assurance','$date_livraison_assurance','$date_expiration_assurance','$scan_assurance','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

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
 <a href="deconnexion.php">deconnexion</a><br>

<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
	REFFERENCE ASSURANCE: <input type="text" name="reff_assurance"><br>
	DATE DE LIVRAISON: <input type="date" name="date_livraison_assurance"><br>
	DATE D'EXPIRATION: <input type="date" name="date_expiration_assurance"><br>
	SCAN ASSURANCE: <input type="file" name="scan_assurance"><br>



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


       <h2 class="mb-4">APERCU GENERAL ASSURANCE</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM assurance WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_assurance DESC ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    REFFERENCE ASSURANCE: <?php echo ($aff['reff_assurance'])?><br>
    DATE DE LIVRAISON: <?php echo ($aff['date_livraison_assurance'])?><br>
    DATE D'EXPIRATION: <?php echo ($aff['date_expiration_assurance'])?><br>

      <?php $x=abs(floor(strtotime($aff['date_expiration_assurance'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_assurance'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      echo $x-$z .' Jour(s) de validité'.'<br>'; 
      //echo $z .'<br>'; 
      //echo $rest_jours .'<br>';
      ?>  

     <?php
      if($rest_jours>=0){

        echo $alerte='<strong>'.'<p class="">'."L'assurance reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
         echo $alerte='<strong>'.'<p class="blue" >'."L'assurance a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>


   <hr class="two">
      <?php }?>

</body>
</html>