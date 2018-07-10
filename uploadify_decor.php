<?php
require_once("funkcje_glowne_strony.php");

    $sesja=$_POST['sess'];
    if(isset($_POST['id'])) $id=$_POST['id']; else $id==0;
    $data_ob = new DateTime();
	$data=$data_ob->format('Y-m-d');
	$data1=$data_ob->format('YmdGis');
	

	
// Define a destination
//$targetFolder = '/dpp/pliki/upload'; // Relative to the root
$targetFolder=Config::get("ROOT_DIR").Config::get("PHOTO_PATH");

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES)) {
	$nazwa=$_FILES['files']['name'][0];
	$nazwa=zmien_polskie_litery($nazwa);
	$zmienionanazwa="$data1$nazwa";
	$tempFile = $_FILES['files']['tmp_name'][0];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $zmienionanazwa;
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['files']['name'][0]);
	

	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
	
		$tytul=$_FILES['files']['name'][0];
		$plik=$_FILES['files']['name'][0];
		$typ=$fileParts['extension'];
		$lokalizacja=$_FILES['files']['name'][0];
		
		// miniaturka
	$max_w=Config::get("THUMB_MAX_WIDTH");
	$max_h=Config::get("THUMB_MAX_HEIGHT");
		
	//Tworzy miniaturę
	$file=$targetPath.$zmienionanazwa;
	
	$image=new Image($file);
	//$sc=$image->scale($max_w, $max_h, Image::PROP_GROW);
	//$crop=$sc->crop($max_w, $max_h, Image::HCENTER | Image::VCENTER);
	$scaled = $image->scale($max_w, $max_h, Image::PROP_SHRINK);
	$im=imagecreatetruecolor($max_w, $max_h);
	
	$white = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0, 0, $white);
	$empty = new Image($im);
	
	$crop = $empty->merge($scaled, Image::HCENTER | Image::VCENTER);
	
	$crop->toJPG($targetPath."thumbs/".$zmienionanazwa,100);
			
		$photo=new Photo();
		$mPhoto=new PhotoModel($photo);
		
		$photo->setName($plik);
		$photo->setPath($zmienionanazwa);
		$photo->setDateAdd($data);
		$photo->setPosition(1);
		$photo->setVisible(1);
		
		if($id==0) {
		$photo->setSess($sesja);
		$photo->setForeignKey(NULL);
		} else {
		$photo->setSess("");
		$photo->setForeignKey($id);	
		}
		
		$mPhoto->insertDecor();		
		
		
		echo '1';
	} else {
		echo 'Niedozwolony format pliku. Dozwolone formaty plików: .jpg, .gif, .png';
	}
}
?>