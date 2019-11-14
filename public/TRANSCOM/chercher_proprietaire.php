<?php
session_start();
require('connexion.php');
$verification="";
?>

<?php  
//$motcle="NULL";
$recherche_nom_pro=$_GET['recherche_nom_pro'];

if(empty($_GET['recherche_nom_pro'])){
$verification="Pas de resultat pour cette recherche";
echo "pas de resulat svp";
}
else{
  $req=("SELECT * FROM proprietaire WHERE nom_pro LIKE '%$recherche_nom_pro%' OR postnom_pro LIKE '%$recherche_nom_pro%' OR prenom_pro LIKE '%$recherche_nom_pro%'");
$res=mysqli_query($conn,$req) or  die(mysqli_error());

}

?>
          <table>

          <?php while ($aff=mysqli_fetch_assoc($res)){?>
                
                <p class="black"> NOM PROPRIETAIRE: <?php echo ($aff['nom_pro']) ?></p>
                <p class="black">POSTNOM PROPRIETAIRE: <?php echo ($aff['postnom_pro']) ?></p>
                <p class="black">PRENOM PROPRIETAIRE: <?php echo ($aff['prenom_pro']) ?></p>
               
       <a href="apercu_proprietaire.php?id_pro=<?php echo ($aff['id_pro'])?>"><button ><p><strong> Voir </strong></p></button></a>  


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
