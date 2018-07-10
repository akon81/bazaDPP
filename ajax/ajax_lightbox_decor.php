<?php
  require_once("../funkcje_glowne_strony.php");
  session_start();
  
		if (isset($_POST['pid'])) $id=$_POST['pid'];
		$zapyt=DB::prepare("select path from images where visible=1 and decor_id=:id order by date_add desc limit 1,100");
		$zapyt->bindValue(':id', $id, PDO::PARAM_INT); 
		$zapyt -> execute();
		foreach($zapyt as $row)
		{
		?>
		<div class='added'><a href='pliki/upload/<?php echo $row['path'];?>' data-lightbox='L<?php echo $id;?>'/></a></div>
		<?php 
		}
		$zapyt -> closeCursor();