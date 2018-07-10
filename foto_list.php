<?php
require_once("funkcje_glowne_strony.php");
session_start();
if (isset($_POST['id'])) $id=$_POST['id'];
$root_dir=Config::get("ROOT_DIR");

	$photolist=PhotoModel::getPhotoDecorlist($id);
	$targetFolder=Config::get("ROOT_DIR").Config::get("PHOTO_PATH");
		
?>
       	
<div id="foto_list_gora">
	<div id="foto_list">			
		<table width="600" border="0" cellpadding="1" cellspacing="0" class="centab">
		<?php 
		$i=0;
		$data=new DateTime();
		$rand=$data->format("i:s");
		foreach ($photolist as $photo => $row)
		{
			$i++;
		if($i==1) {
		?>
		 <tr><td colspan="2" class="tekstform">Screeny dodane do dekoracji:</td></tr>
		<?php	
		}
		?>
		<tr><td><a href="<?php echo $targetFolder.$row[2];?>" target="_blank"><img src="<?php echo $targetFolder."thumbs/".$row[2].'?'.$rand; ?>"/></a></td>
		<td>
		<form action="<?php echo $root_dir;?>foto-decor-usun.html" method="post"><input type="hidden" name="foto_id" value="<?php echo $row[0];?>"/><input type="hidden" name="id" value="<?php echo $id;?>"/><input type="submit" class="zalog" value="Usuń screen"></form>
		<?php if(1==2) {?><form action="<?php echo $root_dir;?>foto-decor-crop.html" method="post"><input type="hidden" name="foto_id" value="<?php echo $row[0];?>"/><input type="hidden" name="id" value="<?php echo $id;?>"/><input type="submit" class="zalog" value="Kadruj miniaturę"></form><?php }?>
		</td></tr>
		<?php 
		}
		?>
		</table>
	</div>
</div>
<?php 