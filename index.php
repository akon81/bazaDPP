<?php 
require_once("funkcje_glowne_strony.php");
session_start();
if(isset($_GET['id1'])) { if($_GET['id1']=="wyloguj") 
{
$wylog=mainSession::wyloguj();
} }

mainSession::regeneruj();
$komunikat=new Statement();

$id=pobierz_parametr('id1'); 
$id2=pobierz_parametr('id2'); 
$id3=pobierz_parametr('id3');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Config::get("HTML_TITLE"); ?></title>
<link href='http://fonts.googleapis.com/css?family=Anton&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.tagsinput.css" rel="stylesheet" type="text/css" />
<link href="css/custom-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
<link href="css/lightbox.css" rel="stylesheet" type="text/css" />
<link href="css/uploadify.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
<link href="js/jQuery.filer-1.3.0/css/jquery.filer.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="js/jQuery-2.1.4.min.js" type="text/javascript" ></script>
<script src="js/jquery-ui.min.js" type="text/javascript" ></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="js/jquery.tagsinput.min.js" type="text/javascript" ></script>
<script src="js/jquery.uploadify.js" type="text/javascript"></script>
<script src="js/lightbox-2.6.min.js" type="text/javascript"></script>
<script src="js/jquery.Jcrop.min.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script> 
<script src="js/jQuery.filer-1.3.0/js/jquery.filer.min.js" type="text/javascript"></script> 
</head>

<body>
<div class="calosc">

  <?php 
switch ($id)
{
default: 
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Lista dekoracji");
				htmlView::form_lista_dekoracji();
			} 
			else
			{
				htmlView::form_log();
			}
break;


case "dekoracje":
			//	htmlView::panel_klienta();
				htmlView::strona_naglowek("Lista dekoracji");
				htmlView::form_lista_dekoracji_prev();
break;

case "print":

				htmlView::strona_naglowek("Lista dekoracji");
				htmlView::form_lista_dekoracji_print();
break;

case "niezwiazane": // prace niezwiazane z porcelana
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Lista prac niezwiązanych z porcelaną, emalią, szkłem");
				htmlView::form_lista_prac();
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "offset":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::form_lista_prac(1);
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "sito":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::form_lista_prac(2);
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto":
	$image=new Image("pliki/upload/2014021870228test1.jpg");
	

	$image->toJPG("pliki/upload/thumbs/a.jpg",100);
break;

case "logowanie":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				$komunikat->setText("Jesteś zalogowany w systemie"); 
				$komunikat->showStatement();
				htmlView::form_lista_prac();
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "zaloguj":
	  if(mainSession::sprawdz_log_uzytk()) 
	{ 	
				htmlView::panel_klienta();
				$komunikat->setText("Jesteś już zalogowany w systemie"); 
				$komunikat->showStatement();
	} 
		else {
		if (isset($_POST['login']) and $_POST['login']!='') { $login=$_POST['login'];
		if (isset($_POST['haslo'])) $haslo=$_POST['haslo'];
		$haslo=sha1($haslo);
	
		$logowanie=new mainSession();
		if($logowanie->loguj($login,$haslo))
		{ 
			htmlView::panel_klienta();
			$komunikat->setText("Logowanie prawidłowe.","Witamy Cię - ".$_SESSION['name']); 
			$komunikat->showStatement();
			htmlView::strona_naglowek("Dodaj dekorację do bazy");
			htmlView::form_dodaj_dekoracje();
		}
	 	else 
	 	{	htmlView::form_log();
		$komunikat->setText("Nieudana próba zalogowania!","Błędny login lub hasło");
		$komunikat->showStatement();
		
	 	}
		} else { htmlView::form_log();
		$komunikat->setText("Nieudana próba zalogowania!","Błędny login lub hasło");
		$komunikat->showStatement();
		
		}
	}  

break;	

case "wyloguj":
if (!empty($wylog[0]))
{
  if ($wylog[1]) {
    // jeżeli użytkownik zalogowany i nie wylogowany
    htmlView::form_log();
    $komunikat->setText("Wylogowano z systemu.","Zapraszamy ponownie.");
    $komunikat->showStatement();
    }
  else
  {
   // użytkownik zalogowany i wylogowanie niemożliwe\
      $komunikat->setText("Wylogowanie niemożliwe!");
      $komunikat->showStatement();
  }
}
else
{
  // jeżeli brak zalogowania, lecz w jakis sposób uzyskany dostęp do strony
  	htmlView::form_log();
	$komunikat->setText("Użytkownik niezalogowany.","Brak wylogowania!");
	$komunikat->showStatement();
	
}

break; 

case "profil":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Edytuj Profil");
				
				$user=new User($_SESSION['user_id']);
				$mUser=new UserModel($user);
				$mUser->load();
								
				htmlView::profil_klienta($user);
			} 
			else
			{
				htmlView::form_log();
			}
break; 

case "profil-zapisz":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Edytuj Profil");
				
				if(isset($_POST['user'])) {$user=unserialize(base64_decode($_POST['user']));
				if(isset($_POST['nazwisko'])) $nazwisko=$_POST['nazwisko'];
				if(isset($_POST['email'])) $email=$_POST['email'];
				
				$user->setName($nazwisko);
				$user->setEmail($email);
				$mUser=new UserModel($user);
				if($mUser->update()) $komunikat->setText("Dane zmieniono","Profil uaktualniono"); else $komunikat->setText("Nie zapisano zmian","Profil nie został zaktualizowany");
				htmlView::profil_klienta($user);							
				$komunikat->showStatement();
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "haslo":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Zmiana hasła");
					
				htmlView::form_zmiana_hasla();
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "haslo-zmien":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Zmiana hasła");
				htmlView::form_zmiana_hasla();
				if(isset($_POST['c'])) { 
				if(isset($_POST['stare_haslo'])) $stare=$_POST['stare_haslo'];
				if(isset($_POST['nowe_haslo'])) $nowe=$_POST['nowe_haslo'];
				if(!$stare) {$komunikat->setText("Błąd","Nie wpisano starego hasła"); $komunikat->showStatement(); break;}
				if(!$nowe) {$komunikat->setText("Błąd","Nie wpisano nowego hasła"); $komunikat->showStatement(); break;}
				
				$user=new User($_SESSION['user_id']);
				$mUser=new UserModel($user);
				$mUser->load();
				
				$stare=sha1($stare);
				if($stare<>$user->getPass()) {$komunikat->setText("Błąd","Stare hasło nieprawidłowe"); $komunikat->showStatement(); break;}
				if(strlen($nowe)<5)  {$komunikat->setText("Nowe hasło za krótkie!","Minimum 5 znaków"); $komunikat->showStatement(); break;}
				$nowe=sha1($nowe);
				$user->setPass($nowe);
				if($mUser->updatePass()) $komunikat->setText("Gratulacje!","Hasło zmienione poprawnie"); else $komunikat->setText("Wystąpił błąd","Nowe hasło nie zostało zapisane");
				$komunikat->showStatement(); 
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "klient":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Edycja klientów w bazie");
				htmlView::klienci();
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "dodaj":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Dodaj wpis do rejestru prac niezwiązanych");
				htmlView::form_dodaj_wpis();
			} 
			else
			{
				htmlView::form_log();
			}
break;


case "dodaj-dekoracje":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Dodaj dekorację");
				htmlView::form_dodaj_dekoracje();
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "dodaj-wpis":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Dodaj wpis do rejestru prac niezwiązanych");
				if(isset($_POST['c'])) { 
				
				$data_ob = new DateTime();
				$data=$data_ob->format('Y-m-d G:i:s');
				$sesja=session_id();
		
				$user_id=$_SESSION['user_id'];
				if(isset($_POST['rodzaj'])) $rodzaj=$_POST['rodzaj'];
				if(isset($_POST['numer'])) $numer=$_POST['numer'];
				if(isset($_POST['nazwa'])) $nazwa=$_POST['nazwa'];
				if(isset($_POST['opis'])) $opis=$_POST['opis'];
				if(isset($_POST['tagi'])) $tagi=str_replace(',',', ',$_POST['tagi']);
				if(isset($_POST['lokalizacja'])) $lokalizacja=$_POST['lokalizacja'];
				if(isset($_POST['data'])) $data=$_POST['data'];
	
				$praca=new IndexOther();
				$Mpraca=new IndexOtherModel($praca);
				
				$praca->setNumber($numer);
				$praca->setName($nazwa);
				$praca->setDescript($opis);
				$praca->setTags($tagi);
				$praca->setPath($lokalizacja);
				$praca->setKind($rodzaj);
				$praca->setDateAdd($data);
				$praca->setUserId($user_id);
				
				$w_id=$Mpraca->insert();
	
				PhotoModel::update_id_sess($sesja,$w_id);
				PhotoModel::delete_old();
				if($w_id>0) $komunikat->setText("Dodano nowy indeks do bazy", "Prawidłowo dodano nowy wpis"); else
				$komunikat->setText("Błąd.", "Nie udało się dodać wpisu do bazy");
				$komunikat->showStatement();
				}
				htmlView::form_dodaj_wpis();	
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "dodaj-dekoracje-zapis":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Dodaj dekorację");
				if(isset($_POST['c'])) { 
					
				$user_id=$_SESSION['user_id'];
				if(isset($_POST['rok'])) $rok=$_POST['rok'];
				if(isset($_POST['rodzaj'])) $rodzaj=$_POST['rodzaj'];
				if(isset($_POST['indeks2'])) $numer=$_POST['indeks2'];
							
				if(isset($_POST['indeks1'])) $indeks1=$_POST['indeks1'];
				if(isset($_POST['indeks3'])) $indeks3=$_POST['indeks3'];
				if(isset($_POST['indeks4'])) $indeks4=$_POST['indeks4'];
				if(isset($_POST['indeks5'])) $indeks5=$_POST['indeks5'];
				if(isset($_POST['numer'])) $nr=$_POST['numer'];
				
				$indeks=$indeks1.$numer.$indeks3.$indeks4.$indeks5;
				
				$q_numb=strlen($nr);
				if($q_numb<>7) {$komunikat->setText("Numer PK musi mieć 10 cyfr", "Zły format numeru PK"); $komunikat->showStatement(); htmlView::form_dodaj_dekoracje(); break;}
				
				$q_sign=strlen($indeks);
				if($q_sign<>10) {$komunikat->setText("Numer PK musi mieć 10 cyfr", "Zły format numeru PK"); $komunikat->showStatement(); htmlView::form_dodaj_dekoracje(); break;}
								
				if(isset($_POST['nazwa'])) $nazwa=$_POST['nazwa'];
				if($nazwa=="") {$komunikat->setText("Błąd", "Brak wpisanej nazwy dekoracji"); $komunikat->showStatement(); htmlView::form_dodaj_dekoracje(); break;}
				$data_ob = new DateTime();
				$data=$data_ob->format('Y-m-d G:i:s');
				$sesja=session_id();
				
				if(isset($_POST['opis'])) $opis=$_POST['opis'];
				if(isset($_POST['tagi'])) $tagi=str_replace(',',', ',$_POST['tagi']);
				if(isset($_POST['akwizycja'])) $akwizycja=$_POST['akwizycja']; else $akwizycja=0;
				if(isset($_POST['produkcja'])) $produkcja=$_POST['produkcja']; else $produkcja=0;
				if(isset($_POST['akwizycja_etc'])) $akwizycja_etc=$_POST['akwizycja_etc']; else $akwizycja_etc=0;
				if(isset($_POST['klient'])) $klient=$_POST['klient']; else $klient=0; 
				if(isset($_POST['data'])) $data=$_POST['data'];
				
				$praca=new DecorationOther();
				$Mpraca=new DecorationModel($praca);
					
				$praca->setKind($rodzaj);
				$praca->setIndeks($indeks);
				$praca->setNumber($numer);
				$praca->setYear($rok);
				$praca->setName($nazwa);
				$praca->setDescript($opis);
				$praca->setTags($tagi);
				$praca->setCanvassing($akwizycja);
				$praca->setCanvassingETC($akwizycja_etc);
				$praca->setProduction($produkcja);
				$praca->setCustomerId($klient);
				
				$praca->setDateAdd($data);
				$praca->setUserId($user_id);
						
				$id=$Mpraca->insert();
					
				PhotoModel::update_id_sess_decor($sesja,$id);
				
				if($id>0) $komunikat->setText("Dodano nowy indeks do bazy", "Prawidłowo dodano nową dekorację"); else
				$komunikat->setText("Błąd zapisu.", "Nie udało się dodać dekoracji");
				$komunikat->showStatement();
				}
				htmlView::form_dodaj_dekoracje($rok,$rodzaj,$klient);	
			} 
				else
			{
				htmlView::form_log();
			}
break;

case "edytuj":
	 if(mainSession::sprawdz_log_uzytk()) 
				{
					htmlView::panel_klienta();
					htmlView::strona_naglowek("Zobacz / Edytuj szczegóły wpisu");
					if(isset($_POST['id'])) {
					$id=$_POST['id'];
					htmlView::form_edytuj_wpis($id);
					}
				} 
			else
				{
					htmlView::form_log();
				}
break;

case "edytuj-dekoracje":
	 if(mainSession::sprawdz_log_uzytk()) 
				{
					htmlView::panel_klienta();
					htmlView::strona_naglowek("Zobacz / Edytuj szczegóły dekoracji");
					if(isset($_POST['id'])) {
					$id=$_POST['id'];
					htmlView::form_edytuj_dekor($id);
					}
				} 
			else
				{
					htmlView::form_log();
				}
break;

case "zapisz-wpis":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Zobacz / Edytuj szczegóły wpisu");
				if(isset($_POST['id'])) { $id=$_POST['id'];
				
				if(isset($_POST['rodzaj'])) $rodzaj=$_POST['rodzaj'];
				if(isset($_POST['numer'])) $numer=$_POST['numer'];
				if(isset($_POST['date_add'])) $date_add=$_POST['date_add'];
				if(isset($_POST['nazwa'])) $nazwa=$_POST['nazwa'];
				if(isset($_POST['opis'])) $opis=$_POST['opis'];
				if(isset($_POST['tagi'])) $tagi=str_replace(',',', ',$_POST['tagi']);
				if(isset($_POST['lokalizacja'])) $lokalizacja=$_POST['lokalizacja'];
	
				$praca=new IndexOther($id);
				$Mpraca=new IndexOtherModel($praca);
				$Mpraca->load();
				
				$praca->setNumber($numer);
				$praca->setName($nazwa);
				$praca->setDateAdd($date_add);
				$praca->setDescript($opis);
				$praca->setTags($tagi);
				$praca->setPath($lokalizacja);
				$praca->setKind($rodzaj);
				
				if($Mpraca->update()) $komunikat->setText("Zapisano wprowadzone zmiany.", "Zmiany zostały zapisane w bazie"); else
				$komunikat->setText("Błąd.", "Nie udało się zapisać zmian.");
				$komunikat->showStatement();
				htmlView::form_edytuj_wpis($id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "zapisz-dekoracje": 
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Zobacz / Edytuj szczegóły dekoracji");
				if(isset($_POST['id'])) { $id=$_POST['id'];
				
				if(isset($_POST['rok'])) $rok=$_POST['rok'];
				if(isset($_POST['rodzaj'])) $rodzaj=$_POST['rodzaj'];
				if(isset($_POST['indeks2'])) $numer=$_POST['indeks2'];
							
				if(isset($_POST['indeks1'])) $indeks1=$_POST['indeks1'];
				if(isset($_POST['indeks3'])) $indeks3=$_POST['indeks3'];
				if(isset($_POST['indeks4'])) $indeks4=$_POST['indeks4'];
				if(isset($_POST['indeks5'])) $indeks5=$_POST['indeks5'];
								
				$indeks=$indeks1.$numer.$indeks3.$indeks4.$indeks5;
								
				$q_sign=strlen($indeks);
				if($q_sign<>10) {$komunikat->setText("Numer PK musi mieć 10 cyfr", "Zły format numeru PK"); $komunikat->showStatement(); htmlView::form_edytuj_dekor($id); break;}
								
				if(isset($_POST['nazwa'])) $nazwa=$_POST['nazwa'];
				if($nazwa=="") {$komunikat->setText("Błąd", "Brak wpisanej nazwy dekoracji"); $komunikat->showStatement(); htmlView::form_edytuj_dekor($id); break;}
				
				$data_ob = new DateTime();
				$data=$data_ob->format('Y-m-d G:i:s');
				$sesja=session_id();
				
				if(isset($_POST['opis'])) $opis=$_POST['opis'];
				if(isset($_POST['tagi'])) $tagi=str_replace(',',', ',$_POST['tagi']);
				if(isset($_POST['akwizycja'])) $akwizycja=$_POST['akwizycja']; else $akwizycja=0;
				if(isset($_POST['produkcja'])) $produkcja=$_POST['produkcja']; else $produkcja=0;
				if(isset($_POST['akwizycja_etc'])) $akwizycja_etc=$_POST['akwizycja_etc']; else $akwizycja_etc=0;
				if(isset($_POST['klient'])) $klient=$_POST['klient']; else $klient=0; 
				if(isset($_POST['date_add'])) $date_add=$_POST['date_add'];
				
				$praca=new DecorationOther($id);
				$Mpraca=new DecorationModel($praca);
				$Mpraca->load();

				$praca->setKind($rodzaj);
				$praca->setIndeks($indeks);
				$praca->setNumber($numer);
				$praca->setYear($rok);
				$praca->setDateAdd($date_add);
				$praca->setName($nazwa);
				$praca->setDescript($opis);
				$praca->setTags($tagi);
				$praca->setCanvassing($akwizycja);
				$praca->setProduction($produkcja);
				$praca->setCanvassingETC($akwizycja_etc);
				$praca->setCustomerId($klient);
				
				$praca->setDateModified($data);
												
				if($Mpraca->update()) $komunikat->setText("Zapisano wprowadzone zmiany.", "Zmiany zostały zapisane w bazie"); else
				$komunikat->setText("Błąd.", "Nie udało się zapisać zmian.");
				$komunikat->showStatement();
				htmlView::form_edytuj_dekor($id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto-crop":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Kadruj miniaturę");
				if(isset($_POST['id'])) {$id=$_POST['id'];
				if(isset($_POST['foto_id'])) $foto_id=$_POST['foto_id'];

				htmlView::form_edytuj_miniatura($id,$foto_id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto-crop-zapisz":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Zobacz / Edytuj szczegóły wpisu");
				if(isset($_POST['id'])) {$id=$_POST['id'];
				if(isset($_POST['foto_id'])) $foto_id=$_POST['foto_id'];
				$max_w=Config::get("THUMB_MAX_WIDTH");
				$max_h=Config::get("THUMB_MAX_HEIGHT");
				
					$foto=new Photo($foto_id);
					$Mfoto=new PhotoModel($foto);
					$Mfoto->load();
				
					$file=Config::get("ROOT_DIR").Config::get("PHOTO_PATH").$foto->getPath();
					$file_min=Config::get("ROOT_DIR").Config::get("PHOTO_PATH")."thumbs/".$foto->getPath();

					$img_r = imagecreatefromjpeg($file);
					$dst_r = ImageCreateTrueColor( $_POST['w'], $_POST['h'] );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $_POST['w'],$_POST['h'],$_POST['w'],$_POST['h']);

					imagejpeg($dst_r,$file_min,100);
					
					$image=new Image($file_min);
					$scaled = $image->scale($max_w, $max_h, Image::PROP_SHRINK);
					$im=imagecreatetruecolor($max_w, $max_h);
	
					$white = imagecolorallocate($im, 255, 255, 255);
					imagefill($im, 0, 0, $white);
					$empty = new Image($im);
					
					$crop = $empty->merge($scaled, Image::HCENTER | Image::VCENTER);
					
					$crop->toJPG(Config::get("ROOT_DIR").Config::get("PHOTO_PATH")."thumbs/".$foto->getPath(),100);
					
					$komunikat->setText("Zapisano zmiany w miniaturce", "Zmiany zostały zapisane");
					$komunikat->showStatement();

				htmlView::form_edytuj_wpis($id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto-decor-crop":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Kadruj miniaturę");
				if(isset($_POST['id'])) {$id=$_POST['id'];
				if(isset($_POST['foto_id'])) $foto_id=$_POST['foto_id'];

				htmlView::form_edytuj_miniatura_decor($id,$foto_id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto-decor-crop-zapisz":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Zobacz / Edytuj szczegóły dekoracji");
				if(isset($_POST['id'])) {$id=$_POST['id'];
				if(isset($_POST['foto_id'])) $foto_id=$_POST['foto_id'];
				
				$max_w=Config::get("THUMB_MAX_WIDTH");
				$max_h=Config::get("THUMB_MAX_HEIGHT");
				
					$foto=new Photo($foto_id);
					$Mfoto=new PhotoModel($foto);
					$Mfoto->loadDecor();
				
					$file=Config::get("ROOT_DIR").Config::get("PHOTO_PATH").$foto->getPath();
					$file_min=Config::get("ROOT_DIR").Config::get("PHOTO_PATH")."thumbs/".$foto->getPath();

					$img_r = imagecreatefromjpeg($file);
					$dst_r = ImageCreateTrueColor( $_POST['w'], $_POST['h'] );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $_POST['w'],$_POST['h'],$_POST['w'],$_POST['h']);

					imagejpeg($dst_r,$file_min,100);
					
					$image=new Image($file_min);
					$scaled = $image->scale($max_w, $max_h, Image::PROP_SHRINK);
					$im=imagecreatetruecolor($max_w, $max_h);
	
					$white = imagecolorallocate($im, 255, 255, 255);
					imagefill($im, 0, 0, $white);
					$empty = new Image($im);
					
					$crop = $empty->merge($scaled, Image::HCENTER | Image::VCENTER);
					
					$crop->toJPG(Config::get("ROOT_DIR").Config::get("PHOTO_PATH")."thumbs/".$foto->getPath(),100);
					
					$komunikat->setText("Zapisano zmiany w miniaturce", "Zmiany zostały zapisane");
					$komunikat->showStatement();

				htmlView::form_edytuj_dekor($id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto-decor-usun":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Usuń screen dekoracji");
				if(isset($_POST['id'])) { $id=$_POST['id'];
				if(isset($_POST['foto_id'])) $foto_id=$_POST['foto_id'];
	
				$photo=new Photo($foto_id);
				$Mphoto=new PhotoModel($photo);
				$Mphoto->load();
							
				if($Mphoto->deleteDecor()) $komunikat->setText("Screen usunięto.", "Prawidłowo usunięto screen"); else
				$komunikat->setText("Błąd.", "Nie udało się usunąć pliku");
				$komunikat->showStatement();
				
				unset($photo); 
				unset($Mphoto);
				htmlView::form_edytuj_dekor($id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;

case "foto-usun":
	 if(mainSession::sprawdz_log_uzytk()) 
			{
				htmlView::panel_klienta();
				htmlView::strona_naglowek("Usuń screen wpisu");
				if(isset($_POST['id'])) { $id=$_POST['id'];
				if(isset($_POST['foto_id'])) $foto_id=$_POST['foto_id'];
	
				$photo=new Photo($foto_id);
				$Mphoto=new PhotoModel($photo);
				$Mphoto->load();
							
				if($Mphoto->delete()) $komunikat->setText("Screen usunięto.", "Prawidłowo usunięto screen"); else
				$komunikat->setText("Błąd.", "Nie udało się usunąć pliku");
				$komunikat->showStatement();
				
				unset($photo); 
				unset($Mphoto);
				htmlView::form_edytuj_wpis($id);
				}
			} 
			else
			{
				htmlView::form_log();
			}
break;
}
?>
    <p>&nbsp;</p>
    

</div>
</body>
</html>





