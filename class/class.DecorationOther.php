<?php
require_once ("class.Index.php");

/**
 * Klasa rozszerzająca klasę index
 *
 * @author Konrad Adamczyk
 *
 */

class DecorationOther extends Index
{  
	private $year;
	private $indeks;
	private $customer_id;
	private $canvassing;
	private $canvassing_etc;
	private $production;
	private $date_modified;
	        
 function __construct($id=False)
    {
 	if(isset($id)) $this->id=$id;
    }       

public function getIndeks()
    {
      	return $this->indeks;
    }
        
public function setIndeks($val)
    {
      $this->indeks=$val;
    }  
        
public function getYear()
    {
      	return $this->year;
    }
        
public function setYear($val)
    {
      $this->year=$val;
    }   
        
public function getCustomerId()
    {
      	return $this->customer_id;
    }
        
public function setCustomerId($val)
    {
      $this->customer_id=$val;
    }    
    
public function getCanvassing()
    {
      	return $this->canvassing;
    }
        
public function setCanvassing($val)
    {
      $this->canvassing=$val;
    }

public function getCanvassingETC()
    {
      	return $this->canvassing_etc;
    }
        
public function setCanvassingETC($val)
    {
      $this->canvassing_etc=$val;
    }
        
public function getProduction()
    {
      	return $this->production;
    }
        
public function setProduction($val)
    {
      $this->production=$val;
    } 

public function getDateModified()
    {
      	return $this->date_modified;
    }
        
public function setDateModified($val)
    {
      $this->date_modified=$val;
    }     
    //  End of class
}
?>
