<?php
/**
 * Zbiór metod statycznych do obsługi sesji
 *
 * @author Konrad Adamczyk
 *
 */
class mainSession {
   
    public function __construct() {}
    
    public function loguj($login, $pass)
    {
		   $query=DB::prepare("SELECT login,pass,user_id,status,name FROM users where login=:login and pass=:pass");
		   $query -> bindValue(':login', $login, PDO::PARAM_STR);
		   $query -> bindValue(':pass', $pass, PDO::PARAM_STR);
 				try {
			 		 $query -> execute(); 		
				 } catch (PDOException $e) { catch_mysql_error($e);	 	
				 	die();
				 }	
		 $row = $query->fetch();
		 $query -> closeCursor();

		  if (!$row) return false;   
		  
		  if ($row) { 
		   	ini_set('session.cookie_lifetime',0);

		   	$this->aktualizacja($login);
		   	
		   	$_SESSION['prawid_user']=$login; 
		   	$_SESSION['user_id']=$row['user_id']; 
		   	$_SESSION['status']=$row['status'];
		   	$_SESSION['name']=$row['name'];
		   
		    return true;}
    }
    
    private function aktualizacja($login)
    {
    	$data = new DateTime();
		$dat=$data->format('Y-m-d G:i:s');

		 $query=DB::prepare("update users set date_last_log=:data where login=:login"); 
		 $query -> bindValue(':login', $login, PDO::PARAM_STR);
		 $query -> bindValue(':data', $dat, PDO::PARAM_STR);
				 try {
			 		 $query -> execute(); 		
				 } catch (PDOException $e) { catch_mysql_error($e);	 	
				 	die();
				 }	
    }
    
    public static function sprawdz_log_uzytk()
    {
    		global $_SESSION;
			if (isset ($_SESSION['prawid_user'])) {
				return true;
			} else {
				return false;
			}
    }
    
	public static function ustaw_haslo($login, $email)
		{
			$nowe_haslo = mainSession::losowe_haslo(8);
			
			if ($nowe_haslo == false)
				return false;
		
			$haslo=sha1($nowe_haslo);
			try {
				$query=DB::exec ( "update users set pass='$haslo' where login='$login' and email='$email'" );
			} catch ( PDOException $e ) {
				catch_mysql_error ( $e );
				die ();
			}
			if ($query > 0)
				return $nowe_haslo; else return false;
		}

	public static function losowe_haslo($length) 
		{
	    $uppercase = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'W', 'Y', 'Z');
	    $lowercase = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'w', 'y', 'z');
	    $number = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	    $password = NULL;
	
	    for ($i = 0; $i < $length; $i++) {
	        $password .= $uppercase[rand(0, count($uppercase) - 1)];
	        $password .= $lowercase[rand(0, count($lowercase) - 1)];
	        $password .= $number[rand(0, count($number) - 1)];
	    }
	
	    return substr($password, 0, $length);
		}

    public static function wyloguj()
    {
    	if(isset($_SESSION['prawid_user'])) $stary_uzytk=$_SESSION['prawid_user']; else $stary_uzytk="";
		unset($_SESSION);
		$wynik_niszcz = session_destroy();
		$wylog[0]=$stary_uzytk;
		$wylog[1]=$wynik_niszcz;
		return $wylog;
    }
    

    public static function regeneruj()
    {
		if (! isset ( $_SESSION ['inicjuj'] )) {
			session_regenerate_id();
			$_SESSION ['inicjuj'] = true;
			$_SESSION ['ip'] = $_SERVER ['REMOTE_ADDR'];
		}
		return true;
	}
	
}
?>