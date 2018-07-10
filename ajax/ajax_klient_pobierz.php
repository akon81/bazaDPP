<?php
  require_once("../funkcje_glowne_strony.php");
  session_start();
  
   if(mainSession::sprawdz_log_uzytk())  
{
if (isset($_POST['pid'])) $id=$_POST['pid'];

$query=DB::prepare("select * from customers where id=:id");
$query -> bindValue(':id', $id, PDO::PARAM_INT);

try {
 	 $query -> execute(); 	
	 } catch (PDOException $e) { DB::catch_mysql_error($e); 	
	 	die();
	 }

 	$dane=array();
 	
 	$wynik = $query->fetch();
 	$query -> closeCursor(); 
 	
 	$dane[0]=$wynik['name'];
 	$dane[1]=$wynik['descript'];
 	
 		$JSData=json_encode($dane);
		echo $JSData;
}
