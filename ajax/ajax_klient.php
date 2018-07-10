<?php
require_once("../funkcje_glowne_strony.php");
session_start();
 
    if(mainSession::sprawdz_log_uzytk()) 
{
if (isset($_POST['pnazwa'])) $nazwa=$_POST['pnazwa']; else $nazwa="";
if (isset($_POST['popis'])) $opis=$_POST['popis']; else $opis="";


$query=DB::prepare("select count(*) as ile from customers where name like :name");
$query -> bindValue(':name', $nazwa, PDO::PARAM_STR);

try {
 	 $query -> execute(); 	
	 } catch (PDOException $e) { DB::catch_mysql_error($e); 	
	 	die();
	 };
 	
 	$wynik = $query->fetch();
 	$query -> closeCursor();

 	if($wynik['ile']>0) $tekst=3; else {

$ile=DB::prepare("insert into customers (name,descript) values (:name,:descript)");
$ile -> bindValue(':name', $nazwa, PDO::PARAM_STR);
$ile -> bindValue(':descript', $opis, PDO::PARAM_STR);

 	 $ile -> execute(); 	

 	if ($ile) $tekst=1; else $tekst=2; }
		$JSData=json_encode($tekst);
		echo $JSData;
} else 
{
	$tekst=2;
	$JSData=json_encode($tekst);
	echo $JSData;
}