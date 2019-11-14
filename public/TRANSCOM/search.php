<?php
session_start();
require('connexion.php');
$verification="";
?>

<?php  
//$motcle="NULL";
$taxe=$_GET['taxe'];
$nom_pro_fk=$_GET['nom_pro_fk'];
if(empty($_GET['nom_pro_fk'])){
$verification="Pas de resultat pour cette recherche";
echo "pas de resulat svp";
}
else{
  $req=("SELECT * FROM $taxe WHERE date_enreg_assurance LIKE '%$nom_pro_fk%'");
$res=mysqli_query($conn,$req) or  die(mysqli_error());

}


?>
          
          <?php while ($aff=mysqli_fetch_assoc($res)){?>
    
                
                <p class="black"> PLAQUE D'IMMATRICULATION: <?php echo ($aff['date_expiration_assurance']) ?></p>
             
                
                <a href="assurance.php?id_assurance=<?php echo ($aff['id_assurance'])?>"><button ><p><strong> Details assurance </strong></p></button></a>        


<?php }?>
   
  </div> 

  <!-- section de la pagination  -->

<?php
//include('pagination.php')
?>
</div>


</body>
<?php
//include('footer.php');
?>
</html>
<?php
mysqli_close($conn);
?>
