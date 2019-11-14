<?php
session_start();  
include('connexion.php');
?>


<form  method="GET" action="search.php">
         <input type="date" id="search-input" name="motcle" value="" placeholder="chercher vehicule par numero plaque/chassis/moteur"  type="text" >
         <input type="text" name="taxe">
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>

    <?php

 $req2=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());

    ?>

     <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
"<?php echo ($aff2['id_mt'])?>">
<?php echo ($aff2['num_plaque_mt'])?>"> 
                  
<?php }?>

 $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ");