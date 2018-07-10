<?php
/**
 * Klasa obsługująca dekoracje w bazie
 *
 * @author Konrad Adamczyk
 *
 */
class Index extends ObjectBasic
{  
  protected $number;
  protected $descript;
  protected $tags;
  protected $kind;
  protected $user_id;
        
 function __construct($id=False)
    {
 	if(isset($id)) $this->id=$id;
    }       
    
public function getNumber()
    {
      	return $this->number;
    }

public function setNumber($val)
    {
      $this->number=$val;
    }
    
public function getDescript()
    {
      	return $this->descript;
    }

public function setDescript($val)
    {
      $this->descript=$val;
    }    

public function getTags()
    {
      	return $this->tags;
    }

public function setTags($val)
    {
      $this->tags=$val;
    }

public function getKind()
    {
      	return $this->kind;
    }

public function setKind($val)
    {
      $this->kind=$val;
    }

public function getUserId()
    {
      	return $this->user_id;
    }
        
public function setUserId($val)
    {
      $this->user_id=$val;
    }                
    //  End of class
}
?>
