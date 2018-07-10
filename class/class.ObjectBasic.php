<?php
/**
 * Abstrakcyjna klasa uogólniająca obiekt
 *
 * @author Konrad Adamczyk
 *
 */

abstract class ObjectBasic
{  
  protected $id;
  protected $name;
  protected $date_add;

public function getId()
    {
      	return $this->id;
    }    
    
public function setId($id)
    {
      $this->id=$id;
    } 
        
public function getName()
    {
      	return $this->name;
    }

public function setName($val)
    {
      $this->name=$val;
    }

public function getDateAdd()
    {
      	return $this->date_add;
    }

public function setDateAdd($val)
    {
      $this->date_add=$val;
    }    
    //  End of class
}
?>
