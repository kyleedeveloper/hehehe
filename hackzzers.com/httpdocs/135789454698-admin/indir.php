<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>GSM Hak</th>
											<th>Email</th>
											<th>Üyelik Durumu</th>
											<th>Bakiye</th>
											<th>Kullanıcı Adı</th>
										</tr>
									</thead>

<?php 
$filename="Kullanici Listesi";
$sql = "SELECT * from Users";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$Name= $result->name.'</td> 
<td>'.$Email= $result->email.'</td> 
<td>'.$Gender= $result->gender.'</td> 
<td>'.$Phone= $result->mobile.'</td> 
<td>'.$Designation= $result->designation.'</td> 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>