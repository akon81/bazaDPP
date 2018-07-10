<?php
  require_once("../funkcje_glowne_strony.php");
  session_start();
  
   if(mainSession::sprawdz_log_uzytk()) 
			{
		if (isset($_POST['pid'])) $id=$_POST['pid'];
		
		$praca=new DecorationOther($id);
		$Mpraca=new DecorationModel($praca);
		
		if ($Mpraca->delete()) $tekst=1; else $tekst=2;
		
		$JSData=json_encode($tekst);
		echo $JSData;	
	} 
	else 
	{
		$tekst=2;
		$JSData=json_encode($tekst);
		echo $JSData;
	}