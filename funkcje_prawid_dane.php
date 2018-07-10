<?php

// skrypty sprawdzajace poprawnosc danych



// *********************************************************************************************************************

function wypelniony($zmienne_formularza)
{
  // sprawdzenie, czy ka�da zmienna posiada warto?�
  foreach ($zmienne_formularza as $klucz => $wartosc)
  {
     if (!isset($klucz) || ($wartosc == '')) 
        return false;
  } 
  return true;
}

// *********************************************************************************************************************

function prawidlowy_email($adres)
{
  // sprawdzenie prawid�owo?ci adresu  poczty elektronicznej
  if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $adres))
    return true;
  else 
    return false;
}

// *********************************************************************************************************************

function prawidlowy_kod($kod)
{
  // sprawdzenie prawid�owo?ci kodu pocztowego
  if (ereg('^[0-9][0-9]+\-[0-9][0-9][0-9]+$', $kod))
    return true;
  else 
    return false;
}

// *********************************************************************************************************************

function prawidlowe_dane($dane)
{
  // sprawdzenie czy nazwa bez cyfr
  if (ereg('^[a-zA-Z1-9?���涿��Ʀ�?]+$', $dane))
    return true;
  else 
    return false;
}

// *********************************************************************************************************************

function prawidlowe_pole($dane)
{
  // sprawdzenie czy nazwa bez cyfr
  if (ereg('^[0-9a-zA-Z?./& ���涿��Ʀ�?]+$', $dane))
    return true;
  else 
    return false;
}

// *********************************************************************************************************************

function prawidlowa_cena($cena)
{
// sprawdzenie czy liczba
if (ereg('^[[:digit:]\.]+$', $cena))
    return true;
  else 
    return false;
}

// *********************************************************************************************************************

function prawidlowy_nip($nip)
{
 $steps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
 $nip = str_replace('-', '', $nip);
 $nip = str_replace(' ', '', $nip);
 if (strlen($nip) != 10) { RETURN false; }
 for ($x = 0; $x < 9; $x++) $sum_nb += $steps[$x] * $nip[$x];
 if ($sum_nb % 11 == $nip[9]) { RETURN true; }
 else { RETURN false; }
}  

// *********************************************************************************************************************

function prawidlowy_regon($regon)
{
  // tworzenie tablicy wag
  $steps = array(8, 9, 2, 3, 4, 5, 6, 7);

  $regon = str_replace('-', '', $regon);
  $regon = str_replace(' ', '', $regon);

  if (strlen($regon) != 9) return false;

  // tworzenie sumy iloczyn�w
  for ($x = 0; $x < 8; $x++) $sum_nb += $steps[$x] * $regon[$x];
  $sum_m = $sum_nb % 11;

  if($sum_m == 10) $sum_m = 0;
  if ($sum_m == $regon[8]) return true;
  return false;
}

// *********************************************************************************************************************

       
 function catch_mysql_error( $line )
 {
     $resFile = fopen( 'mysql_errors.txt', 'a' );
     $strToWrite = date( d.m.Y.H.i) . '::' . __FILE__ . '::' . $line . '::' . mysql_errno() . '::' . mysql_error() . '::' . $_SERVER["REMOTE_ADDR"] . '::' . $_SERVER["REQUEST_URI"] . "\n";
     fwrite( $resFile, $strToWrite );
     fclose( $resFile );
     echo '</br>Wystąpił błąd podczas pracy z bazą danych, i został on zgłoszony do administratora. Przepraszamy.';
 }
       
 // przyk�adowe odwo�anie si� do funkcji mo�e wygl�da� tak:
 // $resQuery = @mysql_query( 'SELECT * FROM tabela' ) OR EXIT( catch_mysql_error( __LINE__ );
       
function filtruj($string) { 
	
	$string = str_replace("\';--", "", $string);  
	$string = str_replace("'", "", $string);
	$string = str_replace(";", "", $string);
	$string = htmlspecialchars(strip_tags($string));    
return $string; 
}

?>