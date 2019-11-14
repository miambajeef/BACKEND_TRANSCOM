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

$req=("SELECT * FROM proprietaire ORDER BY date_enreg_proprietaire DESC ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>
                    LISTE DES PROPRIETAIRES <br><br>

<form  method="GET" action="chercher_proprietaire.php">
         <input id="search-input" name="recherche_nom_pro" value="" placeholder="chercher Proprietaire"  type="text" >
         
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
                                            
                                            <td><?php echo ($aff['nom_pro'])?></td>
                                            <td><?php echo ($aff['postnom_pro'])?></td>
                                            <td><?php echo ($aff['prenom_pro'])?></td>
                                            
                                            <td width="10"><img height="40" width="40" class="rounded-circle" src=" imgs/<?php echo ($aff['photo_pro']) ?>"/></td>

                                            <td width="20"><a href="apercu_proprietaire.php?id_pro=<?php echo ($aff['id_pro']) ?>"> <button >Apercu proprietaire</button></a></td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
 <?php
 //include('footer.php');
 ?>
</body>
</html>