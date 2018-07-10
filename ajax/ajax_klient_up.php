<?php
  require_once("../funkcje_glowne_strony.php");
  session_start();
  
   if(mainSession::sprawdz_log_uzytk())  
{
if (isset($_POST['pnazwa'])) $nazwa=$_POST['pnazwa']; else $nazwa="";
if (isset($_POST['popis'])) $opis=$_POST['popis']; else $opis="";
if (isset($_POST['ptd'])) $id=$_POST['ptd'];

$ile=DB::prepare("update customers set name=:name, descript=:descript where id=:id");
$ile -> bindValue(':name', $nazwa, PDO::PARAM_STR);
$ile -> bindValue(':descript', $opis, PDO::PARAM_STR);
$ile -> bindValue(':id', $id, PDO::PARAM_INT);

 	 $ile -> execute(); 	
	

 	if($ile) $tekst=1; else $tekst=2;
		$JSData=json_encode($tekst);
		echo $JSData;
} else 
{
	$tekst=2;
	$JSData=json_encode($tekst);
	echo $JSData;
}