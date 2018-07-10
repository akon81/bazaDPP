<?php
/**
 * Klasa wykonująca operacje na zdjęciach
 *
 * @author Konrad Adamczyk
 *
 */
class Photo extends ObjectBasic
{  
  private $path;
  private $position_sort;
  private $sess;
  private $visible;
  private $foreignKey;
  private $max_width = 800;
  private $max_height = 600;
  private $width;
  private $height;
      
 function __construct($id=False)
    {
 	if(isset($id)) $this->id=$id;
    }       
    
public function getPath()
    {
      	return $this->path;
    }

public function setPath($val)
    {
      $this->path=$val;
    }
    
public function getPosition()
    {
      	return $this->position_sort;
    }        

public function setPosition($val)
    {
      $this->position_sort=$val;
    }

public function getSess()
    {
      	return $this->sess;
    }        

public function setSess($val)
    {
      $this->sess=$val;
    }
    
public function getVisible()
    {
      	return $this->visible;
    } 

public function setVisible($val)
    {
      $this->visible=$val;
    }
        
public function getForeignKey()
    {
      	return $this->foreignKey;
    }    

public function setForeignKey($val)
    {
      $this->foreignKey=$val;
    }

public function getMaxWidth()
    {
      	return $this->max_width;
    }    

public function setMaxWidth($val)
    {
      $this->max_width=$val;
    }
        
public function getMaxHeight()
    {
      	return $this->max_height;
    }    

public function setMaxHeight($val)
    {
      $this->max_height=$val;
    }
    
public function getWidth()
    {
      	return $this->width;
    }     

public function setWidth($val)
    {
      $this->width=$val;
    }
        
public function getHeight()
    {
      	return $this->height;
    }     

public function setHeight($val)
    {
      $this->height=$val;
    }    
       
    //  End of class
}
?>
