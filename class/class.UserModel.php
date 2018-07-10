<?php
/**
 * Klasa wykonująca operacje bazodanowe na użytkowniku
 *
 * @author Konrad Adamczyk
 *
 */
class UserModel extends Model 
{  
	private $user;
	
 function __construct(User $user)
    {
    	$this->user = $user;
    }       
    
	public function load()
	{
		$zapyt=DB::prepare("select * from users where user_id=:id");
		$zapyt->bindValue(':id', $this->user->getId(), PDO::PARAM_INT); 
		
		$zapyt -> execute();  
		
	    $wynik = $zapyt->fetch();
		$zapyt -> closeCursor();
		
	  	$this->user->setLogin($wynik['login']);
	  	$this->user->setPass($wynik['pass']);
	  	$this->user->setName($wynik['name']);
	  	$this->user->setInfo($wynik['info']);
	  	$this->user->setEmail($wynik['email']);
	  	$this->user->setDateRej($wynik['date_rej']);
	  	$this->user->setDateLastLog($wynik['date_last_log']);
	  	$this->user->setStatus($wynik['status']);
	  	$this->user->setAvatar($wynik['avatar']);
	  	
	  	if($wynik) return true; else return false;
	}

	public function insert()
	{
		$data = new DateTime();
		$data_rej=$data->format('Y-m-d G:i:s');
		
		 $db=DB::prepare("insert into users (login, pass, name, email, date_rej, date_last_log, status, info, avatar)
         values (:login, :pass, :name, :email, :date_rej, :date_last_log, :status, :info, :avatar)");

         $db -> bindValue(':login', $this->user->getLogin(), PDO::PARAM_STR); 
         $db -> bindValue(':pass', $this->user->getPass(), PDO::PARAM_STR); 
         $db -> bindValue(':name', $this->user->getName(), PDO::PARAM_STR);
         $db -> bindValue(':email', $this->user->getEmail(), PDO::PARAM_STR); 	 
    	 $db -> bindValue(':date_rej', $data_rej, PDO::PARAM_STR);
    	 $db -> bindValue(':date_last_log', NULL, PDO::PARAM_STR);
    	 $db -> bindValue(':status', $this->user->getStatus(), PDO::PARAM_INT);  
    	 $db -> bindValue(':info', $this->user->getInfo(), PDO::PARAM_STR);
    	 $db -> bindValue(':avatar', $this->user->getAvatar(), PDO::PARAM_STR);     
    	 $db -> execute(); 
    	            
    	 $id=DB::lastInsertId();
    	 
		return $id;
	}

	public function update()
	{			
         $db=DB::prepare("update users set name=:name, email=:email, date_last_log=:date_last_log, status=:status, info=:info, avatar=:avatar where user_id=:id");
         $db->bindValue(':id', $this->user->getId(), PDO::PARAM_INT); 
         $db -> bindValue(':name', $this->user->getName(), PDO::PARAM_STR);
         $db -> bindValue(':email', $this->user->getEmail(), PDO::PARAM_STR); 	 
    	 $db -> bindValue(':date_last_log', $this->user->getDateLastLog(), PDO::PARAM_STR);
    	 $db -> bindValue(':status', $this->user->getStatus(), PDO::PARAM_INT);  
    	 $db -> bindValue(':info', $this->user->getInfo(), PDO::PARAM_STR);
    	 $db -> bindValue(':avatar', $this->user->getAvatar(), PDO::PARAM_STR);  
         $db -> execute();    
         
		 if ($db) return true; else return false;
	}
	
	public function delete()
	{
		$db=DB::prepare("delete from users where user_id=:id");
		$db->bindValue(':id', $this->user->getId(), PDO::PARAM_INT); 
		
		$db -> execute();  
		if($db) return true; else return false;
	}
	
	public function updatePass()
	{			
         $db=DB::prepare("update users set pass=:pass where user_id=:id");
         $db->bindValue(':id', $this->user->getId(), PDO::PARAM_INT);
         $db->bindValue(':pass', $this->user->getPass(), PDO::PARAM_STR);   
         $db -> execute();    
         
		 if ($db) return true; else return false;
	}
    //  End of class
}
?>
