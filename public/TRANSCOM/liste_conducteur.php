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
//$id_div=$_GET['id_division_fk'];

//$_SESSION['id_div'] =$id_div;
//echo $_SESSION['id_div'];

$req=("SELECT * FROM conducteur ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>
                    LISTE DES PROPRIETAIRES <br><br>

<form  method="GET" action="chercher_conducteur.php">
         <input id="search-input" name="recherche_nom_cond" value="" placeholder="chercher Conducteur"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>
                                  <table border="1px">
                                    <thead>
                                        <tr>
                                           

                                            <th>NOM :</th>
                                            <th>POSTNOM: </th>
                                            <th>PRENOM: </th>
                                            <th>PHOTO: </th>

                                        </tr>
                                        
                                    </thead>
                                    <?php while ($aff=mysqli_fetch_assoc($res)){?>
                                    
                                        <tr>
                                            
                                            <td><?php echo ($aff['nom_cond'])?></td>
                                            <td><?php echo ($aff['postnom_cond'])?></td>
                                            <td><?php echo ($aff['prenom_cond'])?></td>
                                            
                                            <td width="10"><img height="40" width="40" class="rounded-circle" src=" imgs/<?php echo ($aff['photo_cond']) ?>"/></td>

                                            <td width="20"><a href="apercu_conducteur.php?id_cond=<?php echo ($aff['id_cond']) ?>"> <button >Apercu conducteur</button></a></td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
 <?php
 //include('footer.php');
 ?>
</body>
</html>