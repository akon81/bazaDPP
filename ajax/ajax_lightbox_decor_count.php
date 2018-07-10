<?php
  require_once("../funkcje_glowne_strony.php");
  session_start();
 
		if (isset($_POST['pid'])) $id=$_POST['pid'];
		$zapyt=DB::prepare("select count(*) as ile from images where visible=1 and decor_id=:id");
		$zapyt->bindValue(':id', $id, PDO::PARAM_INT); 
		$zapyt -> execute();  
		
	    $wynik = $zapyt->fetch();
		$zapyt -> closeCursor();
		$JSData=json_encode($wynik['ile']);
		echo $JSData;	
	