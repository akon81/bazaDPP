<?php
/**
 * Klasa obsługująca użytkownika bazy
 *
 * @author Konrad Adamczyk
 *
 */
class User
{  
  protected $id;
  protected $login;
  protected $pass;
  protected $name;
  protected $email;
  protected $date_rej;
  protected $date_last_log;
  protected $tatus;
  protected $avatar;
  protected $info;
    
 function __construct($id=False)
    {
    	if(isset($id)) $this->id=$id;
    }       
    
public function getId()
    {
      	return $this->id;
    }    
    
public function setId($id)
    {
      $this->id=$id;
    } 
        
public function getLogin()
    {
      	return $this->login;
    }

public function setLogin($val)
    {
      $this->login=$val;
    }
    
public function getPass()
    {
      	return $this->pass;
    }

public function setPass($val)
    {
      $this->pass=$val;
    }
    
public function getName()
    {
      	return $this->name;
    }

public function setName($val)
    {
      $this->name=$val;
    }

public function getEmail()
    {
      	return $this->email;
    }        

public function setEmail($val)
    {
      $this->email=$val;
    }
  
public function getInfo()
    {
      	return $this->info;
    } 

public function setInfo($val)
    {
      $this->info=$val;
    }
        
public function getDateRej()
    {
      	return $this->date_rej;
    }    

public function setDateRej($val)
    {
      $this->date_rej=$val;
    }

public function getDateLastLog()
    {
      	return $this->date_last_log;
    }    

public function setDateLastLog($val)
    {
      $this->date_last_log=$val;
    }
        
public function getStatus()
    {
      	return $this->status;
    }       

public function setStatus($val)
    {
      $this->status=$val;
    }
        
public function getAvatar()
    {
      	return $this->avatar;
    }
    
public function setAvatar($val)
    {
      $this->avatar=$val;
    }
        
    //  End of class
}
?>
