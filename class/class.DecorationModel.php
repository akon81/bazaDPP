<?php
/**
 * Klasa wykonująca operacje bazodanowe na dekoracji
 *
 * @author Konrad Adamczyk
 *
 */

class DecorationModel extends Model
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
 function __construct(DecorationOther $index)
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
			$query=DB::prepare("select * from decorations where id=:id");
			$query->bindValue(':id', $this->index->getId(), PDO::PARAM_INT); 
			$query -> execute();  
			
		    $result = $query->fetch();
			$query -> closeCursor();
			
			$this->index->setKind($result['kind']);
			$this->index->setIndeks($result['indeks']);			
			$this->index->setNumber($result['number']);
			$this->index->setYear($result['year']);
			$this->index->setDateAdd($result['date_add']);
			$this->index->setDateModified($result['date_modified']);
			$this->index->setName($result['name']);
			$this->index->setDescript($result['descript']);
			$this->index->setTags($result['tags']);
			$this->index->setCanvassing($result['canvassing']);
			$this->index->setProduction($result['production']);
			$this->index->setCanvassingETC($result['etc_canvassing']);
			$this->index->setCustomerId($result['customer_id']);
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
			 $db=DB::prepare("insert into decorations (kind, indeks, number, year, date_add, name, descript, tags, canvassing, production, etc_canvassing, customer_id, user_id)
	         values (:kind, :indeks, :number, :year, :date_add, :name, :descript, :tags, :canvassing, :production, :etc_canvassing, :customer_id, :user_id)");

			 $db -> bindValue(':kind', $this->index->getKind(), PDO::PARAM_INT);
			 $db -> bindValue(':indeks', $this->index->getIndeks(), PDO::PARAM_STR);
			 $db -> bindValue(':number', $this->index->getNumber(), PDO::PARAM_STR);
			 $db -> bindValue(':year', $this->index->getYear(), PDO::PARAM_STR);
			 $db -> bindValue(':date_add',  $this->index->getDateAdd(), PDO::PARAM_STR);
			 $db -> bindValue(':name', $this->index->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':descript', $this->index->getDescript(), PDO::PARAM_STR);
			 $db -> bindValue(':tags', $this->index->getTags(), PDO::PARAM_STR);
			 $db -> bindValue(':canvassing', $this->index->getCanvassing(), PDO::PARAM_INT);
			 $db -> bindValue(':production', $this->index->getProduction(), PDO::PARAM_INT);
			 $db -> bindValue(':etc_canvassing', $this->index->getCanvassingETC(), PDO::PARAM_INT);
			 $db -> bindValue(':customer_id', $this->index->getCustomerID(), PDO::PARAM_INT);
			 $db -> bindValue(':user_id', $this->index->getUserId(), PDO::PARAM_INT);            

				try {
				 $db -> execute();    
				} catch (PDOException $e) { DB::catch_mysql_error($e);	 	
				 die();
				 }
				 
	    	  
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
	         $db=DB::prepare("update decorations set kind=:kind, indeks=:indeks, number=:number, year=:year, date_add=:date_add, date_modified=:date_modified, name=:name, descript=:descript, tags=:tags, canvassing=:canvassing, production=:production, etc_canvassing=:etc_canvassing, customer_id=:customer_id where id=:id");
	         
	         $db -> bindValue(':kind', $this->index->getKind(), PDO::PARAM_INT);
	         $db -> bindValue(':indeks', $this->index->getIndeks(), PDO::PARAM_STR);
	         $db -> bindValue(':number', $this->index->getNumber(), PDO::PARAM_STR);
	         $db -> bindValue(':year', $this->index->getYear(), PDO::PARAM_STR);
	         $db -> bindValue(':date_add', $this->index->getDateAdd(), PDO::PARAM_STR);
	         $db -> bindValue(':date_modified', $this->index->getDateModified(), PDO::PARAM_STR);
			 $db -> bindValue(':name', $this->index->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':descript', $this->index->getDescript(), PDO::PARAM_STR);
			 $db -> bindValue(':tags', $this->index->getTags(), PDO::PARAM_STR);
			 $db -> bindValue(':canvassing', $this->index->getCanvassing(), PDO::PARAM_INT);
			 $db -> bindValue(':production', $this->index->getProduction(), PDO::PARAM_INT);
			 $db -> bindValue(':etc_canvassing', $this->index->getCanvassingETC(), PDO::PARAM_INT);
			 $db -> bindValue(':customer_id', $this->index->getCustomerID(), PDO::PARAM_INT);
			 $db->bindValue(':id', $this->index->getId(), PDO::PARAM_INT);
	         
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
			PhotoModel::deletePhotosDecor($this->index->getId());
			
			$db=DB::prepare("delete from decorations where id=:id");
			$db->bindValue(':id', $this->index->getId(), PDO::PARAM_INT);
			
			$db -> execute();  
			if ($db) return true; else return false;	
	}	
       
    //  End of class
}
?>
