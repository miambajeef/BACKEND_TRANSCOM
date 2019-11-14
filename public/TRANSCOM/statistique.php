<?php
session_start();  
include('connexion.php');
?>

NOMBRE DES TOUT LES MOYEN DE TRANSPORT:
<?php
									$sql="SELECT count(id_mt) AS total FROM moyen_de_transport ";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

NOMBRE DES VEHICULES:
<?php
									$sql="SELECT count(id_mt) AS total FROM moyen_de_transport WHERE type_mt='vehicule' ";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

NOMBRE DES MOTOS: 
<?php
					$sql="SELECT count(id_mt) AS total FROM moyen_de_transport WHERE type_mt='moto' ";
					$result=mysqli_query($conn,$sql);
					$values=mysqli_fetch_assoc($result);
					$num_rows=$values['total'];
					echo $num_rows;
					?><br>
<hr>
NOMBRE DES PROPRIETAIRES:
<?php
									$sql="SELECT count(id_pro) AS total FROM proprietaire";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

NOMBRE DES PROPRIETAIRES HOMME:
<?php
					$sql="SELECT count(id_pro) AS total FROM proprietaire WHERE sexe_pro='MASCULIN' ";
					$result=mysqli_query($conn,$sql);
					$values=mysqli_fetch_assoc($result);
					$num_rows=$values['total'];
					echo $num_rows;
					?><br>


NOMBRE DES PROPRIETAIRES FEMME:
<?php
					$sql="SELECT count(id_pro) AS total FROM proprietaire WHERE sexe_pro='FEMININ' ";
					$result=mysqli_query($conn,$sql);
					$values=mysqli_fetch_assoc($result);
					$num_rows=$values['total'];
					echo $num_rows;
					?><br>
<hr>
NOMBRE DES CONDUCTEUS:
<?php
									$sql="SELECT count(id_cond) AS total FROM conducteur";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

NOMBRE DES CONDUCTEUS HOMME:
<?php
									$sql="SELECT count(id_cond) AS total FROM conducteur WHERE sexe_cond='MASCULIN'";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

NOMBRE DES CONDUCTEUS FEMME:
<?php
									$sql="SELECT count(id_cond) AS total FROM conducteur WHERE sexe_cond='FEMININ'";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>
<hr>

NOMBRE DES VIGNETTES:
<?php
									$sql="SELECT count(id_vignette) AS total FROM vignette";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>
<hr>
NOMBRE DES ASSURANCES:
<?php
									$sql="SELECT count(id_assurance) AS total FROM assurance";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

<hr>
NOMBRE DES TAXES VOIRIES:
<?php
									$sql="SELECT count(id_taxe_voirie) AS total FROM taxe_voirie";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

<hr>

NOMBRE DES CONTROLES TECHNIQUES:
<?php
									$sql="SELECT count(id_controle_technique) AS total FROM controle_technique";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;

									?><br>
<hr>

NOMBRE DES PERMIS DE CONDUIRES:
<?php
									$sql="SELECT count(id_permis) AS total FROM permis";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>

<hr>
NOMBRE DES ALERTES:
<?php
									$sql="SELECT count(id_alerte) AS total FROM alerte";
									$result=mysqli_query($conn,$sql);
									$values=mysqli_fetch_assoc($result);
									$num_rows=$values['total'];
									echo $num_rows;
									?>	<br>
<hr>
<?php
$date_jour= date('d/m/Y');
?>