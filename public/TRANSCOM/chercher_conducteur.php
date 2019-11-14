<?php
session_start();
require('connexion.php');
$verification="";
?>

<?php  
//$motcle="NULL";
$recherche_nom_cond=$_GET['recherche_nom_cond'];

if(empty($_GET['recherche_nom_cond'])){
$verification="Pas de resultat pour cette recherche";
echo "pas de resulat svp";
}
else{
  $req=("SELECT * FROM conducteur WHERE nom_cond LIKE '%$recherche_nom_cond%' OR postnom_cond LIKE '%$recherche_nom_cond%' OR prenom_cond LIKE '%$recherche_nom_cond%'");
$res=mysqli_query($conn,$req) or  die(mysqli_error());

}

?>
          <table>

          <?php while ($aff=mysqli_fetch_assoc($res)){?>
                
                <p class="black"> NOM PROPRIETAIRE: <?php echo ($aff['nom_cond']) ?></p>
                <p class="black">POSTNOM PROPRIETAIRE: <?php echo ($aff['postnom_cond']) ?></p>
                 <p class="black">PRENOM PROPRIETAIRE: <?php echo ($aff['prenom_cond']) ?></p>      


<?php }?>


   </table>


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
