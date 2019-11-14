<?php
session_start();	
include('connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
 <?php
 //include('header.php');
 ?>
</head>
<body>

         <?php
         //include('menu2.php');
         ?>
   
   
<?php
//$id_div=$_GET['id_division_fk'];

//$_SESSION['id_div'] =$id_div;
//echo $_SESSION['id_div'];

$req=("SELECT * FROM moyen_de_transport WHERE type_mt = 'vehicule' ORDER BY date_enreg_mt DESC");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>
                     LISTE DES VEHICULES <br><br>

 <form  method="GET" action="chercher_mt.php">
         <input id="search-input" name="motcle" value="" placeholder="numero plaque/chassis/moteur"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>

    <a href="saisie_transport_terrestre.php"><button>Ajouter</button></a>
                                  <table border="1px">
                                    <thead>
                                        <tr>
                                           
                                            <th>ID</th>
                                            <th>NUMERO PLAQUE</th>
                                            <th>MARQUE</th>
                                            <th>MODELE</th>
                                            <th>IMAGE</th>
                                            

                                        </tr>
                                        
                                    </thead>
                                    <?php while ($aff=mysqli_fetch_assoc($res)){?>
                                    
                                        <tr>
                                            
                                            <td><?php echo ($aff['id_mt'])?></td>
                                            <td><?php echo ($aff['num_plaque_mt'])?></td>
                                            <td><?php echo ($aff['marque_mt'])?></td>
                                            <td width="10"><?php echo ($aff['model_mt'])?></td>
                                            <td width="10"><img height="40" width="40" class="rounded-circle" src=" imgs/<?php echo ($aff['image_mt']) ?>"/></td>

                                            <td width="20"><a href="apercu_moyen_de_transport.php?id_mt=<?php echo ($aff['id_mt']) ?>"> <button >apercu</button></a></td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
 <?php
 //include('footer.php');
 ?>
</body>
</html>