<?php

/**
 * Klasa wykonująca operacje bazodanowe na zdjęciach
 *
 * @author Konrad Adamczyk
 *
 */
class PhotoModel extends Model
{  
	private $photo;
      
 function __construct(Photo $photo)
    {
    	$this->photo = $photo;
    }       

public function load()
	{
			$query=DB::prepare("select * from photo_works where photo_id=:id");
			$query->bindValue(':id', $this->photo->getId(), PDO::PARAM_INT); 
			$query -> execute();  
			
		    $result = $query->fetch();
			$query -> closeCursor();
			
			$this->photo->setName($result['name']);
			$this->photo->setPath($result['path']);
			$this->photo->setDateAdd($result['date_add']);
			$this->photo->setPosition($result['position']);
			$this->photo->setSess($result['sess']);
			$this->photo->setVisible($result['visible']);
			$this->photo->setForeignKey($result['w_id']);
	}

public function loadDecor()
	{
			$query=DB::prepare("select * from images where id=:id");
			$query->bindValue(':id', $this->photo->getId(), PDO::PARAM_INT); 
			$query -> execute();  
			
		    $result = $query->fetch();
			$query -> closeCursor();
			
			$this->photo->setName($result['name']);
			$this->photo->setPath($result['path']);
			$this->photo->setDateAdd($result['date_add']);
			$this->photo->setPosition($result['position']);
			$this->photo->setSess($result['sess']);
			$this->photo->setVisible($result['visible']);
			$this->photo->setForeignKey($result['decor_id']);
	}
	
public function insert()
	{
			$date = new DateTime();
			$date_add=$date->format('Y-m-d G:i:s');
	         
			 $db=DB::prepare("insert into photo_works (name, path, date_add, position, sess, visible, w_id)
	         values (:name, :path, :date_add, :position, :sess, :visible, :w_id)");
	
			 $db -> bindValue(':name', $this->photo->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':path', $this->photo->getPath(), PDO::PARAM_STR);
			 $db -> bindValue(':date_add', $date_add, PDO::PARAM_STR);
			 $db -> bindValue(':position', $this->photo->getPosition(), PDO::PARAM_INT);
			 $db -> bindValue(':sess', $this->photo->getSess(), PDO::PARAM_STR);
			 $db -> bindValue(':visible', $this->photo->getVisible(), PDO::PARAM_INT);
			 $db -> bindValue(':w_id', $this->photo->getForeignKey(), PDO::PARAM_INT);            
			   
	    	 $db -> execute();     
	    	 $id=DB::lastInsertId();
	    	 return $id;       
	}

public function insertDecor()
	{
			$date = new DateTime();
			$date_add=$date->format('Y-m-d G:i:s');
	         
			 $db=DB::prepare("insert into images (name, path, date_add, position, sess, visible, decor_id)
	         values (:name, :path, :date_add, :position, :sess, :visible, :decor_id)");
	
			 $db -> bindValue(':name', $this->photo->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':path', $this->photo->getPath(), PDO::PARAM_STR);
			 $db -> bindValue(':date_add', $date_add, PDO::PARAM_STR);
			 $db -> bindValue(':position', $this->photo->getPosition(), PDO::PARAM_INT);
			 $db -> bindValue(':sess', $this->photo->getSess(), PDO::PARAM_STR);
			 $db -> bindValue(':visible', $this->photo->getVisible(), PDO::PARAM_INT);
			 $db -> bindValue(':decor_id', $this->photo->getForeignKey(), PDO::PARAM_INT);            
			   
	    	 $db -> execute();     
	    	 $id=DB::lastInsertId();
	    	 return $id;       
	}
	
public function update()
	{				
	         $db=DB::prepare("update photo_works set name=:name, path=:path, position=:position, sess=:sess, visible=:visible where photo_id=:id");
	         $db->bindValue(':id', $this->photo->getId(), PDO::PARAM_INT);
	         $db -> bindValue(':name', $this->photo->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':path', $this->photo->getPath(), PDO::PARAM_STR);
			 $db -> bindValue(':position', $this->photo->getPosition(), PDO::PARAM_INT);
			 $db -> bindValue(':sess', $this->photo->getSess(), PDO::PARAM_STR);
			 $db -> bindValue(':visible', $this->photo->getVisible(), PDO::PARAM_INT); 
	         
	         $db -> execute();    
			 if ($db) return true; else return false;	
	}

public function updateDecor()
	{				
	         $db=DB::prepare("update images set name=:name, path=:path, position=:position, sess=:sess, visible=:visible where id=:id");
	         $db->bindValue(':id', $this->photo->getId(), PDO::PARAM_INT);
	         $db -> bindValue(':name', $this->photo->getName(), PDO::PARAM_STR);
			 $db -> bindValue(':path', $this->photo->getPath(), PDO::PARAM_STR);
			 $db -> bindValue(':position', $this->photo->getPosition(), PDO::PARAM_INT);
			 $db -> bindValue(':sess', $this->photo->getSess(), PDO::PARAM_STR);
			 $db -> bindValue(':visible', $this->photo->getVisible(), PDO::PARAM_INT); 
	         
	         $db -> execute();    
			 if ($db) return true; else return false;	
	}
	
public function delete()
	{
			$targetFolder=$_SERVER['DOCUMENT_ROOT'].Config::get("ROOT_DIR").Config::get("PHOTO_PATH").$this->photo->getPath();		
			unlink($targetFolder);
					
			$db=DB::prepare("delete from photo_works where photo_id=:id");
			$db->bindValue(':id', $this->photo->getId(), PDO::PARAM_INT);
			
			$db -> execute();  
			if ($db) return true; else return false;	
	}

public function deleteDecor()
	{
			$targetFolder=$_SERVER['DOCUMENT_ROOT'].Config::get("ROOT_DIR").Config::get("PHOTO_PATH").$this->photo->getPath();		
			unlink($targetFolder);
					
			$db=DB::prepare("delete from images where id=:id");
			$db->bindValue(':id', $this->photo->getId(), PDO::PARAM_INT);
			
			$db -> execute();  
			if ($db) return true; else return false;	
	}
		
public static function deletePhoto($id)
	{
			$db=DB::prepare("delete from photo_works where photo_id=:id");
			$db->bindValue(':id', $id, PDO::PARAM_INT);
			$db -> execute();  
			if ($db) return true; else return false;	
	}

public static function deletePhotoDecor($id)
	{
			$db=DB::prepare("delete from images where id=:id");
			$db->bindValue(':id', $id, PDO::PARAM_INT);
			$db -> execute();  
			if ($db) return true; else return false;	
	}
	
public static function deletePhotos($id)
	{
			$targetFolder=$_SERVER['DOCUMENT_ROOT'].Config::get("ROOT_DIR").Config::get("PHOTO_PATH");
			
			$query=DB::prepare("select path from photo_works where w_id=:id");
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();  
			foreach($query as $row)
				{
				unlink($targetFolder.$row['path']);
				unlink($targetFolder."thumbs/".$row['path']);				
				}
			$query -> closeCursor();;
	}

public static function deletePhotosDecor($id)
	{
			$targetFolder=$_SERVER['DOCUMENT_ROOT'].Config::get("ROOT_DIR").Config::get("PHOTO_PATH");
			
			$query=DB::prepare("select path from images where decor_id=:id");
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();  
			foreach($query as $row)
				{
				unlink($targetFolder.$row['path']);
				unlink($targetFolder."thumbs/".$row['path']);				
				}
			$query -> closeCursor();;
	}
	
public static function delete_old()
	{
			$targetFolder=$_SERVER['DOCUMENT_ROOT'].Config::get("ROOT_DIR").Config::get("PHOTO_PATH");
			//$query=DB::query("select photo_id,path from photo_works where DATEDIFF(CURDATE(),date_add)>5 and sess<>'NULL'");
			//$query -> execute();  
		//	foreach($query as $row)
			//	{
			//	unlink($targetFolder.$row['path']);
			//	unlink($targetFolder."thumbs/".$row['path']);				
				//PhotoModel::deletePhoto($row['photo_id']);	
			//	}
			//$query -> closeCursor();;
	}
	
public static function update_id_sess($sess,$id)
	{
		     $db=DB::prepare("update photo_works set sess=NULL, w_id=:w_id where sess=:sess");
	         $db->bindValue(':w_id', $id, PDO::PARAM_INT);
	         $db->bindValue(':sess', $sess, PDO::PARAM_STR);   
	         $db -> execute();    
	         
			 if ($db) return true; else return false;
	}

public static function update_id_sess_decor($sess,$id)
	{
		     $db=DB::prepare("update images set sess=NULL, decor_id=:decor_id where sess=:sess");
	         $db->bindValue(':decor_id', $id, PDO::PARAM_INT);
	         $db->bindValue(':sess', $sess, PDO::PARAM_STR);   
	         $db -> execute();    
	         
			 if ($db) return true; else return false;
	}
		
public static function getPhotolist($foreignKey)
	{
			$data=array();
			$query=DB::prepare("select photo_id,name,path from photo_works where w_id=:id order by date_add desc");
			$query -> bindValue(':id', $foreignKey, PDO::PARAM_INT);
			$query -> execute();
			$i=0;  
			foreach($query as $row)
				{
				$data[$i][0]=$row['photo_id'];
				$data[$i][1]=$row['name'];
				$data[$i][2]=$row['path'];
				$i++;				
				}
			$query -> closeCursor();
			return $data;
	}

public static function getPhotoDecorlist($foreignKey)
	{
			$data=array();
			$query=DB::prepare("select id,name,path from images where decor_id=:id order by date_add desc");
			$query -> bindValue(':id', $foreignKey, PDO::PARAM_INT);
			$query -> execute();
			$i=0;  
			foreach($query as $row)
				{
				$data[$i][0]=$row['id'];
				$data[$i][1]=$row['name'];
				$data[$i][2]=$row['path'];
				$i++;				
				}
			$query -> closeCursor();
			return $data;
	}
    //  End of class
}
?>
