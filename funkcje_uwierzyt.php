<?php
function filtruj($string) {
	$string = str_replace("\';--", "", $string); 
	$string= str_replace("'", "", $string); 
	$string = str_replace(";", "", $string);  
	$string=trim($string);
	return htmlspecialchars ( strip_tags ( $string ) );
	
}

function catch_mysql_error($line) {
	$resFile = fopen ( 'mysql_errors.txt', 'a' );
	$strToWrite = date (" d . m . Y . H . i" ) . '::' . __FILE__ . '::' . $line . '::' . mysql_errno () . '::' . mysql_error () . '::' . $_SERVER ["REMOTE_ADDR"] . '::' . $_SERVER ["REQUEST_URI"] . "\n";
	fwrite ( $resFile, $strToWrite );
	fclose ( $resFile );
	echo '</br>Wystąpił błąd podczas pracy z bazą danych, i został on zgłoszony do administratora. Przepraszamy.';
}

 function pobierz_parametr($id){
 if(isset($_GET["$id"])){
 $id=$_GET["$id"];
 }else{
$id=false;
  }
   return filtruj($id);
  }
  
// *********************************************************************************************************************

function zmien_polskie_litery($p_nazwa)
{
		
		$p_nazwa = str_replace(" ","",$p_nazwa);
		$p_nazwa = str_replace("_","",$p_nazwa);
		$p_nazwa = str_replace("ą","a",$p_nazwa);
		$p_nazwa = str_replace("ę","e",$p_nazwa);
		$p_nazwa = str_replace("ć","c",$p_nazwa);
		$p_nazwa = str_replace("ł","l",$p_nazwa);
		$p_nazwa = str_replace("ś","s",$p_nazwa);
	    $p_nazwa = str_replace("ń","n",$p_nazwa);
		$p_nazwa = str_replace("ó","o",$p_nazwa);
		$p_nazwa = str_replace("ź","z",$p_nazwa);
		$p_nazwa = str_replace("ż","z",$p_nazwa);
		$p_nazwa = str_replace("Ą","A",$p_nazwa);
		$p_nazwa = str_replace("Ę","E",$p_nazwa);
		$p_nazwa = str_replace("Ć","C",$p_nazwa);
		$p_nazwa = str_replace("Ł","L",$p_nazwa);
		$p_nazwa = str_replace("Ś","S",$p_nazwa);
	    $p_nazwa = str_replace("Ń","N",$p_nazwa);
		$p_nazwa = str_replace("Ó","O",$p_nazwa);
		$p_nazwa = str_replace("Ź","Z",$p_nazwa);
		$p_nazwa = str_replace("Ż","Z",$p_nazwa);

	return $p_nazwa;
}


function zmien_znaki_link($link)
{
 $link = strtolower($link);
 $link = replace_diacritics($link);
 $link = str_replace(' ', '-', $link);
 $link = preg_replace('/[^[:alnum:]]/', '-', $link);
 $link= preg_replace('/[\-]+/', '-', $link);
 $link = trim($link, '-');
 
	return $link;
}

// *********************************************************************************************************************


function powiadom_haslo($login, $haslo) // powiadomienie użytkownika o zmianie hasła
{
	global $db;
	global $lang;
	
	try {
		$wynik = $db->query ( "select email from pracownicy where login='$login'" );
	} catch ( PDOException $e ) {
		catch_mysql_error ( $e );
		die ();
	}
	$row = $wynik->fetch ();
	$wynik->closeCursor ();
	
	if ($row == 0)
		return false;
	if ($row > 0) {
		
		$email = $row ['email'];
		
		$wiadomosc=new message();	
		 $wiadomosc->dodaj_temat();
		 $wiadomosc->dodaj_tresc("<p style='font-family:Verdana, Geneva, sans-serif; font-size:14px;'>".'Hasło w systemie zostało zmienione na'.": <strong>".$haslo."</strong></p>");
		 $wiadomosc->dodaj_adresata($email);
		if($wiadomosc->wyslij_wiadomosc()) return true; else return false;
	}
}

// *********************************************************************************************************************


Function losuj_id($dlugosc) {
	$id = substr ( preg_replace ( "[^0-9]", "", crypt ( time () ) ) . preg_replace ( "[^0-9]", "", crypt ( time () ) ) . preg_replace ( "[^0-9]", "", crypt ( time () ) ), 0, $dlugosc );
	return ( int ) $id;
	
}
