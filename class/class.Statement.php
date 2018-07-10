<?php 
/**
 * Klasa generująca komunikat
 *
 * @author Konrad Adamczyk
 *
 */
class Statement {
private $text1="";
private $text2="";
private $class="info";
private $id="nfo";
private $timeDelay=1500;
private $timeHide=500;
	
 public function __construct() {}

	public function setText($text1,$text2=False) 
	{
	$this->text1=$text1;
	$this->text2=$text2;	
	}
	
	public function setClass($class) 
	{
	$this->class=$class;	
	}

	public function setId($id) 
	{
	$this->id=$id;	
	}
	
	public function setTimeHide($time) 
	{
	$this->timeHide=$time;	
	}

	public function setTimeDelay($time) 
	{
	$this->timeDelay=$time;	
	}
	
	public function showStatement() 
	{
		?>
			<script>
			jQuery(document).ready(function(){
			jQuery('#<?php echo $this->id; ?>').delay(<?php echo $this->timeDelay; ?>).fadeOut(<?php echo $this->timeHide; ?>);
			});
			</script>
		<?php 
		echo "<div id='".$this->id."' class='".$this->class."'><h2>".$this->text1."</h2><h3>".$this->text2."</h3></div>";
	}	 
}
?>