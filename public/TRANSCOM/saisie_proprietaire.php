<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$scan_identite_pro=$_FILES['scan_identite_pro'] ['name'];
$file_tmp_name=$_FILES['scan_identite_pro'] ['tmp_name'];
move_uploaded_file($file_tmp_name,"./imgs/$scan_identite_pro");

$photo_pro=$_FILES['photo_pro'] ['name'];
$file_tmp_name=$_FILES['photo_pro'] ['tmp_name'];
move_uploaded_file($file_tmp_name,"./imgs/$photo_pro");

$nom_pro=$_POST['nom_pro'];
$postnom_pro=$_POST['postnom_pro'];
$prenom_pro=$_POST['prenom_pro'];
$sexe_pro=$_POST['sexe_pro'];
$date_naiss_pro=$_POST['date_naiss_pro'];
$lieu_naiss_pro=$_POST['lieu_naiss_pro'];
$province_pro=$_POST['province_pro'];
$ville_pro=$_POST['ville_pro'];
$commune_pro=$_POST['commune_pro'];
$quartier_pro=$_POST['quartier_pro'];
$avennue_pro=$_POST['avennue_pro'];
$num_domicile_pro=$_POST['num_domicile_pro'];
$tel1_pro=$_POST['tel1_pro'];
$tel2_pro=$_POST['tel2_pro'];
$email_pro=$_POST['email_pro'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO proprietaire (nom_pro,postnom_pro,prenom_pro,sexe_pro,date_naiss_pro,lieu_naiss_pro,province_pro,ville_pro,commune_pro,quartier_pro,avennue_pro,num_domicile_pro,tel1_pro,tel2_pro,email_pro,scan_identite_pro,photo_pro,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$nom_pro','$postnom_pro','$prenom_pro','$sexe_pro','$date_naiss_pro','$lieu_naiss_pro','$province_pro','$ville_pro','$commune_pro','$quartier_pro','$avennue_pro','$num_domicile_pro','$tel1_pro','$tel2_pro','$email_pro','$scan_identite_pro','$photo_pro','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}
?>


  <?php 
  include ('menu_mt.php');
  ?><br>
<body>
 <a href="deconnexion.php">Deconnexion</a><br>

<form  method="GET" action="chercher_proprietaire_affect.php">
         <input id="search-input" name="recherche_nom_pro" value="" placeholder="chercher Proprietaire"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>


<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
	NOM : <input type="text" name="nom_pro"><br>
	POSTNOM : <input type="text" name="postnom_pro"><br>
	DPRENOM : <input type="text" name="prenom_pro"><br>
  SEXE :
  <select   name="sexe_pro">
    <option value="MASCULIN">MASCULIN</option>
     <option value="FEMININ">FEMININ</option>
  </select><br>
  DATE DE NAISSANCE: <input type="date" name="date_naiss_pro"><br>
  lieu de naissance: <input type="text" name="lieu_naiss_pro"><br>
  PROVINCE : <input type="text" name="province_pro"><br>
  VILLE : <input type="text" name="ville_pro"><br>
  COMMUNE : <input type="text" name="commune_pro"><br>
  QUARTIER: <input type="tex" name="quartier_pro"><br>
  AVENNUE : <input type="text" name="avennue_pro"><br>
  NUMERO DOMICILE : <input type="text" name="num_domicile_pro"><br>
  TELEPHONE 1: <input type="text" name="tel1_pro"><br>
  TELEPHONE 2: <input type="text" name="tel2_pro"><br>
  ADRESSE MAIL : <input type="text" name="email_pro"><br>
  SCAN IDENTITE: <input type="file" name="scan_identite_pro"><br>
  PHOTO: <input type="file" name="photo_pro"><br>

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

       <h2 class="mb-4">APERCU GENERAL PROPRIETE</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM proprietaire WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_proprietaire DESC ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>
<br>
    Non:: <?php echo ($aff['nom_pro'])?><br>
    Postnom: <?php echo ($aff['postnom_pro'])?><br>
    Prenom: <?php echo ($aff['prenom_pro'])?><br>

<br>
<a href="affectation_pro.php?id_pro=<?php echo ($aff['id_pro'])?>"><button > Aller affecter </button></a>   
      <?php }?>

</body>
</html>