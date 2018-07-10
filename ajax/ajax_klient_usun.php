<?php
  require_once("../funkcje_glowne_strony.php");
  session_start();
  
   if(mainSession::sprawdz_log_uzytk()) 
			{
		if (isset($_POST['pid'])) $id=$_POST['pid'];
		
		$db=DB::prepare("delete from customers where id=:id");
		$db->bindValue(':id', $id, PDO::PARAM_INT);
			
		if($db -> execute()) $tekst=1; else $tekst=2;

	         $db2=DB::prepare("update decorations set customer_id=:customer_id where customer_id=:id");
	        
			 $db2 -> bindValue(':customer_id', 1, PDO::PARAM_INT);
			 $db2 -> bindValue(':id', $id, PDO::PARAM_INT);
	         
	         $db2 -> execute();    
						
		
		$JSData=json_encode($tekst);
		echo $JSData;	
	} 
	else 
	{
		$tekst=2;
		$JSData=json_encode($tekst);
		echo $JSData;
	}