<?php
require_once ("class.Index.php");

/**
 * Klasa rozszerzająca klasę index
 *
 * @author Konrad Adamczyk
 *
 */

class IndexOther extends Index
{  
	private $path;
        
 function __construct($id=False)
    {
 	if(isset($id)) $this->id=$id;
    }       
 
public function getPath()
    {
      	return $this->path;
    }    
    
public function setPath($path)
    {
      $this->path=$path;
    } 
    
    //  End of class
}
?>
