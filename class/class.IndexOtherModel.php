<?php
/**
 * Klasa wykonująca operacje bazodanowe na obiekcie
 *
 * @author Konrad Adamczyk
 *
 */

class IndexOtherModel extends Model
{  
    /**
     * Zasób na którym będziemy wykonywać operacje
     * @access private
     */	
	private $index;

    /**
     * Konstruktor klasy.
     * @constructor
     * @param $index obiekt klasy index
     * @access public
     */	
 function __construct(IndexOther $index)
    {
    	$this->index = $index;
    }       

    /**
     * Ładuje dane z bazy danych do obiektu index 
     *
     * @access public
     */    
public function load()
	{
			$query=DB::prepare("select * from works where w_id=:id");
			$query->bindValue(':id', $this->index->getId(), PDO::PARAM_INT); 
			$query -> execute();  
			
		    $result = $query->fetch();
			$query -> closeCursor();
			
			$this->index->setNumber($result['number']);
			$this->index->setName($result['name']);
			$this->index->setDateAdd($result['date_add']);
			$this->index->setDescript($result['descript']);
			$this->index->setTags($result['tags']);
			$this->index->setKind($result['kind']);
			$this->index->setPath($result['path']);
			$this->index->setUserId($result['user_id']);
			return true;
	}
	
     /**
     * Wstawia nowy rekord do bazy 
     *
     * @return id, id nowego wpisu w bazie
     * @access public
     */     
public function insert()
	{
			 $db=DB::prepare("insert into works (number, name, date_add, descript, tags, kind, path, user_id)
	         values (:number, :name, :date_add, :descript, :tags, :kind, :path, :user_id)");

			 $db -> bindValue(':number', $this->index->getNumber(), PDO::PARAM_STR);
			 $db -> bindValue(':name', $this->index->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':date_add',  $this->index->getDateAdd(), PDO::PARAM_STR);
			 $db -> bindValue(':descript', $this->index->getDescript(), PDO::PARAM_STR);
			 $db -> bindValue(':tags', $this->index->getTags(), PDO::PARAM_STR);
			 $db -> bindValue(':kind', $this->index->getKind(), PDO::PARAM_INT);
			 $db -> bindValue(':path', $this->index->getPath(), PDO::PARAM_STR);
			 $db -> bindValue(':user_id', $this->index->getUserId(), PDO::PARAM_INT);            
			   
	    	 $db -> execute();     
	    	 $id=DB::lastInsertId();
	    	 return $id;  
	}

	 /**
     * Uaktualnia dane w bazie na podstawie danych obiektu index 
     *
     * @access public
     */ 
public function update()
	{
	         $db=DB::prepare("update works set number=:number, date_add=:date_add, name=:name, descript=:descript, tags=:tags, kind=:kind, path=:path where w_id=:id");
	         $db->bindValue(':id', $this->index->getId(), PDO::PARAM_INT);
	         $db -> bindValue(':number', $this->index->getNumber(), PDO::PARAM_STR);
	         $db -> bindValue(':date_add', $this->index->getDateAdd(), PDO::PARAM_STR);
			 $db -> bindValue(':name', $this->index->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':descript', $this->index->getDescript(), PDO::PARAM_STR);
			 $db -> bindValue(':tags', $this->index->getTags(), PDO::PARAM_STR);
			 $db -> bindValue(':kind', $this->index->getKind(), PDO::PARAM_INT);
			 $db -> bindValue(':path', $this->index->getPath(), PDO::PARAM_STR);
	         
	         $db -> execute();    
			 if ($db) return true; else return false;
	}	

	 /**
     * Usuwa obiekt z bazy oraz zdjęcia z nim związane 
     *
     * @access public
     */ 	
public function delete()
	{
			PhotoModel::deletePhotos($this->index->getId());
			
			$db=DB::prepare("delete from works where w_id=:id");
			$db->bindValue(':id', $this->index->getId(), PDO::PARAM_INT);
			
			$db -> execute();  
			if ($db) return true; else return false;	
	}	
       
    //  End of class
}
?>
