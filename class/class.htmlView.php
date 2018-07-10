<?php

class htmlView {
   
    private function __construct() {}
   
    public static function form_log()
	    {
	    	$root_dir=Config::get("ROOT_DIR");
				?>
<div class="login">
  <p class="cent"><span class="opisw">ETC DPP - BAZA dekoracji</span> <span class="opisreszta">oraz prac niezwiązanych z porcelaną, emalią, szkłem (RÓŻNE)</span></p>
  				
		 <form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>zaloguj.html">
		    <table width="500" border="0" cellpadding="0" cellspacing="0" class="centab">
		      <tr>
		        <td width="354"><input name="login" type="text"  maxlength="120"  class="inputlog" id="login" placeholder="...wpisz login" /></td>
		        <td width="246" class="tekstlog">LOGIN</td>
		      </tr>
		      <tr>
		        <td><input name="haslo" type="password" maxlength="120" class="inputlog" id="haslo" placeholder="...wpisz hasło" /></td>
		        <td class="tekstlog">HASŁO</td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent"><input type="submit" class="zalog" value="Zaloguj"></p></td>
		      </tr>
		    </table>
		  </form>
		  </div>
  				<?php
	    }
    
    public static function wyswietl_zapomnij_form()
		{
			$root_dir=Config::get("ROOT_DIR");
		?>
				  			<div id="formularz_logowania">
			  			              <form class="logowanie" action="<?php echo $root_dir;?>haslo.html" method="post" name="formlog" id="formlog"/>
		                                <label for="zapytanie">Zapomniane hasło w systemie</label>
			                                <fieldset>
				                                <label>Podaj swój login</label>
				                                <input type="text" name="login"/>
				                                <label>Podaj swój adres email</label>
				                                <input type="text" name="email"/> 
				                                <input name="zap" value="wysl" type="hidden">         
				                                <input type="submit" name="zalog" value="generuj nowe hasło"/>
			                                </fieldset>
		                              </form>
			  			</div>
			<?php
		}
    
	public static function panel_klienta()
		{
			$root_dir=Config::get("ROOT_DIR");
		?>
		<div class="logindalej">
		  <p class="cent"><span class="opisw">ETC DPP - BAZA dekoracji</span> <span class="opisreszta">oraz prac niezwiązanych z porcelaną, emalią, szkłem (RÓŻNE)</span></p>			
		  <div class="szukajdalej"><a style="" class="pokazgraf" href="index.html">baza dekoracji</a><a class="pokazgraf" href="niezwiazane.html">rejestr prac niezwiązanych</a>
		    <form id="form1" name="form1" class="right" method="post" action="" style="display:none;" >
		      <input name="login" type="text"  maxlength="120"  class="inputszukaj" id="login" placeholder="...wpisz szukaną frazę"/>
		      <input type="button" class="szukajbut" value="szukaj">
		    </form>
		  </div>	
  			 <p style="clear:both">&nbsp;</p>
			<div id="panel_klienta"><span>Panel użytkownika:</span>
			        	<ul>
			        		<li><a href="<?php echo $root_dir;?>dodaj-dekoracje.html">Dodaj dekorację</a></li>
				        	<li><a href="<?php echo $root_dir;?>dodaj.html">Dodaj wpis do prac niezwiązanych</a></li>
				        	<li><a href="<?php echo $root_dir;?>klient.html">Klienci</a></li>
				        	<li><a href="<?php echo $root_dir;?>profil.html">Edytuj profil</a></li>
							<li><a href="<?php echo $root_dir;?>haslo.html">Zmień hasło</a></li>
							<li><a href="<?php echo $root_dir;?>wyloguj.html" class="red">Wyloguj się</a></li>
						</ul>
			</div>
		</div>
		<?php
		}
		
	public static function strona_naglowek($napis)
		{
			?>
			 <p style="clear:both">&nbsp;</p>
 			 <p class="opisreszta"><?php echo $napis;?></p>
 			 <div class="pasek"></div>
 			 	<div class="reszta">
  					<div class="srodek">
			<?php   						
		}

	public static function strona_naglowek1($napis)
		{
			?>
			 <p style="clear:both">&nbsp;</p>
 			 <p class="opisreszta"><?php echo $napis;?></p>
 			 <div class="pasek"></div>
 			 	<div class="reszta" style="display:49%;">
  					<div class="srodek">
			<?php   						
		}
		
		
	public static function profil_klienta($user)
		{
			$root_dir=Config::get("ROOT_DIR");
			?>
 		<form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>profil-zapisz.html">
		    <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		      <tr>
		      <td width="246" class="tekstform">NAZWISKO</td>
		        <td width="354"><input name="nazwisko" type="text"  maxlength="120"  class="inputlog" id="login" value="<?php echo $user->getName(); ?>" /></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">EMAIL</td>
		        <td width="354"><input name="email" type="text"  maxlength="120"  class="inputlog" id="login" value="<?php echo $user->getEmail(); ?>" /></td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent">
		        <?php 
		        $user=base64_encode(serialize($user));?>
		        <input type="hidden" name="user" value='<?php echo $user;?>'/>
		        <input type="submit" class="zalog" value="Zapisz zmiany"></p></td>
		      </tr>
		    </table>
		</form>
			  </div>
				</div>
			<?php 
		}
		
	public static function form_zmiana_hasla()
	{
		$root_dir=Config::get("ROOT_DIR");
	?>
	 	<form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>haslo-zmien.html">
		    <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		      <tr>
		      <td width="246" class="tekstform">STARE HASŁO</td>
		        <td width="354"><input name="stare_haslo" type="password"  maxlength="120"  class="inputlog" id="haslo1" placeholder="...wpisz stare hasło"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">NOWE HASŁO</td>
		        <td width="354"><input name="nowe_haslo" type="password"  maxlength="120"  class="inputlog" id="login" placeholder="...wpisz nowe hasło"" /></td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent">
		 		 <input type="hidden" name="c" value='1'/>
		        <input type="submit" class="zalog" value="Zmien hasło"></p></td>
		      </tr>
		    </table>
		</form>
			  </div>
				</div>
	<?php 	
	}

public static function form_dodaj_dekoracje($aktualny_rok=false,$rodzaj=false,$klient=false)
	{
		$root_dir=Config::get("ROOT_DIR");
			$date = new DateTime();
			$data=$date->format('Y-m-d G:i:s');
			
			$query_customers=DB::query("select * from customers order by name");
			$query_customers -> execute();  
		?>
		
		<script type="text/javascript">
	    	$(document).ready(function(){
	    		    		
	    	$('#tagi').tagsInput();
	    			
			<?php $timestamp = time();?>

			$('#filer_input1').filer({
				showThumbs: true,
				extensions: ['jpg', 'jpeg', 'png', 'gif'],
				captions: {
				 button: "Wybierz zdjęcia",
				    feedback: "Wybierz zdjęcia dekoracji do wgrania",
				    feedback2: "Zdjęcia zostały wybrane",
				    drop: "Wrzuć zdjęcia do wgrania",
				    removeConfirmation: "Jesteś pewien, że chcesz usunąć zdjęcie dekoracji?",
				},
				templates: {
					box: null
				},
				uploadFile:{
				    url: "uploadify_decor.php", 
				    data: {sess : '<?php echo session_id();?>',
	   				timestamp : '<?php echo $timestamp;?>',
	   				token     : '<?php echo md5('unique_salt' . $timestamp);?>'}, 
				    type: 'POST',
				    enctype: 'multipart/form-data', 
				    onComplete: function(data, el){
	   					jQuery('#komunikat').fadeIn(1000).delay(2000).fadeOut(1000);
	   				} ,
				    statusCode: null, 
				    onProgress: null
				}
			});
			
			$("#rok").change(function () {
				var rok=$('option:selected',this).val();
				$('#indeks3').val(rok);  
				$('#numer').val($('#indeks2').val()+'/'+rok);
			 });

			$("#rodzaj").change(function () {
				var rodz=$('option:selected',this).val();
				if(rodz==1) {$('#indeks1').val('01'); $('#indeks2').val('9');}  
				if(rodz==2) {$('#indeks1').val('01'); $('#indeks2').val('8');}
				if(rodz==3) {$('#indeks1').val('03'); $('#indeks2').val('5');}
				if(rodz==4) {$('#indeks1').val('02'); $('#indeks2').val('7');}
				if(rodz==5) {$('#indeks1').val('04'); $('#indeks2').val('7');}
				if(rodz==6) {$('#indeks1').val('05'); $('#indeks2').val('4');}	
				$('#numer').val($('#indeks2').val()+'/'+$('#rok').val());					
			 });

			$("#indeks2").keyup(function(){
				$('#numer').val($('#indeks2').val()+'/'+$('#rok').val());
			});


				function first_data()
				{
					var rodz=$('option:selected',$('#rodzaj')).val();
					if(rodz==1) {$('#indeks1').val('01'); $('#indeks2').val('9');}  
					if(rodz==2) {$('#indeks1').val('01'); $('#indeks2').val('8');}
					if(rodz==3) {$('#indeks1').val('03'); $('#indeks2').val('5');}
					if(rodz==4) {$('#indeks1').val('02'); $('#indeks2').val('7');}
					if(rodz==5) {$('#indeks1').val('04'); $('#indeks2').val('7');}
					if(rodz==6) {$('#indeks1').val('05'); $('#indeks2').val('4');}	
					$('#numer').val($('#indeks2').val()+'/'+$('#rok').val());
				}
				first_data();
				
				});
		</script>
		
	            <?php if($aktualny_rok==false) {$date=new DateTime(); $aktualny_rok=$date->format('y');}
	            if($rodzaj==false) {$rodzaj=1; }
	 			if($klient==false) {$klient=1; }
	            ?>  
	            
	                  
	 	<form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>dodaj-dekoracje-zapis.html">
		    <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		    <tr>
		    	<td width="246" class="tekstform" style="">Rok</td>
		        <td width="354"><select name="rok" id="rok" class="optinp">
		        <option value="07" <?php if($aktualny_rok=="07") echo "selected";?>>2007</option>
		        <option value="08" <?php if($aktualny_rok=="08") echo "selected";?>>2008</option>
		        <option value="09" <?php if($aktualny_rok=="09") echo "selected";?>>2009</option>
		        <option value="10" <?php if($aktualny_rok=="10") echo "selected";?>>2010</option>
		        <option value="11" <?php if($aktualny_rok=="11") echo "selected";?>>2011</option>
		        <option value="12" <?php if($aktualny_rok=="12") echo "selected";?>>2012</option>
		        <option value="13" <?php if($aktualny_rok=="13") echo "selected";?>>2013</option>
		        <option value="14" <?php if($aktualny_rok=="14") echo "selected";?>>2014</option>
		        <option value="15" <?php if($aktualny_rok=="15") echo "selected";?>>2015</option>
		        <option value="16" <?php if($aktualny_rok=="16") echo "selected";?>>2016</option>
		        <option value="17" <?php if($aktualny_rok=="17") echo "selected";?>>2017</option>
		        <option value="18" <?php if($aktualny_rok=="18") echo "selected";?>>2018</option>
		        <option value="19" <?php if($aktualny_rok=="19") echo "selected";?>>2019</option>
		        <option value="20" <?php if($aktualny_rok=="20") echo "selected";?>>2020</option>
		        <option value="21" <?php if($aktualny_rok=="21") echo "selected";?>>2021</option>
		        <option value="22" <?php if($aktualny_rok=="22") echo "selected";?>>2022</option>
		        <option value="23" <?php if($aktualny_rok=="23") echo "selected";?>>2023</option>
		        <option value="24" <?php if($aktualny_rok=="24") echo "selected";?>>2024</option>
		        <option value="25" <?php if($aktualny_rok=="25") echo "selected";?>>2025</option>
		        </select></td>
		      </tr>
		      
		    	<tr>
		    	<td width="246" class="tekstform">Rodzaj</td>
		        <td width="354">
		        <select name="rodzaj" id="rodzaj" class="optinp">
		        <option value="1" <?php if($rodzaj=="1") echo "selected";?>>PIWO [019]</option>
		        <option value="2" <?php if($rodzaj=="2") echo "selected";?>>SZKLO [018]</option>
		        <option value="3" <?php if($rodzaj=="3") echo "selected";?>>EMALIA [035]</option>
		        <option value="4" <?php if($rodzaj=="4") echo "selected";?>>NASZKLIWNA [027]</option>
		        <option value="5" <?php if($rodzaj=="5") echo "selected";?>>WSZKLIWNA [047]</option>
		        <option value="6" <?php if($rodzaj=="6") echo "selected";?>>NISKOTEMPERATUROWA [054]</option>
		        </select></td>
		      </tr>
		      
		      <tr>
		      <td width="246" class="tekstform">Indeks</td>
		        <td width="354"><span class="span_pk">[PK</span>
		        <input name="indeks1" type="text"  maxlength="2"  class="inputydl short shortinput1 inputdis" id="indeks1" value="" readonly />
		        <input name="indeks2" type="text"  maxlength="4"  class="inputydl short shortinput2" id="indeks2" value=""/>
		        <input name="indeks3" type="text"  maxlength="2"  class="inputydl short shortinput1 inputdis" id="indeks3" value="<?php echo  $aktualny_rok;?>" readonly/>
		        <select name="indeks4" id="indeks4" class="inputydl short shortinput3">
		        <option value="0">0 - 750x550</option>
		        <option value="1">1 - 850x650</option>
		        </select>
		     	<select name="indeks5" id="indeks5" class="inputydl short shortinput3">
		        <option value="0">0 - standardowa</option>
		        <option value="1">1 - triada</option>
		        <option value="2">2 - relief</option>
		        <option value="5">5 - imit.zlota</option>
		        <option value="7">7 - purpura</option>
		        <option value="8">8 - kobalt</option>
		        <option value="9">9 - zloto</option>
		        </select>
		        ]</td>		        
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Numer</td>
		        <td width="354"><input name="numer" type="text"  maxlength="10"  class="inputydl shortinput4 inputdis" id="numer" readonly value="/<?php echo  $aktualny_rok;?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Nazwa</td>
		        <td width="354"><input name="nazwa" type="text"  maxlength="120"  class="inputydl" id="nazwa" placeholder="...wpisz krótką nazwę"/></td>
		      </tr>
		      <tr>
		    	<td width="246" class="tekstform">Klient</td>
		        <td width="354">
		        <select name="klient" id="klient" class="optinp">
		        <?php foreach ($query_customers as $customer):?>
		        <option class="optinpw" <?php if($customer['id']==$klient) echo "selected";?> value="<?php echo $customer['id'];?>"><?php echo $customer['name'];?></option>
		        <?php endforeach;?>
		        </select></td>
		      </tr>	    
		      <tr>
		      <td width="246" class="tekstform"><label class="lab" for="akwizycja">Akwizycja</label></td>
		        <td width="354"><input name="akwizycja" class="incheck1" type="checkbox" id="akwizycja" value="1"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform"><label class="lab" for="produkcja">Produkcja</label></td>
		        <td width="354"><input name="produkcja" class="incheck1" type="checkbox" id="produkcja" value="1"/></td>
		      </tr>
		       <tr>
		      <td width="246" class="tekstform"><label class="lab" for="akwizycja_etc">Akwizycja ETC</label></td>
		        <td width="354"><input name="akwizycja_etc" class="incheck1" type="checkbox" id="akwizycja_etc" value="1"/></td>
		      </tr>	
		      <tr>
		      <td width="246" class="tekstform">Opis</td>
		        <td width="354"><textarea name="opis" cols="50" rows="6"  class="inputydld" id="opis" placeholder="...wpisz pełny opis"></textarea></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Tagi</td>
		        <td width="354"><input name="tagi" type="text"  maxlength="250"  class="inputlog" id="tagi" placeholder="...wpisz tagi"/></td>
		      </tr>
 		      <tr>
		      <td width="246" class="tekstform">Data dodania</td>
		        <td width="354"><input name="data" type="text"  maxlength="250"  class="inputlog" id="data" value="<?php echo $data;?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Dodaj screeny</td>
		        <td width="354"><input type="file" name="files[]" id="filer_input1" multiple="multiple"></td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent">
		 		 <input type="hidden" name="c" value='1'/>
		        <input type="submit" class="zalog" value="Dodaj do bazy"></p></td>
		      </tr>
		    </table>
		</form>
		
			<div id="komunikat" class="info" style="display:none;">
                        <h2>Zdjęcia wgrane na serwer.</h2> 
        	</div><!-- notification announcement -->
			  </div>
				</div>
		<?php 	
	}
	
	public static function form_dodaj_wpis()
	{
		$root_dir=Config::get("ROOT_DIR");
			$date = new DateTime();
			$data=$date->format('Y-m-d G:i:s');
		?>
		
		<script type="text/javascript">
	    	$(document).ready(function(){

	    	$('#tagi').tagsInput();
	    			
			<?php $timestamp = time();?>

			$('#filer_input1').filer({
				showThumbs: true,
				extensions: ['jpg', 'jpeg', 'png', 'gif'],
				captions: {
				 button: "Wybierz zdjęcia",
				    feedback: "Wybierz zdjęcia do wgrania",
				    feedback2: "Zdjęcia zostały wybrane",
				    drop: "Wrzuć zdjęcia do wgrania",
				    removeConfirmation: "Jesteś pewien, że chcesz usunąć zdjęcie?",
				},
				templates: {
					box: null
				},
				uploadFile:{
				    url: "uploadify_works.php", 
				    data: {sess : '<?php echo session_id();?>',
	   				timestamp : '<?php echo $timestamp;?>',
	   				token     : '<?php echo md5('unique_salt' . $timestamp);?>'}, 
				    type: 'POST',
				    enctype: 'multipart/form-data', 
				    onComplete: function(data, el){
	   					jQuery('#komunikat').fadeIn(1000).delay(2000).fadeOut(1000);
	   				} ,
				    statusCode: null, 
				    onProgress: null
				}
			});
			
			$("#rodzaj").change(function () { 
				if($('select option:selected').val()==1) $('#numer').val("off_"); else $('#numer').val("si_"); 
			 });
			
				});
		</script>
		
	
                    
	 	<form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>dodaj-wpis.html">
		    <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		    	<tr>
		      <td width="246" class="tekstform">Rodzaj</td>
		        <td width="354"><select name="rodzaj" id="rodzaj" class="optinp"><option class="optinpw" value="1">offset</option><option value="2">sito</option></select></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Numer pracy</td>
		        <td width="354"><input name="numer" type="text"  maxlength="10"  class="inputydl" id="numer" value="of_"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Nazwa</td>
		        <td width="354"><input name="nazwa" type="text"  maxlength="120"  class="inputydl" id="nazwa" placeholder="...wpisz krótką nazwę"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Opis</td>
		        <td width="354"><textarea name="opis" cols="50" rows="8"  class="inputydld" id="opis" placeholder="...wpisz pełny opis"></textarea></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Tagi</td>
		        <td width="354"><input name="tagi" type="text"  maxlength="250"  class="inputlog" id="tagi" placeholder="...wpisz tagi"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Lokalizacja</td>
		        <td width="354"><input name="lokalizacja" type="text"  maxlength="250"  class="inputydl" id="lokalizacja" value="PRACAMAC"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Data dodania</td>
		        <td width="354"><input name="data" type="text"  maxlength="250"  class="inputlog" id="data" value="<?php echo $data;?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Dodaj screeny</td>
		        <td width="354"><input type="file" name="files[]" id="filer_input1" multiple="multiple"></td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent">
		 		 <input type="hidden" name="c" value='1'/>
		        <input type="submit" class="zalog" value="Dodaj do bazy"></p></td>
		      </tr>
		    </table>
		</form>
		
			<div id="komunikat" class="info" style="display:none;">
                        <h2>Zdjęcia wgrane na serwer.</h2> 
        	</div><!-- notification announcement -->
			  </div>
				</div>
		<?php 	
	}
	
	public static function form_edytuj_dekor($id)
	{
		$root_dir=Config::get("ROOT_DIR");
				
		$wpis=new DecorationOther($id);
		$Mwpis=new DecorationModel($wpis);
		
		$Mwpis->load();
		
		$user=new User($wpis->getUserId());
		$Muser=new UserModel($user);
		$Muser->load();
		
		$query_customers=DB::query("select * from customers order by name");
		$query_customers -> execute();  
		?>
		<script type="text/javascript">
	    	$(document).ready(function(){

	    	$('#tagi').tagsInput();
	    			
			<?php $timestamp = time();?>

			$('#filer_input1').filer({
				showThumbs: true,
				extensions: ['jpg', 'jpeg', 'png', 'gif'],
				captions: {
				 button: "Wybierz zdjęcia",
				    feedback: "Wybierz zdjęcia do wgrania",
				    feedback2: "Zdjęcia zostały wybrane",
				    drop: "Wrzuć zdjęcia do wgrania",
				    removeConfirmation: "Jesteś pewien, że chcesz usunąć zdjęcie?",
				},
				templates: {
					box: null
				},
				uploadFile:{
				    url: "uploadify_decor.php", 
				    data: {
					'id' : '<?php echo $id;?>',
					sess : '<?php echo session_id();?>',
	   				timestamp : '<?php echo $timestamp;?>',
	   				token     : '<?php echo md5('unique_salt' . $timestamp);?>'}, 
				    type: 'POST',
				    enctype: 'multipart/form-data', 
				    onComplete: function(data, el){
					    odswiez_foto_list();
					    jQuery('#komunikat').fadeIn(1000).delay(2000).fadeOut(1000);
	   				} ,
				    statusCode: null, 
				    onProgress: null
				}
			});

		function odswiez_foto_list()
		{
			jQuery.ajaxSetup({async:false, cache:false});
			jQuery.ajax({
		  		  type: "POST",
		  		  url: "foto_list.php",
		  		  data: {id: <?php echo $id;?> },
		  		  dataType: "html",
		  		  success: function(prod){    
			  			jQuery("#foto_list").remove();
			  			jQuery("#foto_list_gora").append(prod); 
		  		  }
		  		 });
		}
		
		odswiez_foto_list();

		$("#rok").change(function () {
			var rok=$('option:selected',this).val();
			$('#indeks3').val(rok);  
			$('#numer').val($('#indeks2').val()+'/'+rok);
		 });

		$("#rodzaj").change(function () {
			var rodz=$('option:selected',this).val();
			if(rodz==1) {$('#indeks1').val('01'); $('#indeks2').val('9');}  
			if(rodz==2) {$('#indeks1').val('01'); $('#indeks2').val('8');}
			if(rodz==3) {$('#indeks1').val('03'); $('#indeks2').val('5');}
			if(rodz==4) {$('#indeks1').val('02'); $('#indeks2').val('7');}
			if(rodz==5) {$('#indeks1').val('04'); $('#indeks2').val('7');}
			if(rodz==6) {$('#indeks1').val('05'); $('#indeks2').val('4');}	
			$('#numer').val($('#indeks2').val()+'/'+$('#rok').val());					
		 });

			});
		</script>
		
	 	<form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>zapisz-dekoracje.html">
	 		
		    <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		  	  <tr>
		  	  <td width="246" class="tekstform">Dodane przez: </td>
		  	  <td width="354" class="tekst_szcz">
		  	  <img src="images/avatar/<?php echo $user->getLogin();?>.png" class="user-image profile-user-img  img-circle" alt="<?php echo $user->getName();?>" style="width: 60px; height: 60px;  margin-right: 10px; margin: 2px;" data-toggle="tooltip" title="<?php echo $user->getName();?>" data-original-title="<?php echo $user->getName();?>">
		  	  </td>
		  	  </tr>
		  	  <tr>
		      <td width="246" class="tekstform">Data dodania</td>
		        <td width="354"><input name="date_add" type="text"  maxlength="120"  class="inputydl" id="date_add" value="<?php echo $wpis->getDateAdd();?>"/></td>
		      </tr>
		  	  <?php if($wpis->getDateModified()) {?>
		  	   <tr>
		  	  <td width="246" class="tekstform">Data modyfikacji: </td>
		  	  <td width="354">&nbsp;&nbsp;&nbsp;<?php echo $wpis->getDateModified();?></td>
		  	  </tr>
		  	  <?php } ?>
		  	  <tr>
		      	<td width="246" class="tekstform">Rok</td>
		        <td width="354">
			        <select name="rok" id="rok" class="optinp">
			        <option value="07" <?php if($wpis->getYear()==7) echo "selected";?>>2007</option>
			        <option value="08" <?php if($wpis->getYear()==8) echo "selected";?>>2008</option>
			        <option value="09" <?php if($wpis->getYear()==9) echo "selected";?>>2009</option>
			        <option value="10" <?php if($wpis->getYear()==10) echo "selected";?>>2010</option>
			        <option value="11" <?php if($wpis->getYear()==11) echo "selected";?>>2011</option>
			        <option value="12" <?php if($wpis->getYear()==12) echo "selected";?>>2012</option>
			        <option value="13" <?php if($wpis->getYear()==13) echo "selected";?>>2013</option>
			        <option value="14" <?php if($wpis->getYear()==14) echo "selected";?>>2014</option>
			        <option value="15" <?php if($wpis->getYear()==15) echo "selected";?>>2015</option>
			        <option value="16" <?php if($wpis->getYear()==16) echo "selected";?>>2016</option>
			        <option value="17" <?php if($wpis->getYear()==17) echo "selected";?>>2017</option>
			        <option value="18" <?php if($wpis->getYear()==18) echo "selected";?>>2018</option>
			        <option value="19" <?php if($wpis->getYear()==19) echo "selected";?>>2019</option>
			        <option value="20" <?php if($wpis->getYear()==20) echo "selected";?>>2020</option>
			        <option value="21" <?php if($wpis->getYear()==21) echo "selected";?>>2021</option>
			        <option value="22" <?php if($wpis->getYear()==22) echo "selected";?>>2022</option>
			        <option value="23" <?php if($wpis->getYear()==23) echo "selected";?>>2023</option>
			        <option value="24" <?php if($wpis->getYear()==24) echo "selected";?>>2024</option>
			        <option value="25" <?php if($wpis->getYear()==25) echo "selected";?>>2025</option>
			        </select>
			      </td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Rodzaj</td>
		        <td width="354">
			        <select name="rodzaj" id="rodzaj" class="optinp">
				        <option value="1" <?php if($wpis->getKind()==1) echo "selected";?>>PIWO [019]</option>
				        <option value="2" <?php if($wpis->getKind()==2) echo "selected";?>>SZKLO [018]</option>
				        <option value="3" <?php if($wpis->getKind()==3) echo "selected";?>>EMALIA [035]</option>
				        <option value="4" <?php if($wpis->getKind()==4) echo "selected";?>>NASZKLIWNA [027]</option>
				        <option value="5" <?php if($wpis->getKind()==5) echo "selected";?>>WSZKLIWNA [047]</option>
				        <option value="6" <?php if($wpis->getKind()==6) echo "selected";?>>NISKOTEMPERATUROWA [054]</option>
			        </select>
			    </td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Indeks</td>
		       	<td width="354"><span class="span_pk">[PK</span>
			        <input name="indeks1" type="text"  maxlength="2"  class="inputydl short shortinput1 inputdis" id="indeks1" value="<?php echo $wpis->getIndeks()[0].$wpis->getIndeks()[1]; ?>" readonly />
			        <input name="indeks2" type="text"  maxlength="4"  class="inputydl short shortinput2" id="indeks2" value="<?php echo $wpis->getNumber(); ?>"/>
			        <input name="indeks3" type="text"  maxlength="2"  class="inputydl short shortinput1 inputdis" id="indeks3" value="<?php echo $wpis->getYear(); ?>" readonly/>
			        <select name="indeks4" id="indeks4" class="inputydl short shortinput3">
			        <option value="0" <?php if($wpis->getIndeks()[8]==0) echo "selected"; ?>>0 - 750x550</option>
			        <option value="1" <?php if($wpis->getIndeks()[8]==1) echo "selected"; ?>>1 - 850x650</option>
			        </select>
			     	<select name="indeks5" id="indeks5" class="inputydl short shortinput3">
			        <option value="0" <?php if($wpis->getIndeks()[9]==0) echo "selected"; ?>>0 - standardowa</option>
			        <option value="1" <?php if($wpis->getIndeks()[9]==1) echo "selected"; ?>>1 - triada</option>
			        <option value="2" <?php if($wpis->getIndeks()[9]==2) echo "selected"; ?>>2 - relief</option>
			        <option value="5" <?php if($wpis->getIndeks()[9]==5) echo "selected"; ?>>5 - imit.zlota</option>
			        <option value="7" <?php if($wpis->getIndeks()[9]==7) echo "selected"; ?>>7 - purpura</option>
			        <option value="8" <?php if($wpis->getIndeks()[9]==8) echo "selected"; ?>>8 - kobalt</option>
			        <option value="9" <?php if($wpis->getIndeks()[9]==9) echo "selected"; ?>>9 - zloto</option>
			        </select>
		        ]</td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Nazwa</td>
		        <td width="354"><input name="nazwa" type="text"  maxlength="120"  class="inputydl" id="nazwa" value="<?php echo $wpis->getName();?>"/></td>
		      </tr>
		      <tr>
		    	<td width="246" class="tekstform">Klient</td>
		        <td width="354">
		        <select name="klient" id="klient" class="optinp">
		        <?php foreach ($query_customers as $customer):?>
		        <option class="optinpw" value="<?php echo $customer['id'];?>" <?php if($wpis->getCustomerId()==$customer['id']) echo "selected";?>><?php echo $customer['name'];?></option>
		        <?php endforeach;?>
		        </select></td>
		      </tr>	
		      <tr>
		      <tr>
		      <td width="246" class="tekstform"><label class="lab" for="akwizycja">Akwizycja</label></td>
		        <td width="354"><input name="akwizycja" class="incheck1" type="checkbox" id="akwizycja" value="1" <?php if($wpis->getCanvassing()==1) echo "checked";?>/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform"><label class="lab" for="produkcja">Produkcja</label></td>
		        <td width="354"><input name="produkcja" class="incheck1" type="checkbox" id="produkcja" value="1" <?php if($wpis->getProduction()==1) echo "checked";?>/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform"><label class="lab" for="akwizycja">Akwizycja ETC</label></td>
		        <td width="354"><input name="akwizycja_etc" class="incheck1" type="checkbox" id="akwizycja_etc" value="1" <?php if($wpis->getCanvassingETC()==1) echo "checked";?>/></td>
		      </tr>
		      <tr>	
		      <td width="246" class="tekstform">Opis</td>
		        <td width="354"><textarea name="opis" cols="50" rows="8"  class="inputydld" id="opis"><?php echo $wpis->getDescript();?></textarea></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Tagi</td>
		        <td width="354"><input name="tagi" type="text"  maxlength="250"  class="inputlog" id="tagi" value="<?php echo $wpis->getTags();?>"/></td>
		      </tr>   
		      <tr>
		      <tr>
		      <td width="246" class="tekstform">Dodaj screeny</td>
		        <td width="354"><input type="file" name="files[]" id="filer_input1" multiple="multiple"></td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent">
		 		 <input type="hidden" name="id" value="<?php echo $id;?>"/>
		        <input type="submit" class="zalog" value="Zapisz zmiany bazy"></p></td>
		      </tr>
		    </table>
		</form>
		<br />
		<div id="komunikat" class="info" style="display:none;">
                        <h2>Zdjęcia wgrane na serwer.</h2> 
        	</div><!-- notification announcement -->
        	
			<div id="foto_list_gora">
				<div id="foto_list"></div>
			</div>

			  </div>
				</div>
		<?php 	
	}
	
	public static function form_edytuj_wpis($id)
	{
		$root_dir=Config::get("ROOT_DIR");
		
		$wpis=new IndexOther($id);
		$Mwpis=new IndexOtherModel($wpis);
		$Mwpis->load();
		$photolist=PhotoModel::getPhotolist($wpis->getId());
		$targetFolder=Config::get("ROOT_DIR").Config::get("PHOTO_PATH");
		
		$user=new User($wpis->getUserId());
		$Muser=new UserModel($user);
		$Muser->load();
		
		?>
		
		<script type="text/javascript">
	    	$(document).ready(function(){

	    	$('#tagi').tagsInput();
	    			
			<?php $timestamp = time();?>

			$('#filer_input1').filer({
				showThumbs: true,
				extensions: ['jpg', 'jpeg', 'png', 'gif'],
				captions: {
				 button: "Wybierz zdjęcia",
				    feedback: "Wybierz zdjęcia do wgrania",
				    feedback2: "Zdjęcia zostały wybrane",
				    drop: "Wrzuć zdjęcia do wgrania",
				    removeConfirmation: "Jesteś pewien, że chcesz usunąć zdjęcie?",
				},
				templates: {
					box: null
				},
				uploadFile:{
				    url: "uploadify_works.php", 
				    data: {
					'id' : '<?php echo $id;?>',
					sess : '<?php echo session_id();?>',
	   				timestamp : '<?php echo $timestamp;?>',
	   				token     : '<?php echo md5('unique_salt' . $timestamp);?>'}, 
				    type: 'POST',
				    enctype: 'multipart/form-data', 
				    onComplete: function(data, el){
	   					jQuery('#komunikat').fadeIn(1000).delay(2000).fadeOut(1000);
	   				} ,
				    statusCode: null, 
				    onProgress: null
				}
			});
			
				});
		</script>
		
	 	<form id="form1" name="form1" method="post" action="<?php echo $root_dir;?>zapisz-wpis.html">
	 		
		    <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		  	  <tr>
		  	  <td width="246" class="tekstform">Dodane przez: </td>
		  	  <td width="354" class="tekst_szcz"><img src="images/avatar/<?php echo $user->getLogin();?>.png" class="user-image profile-user-img  img-circle" alt="<?php echo $user->getName();?>" style="width: 60px; height: 60px;  margin-right: 10px; margin: 2px;" data-toggle="tooltip" title="<?php echo $user->getName();?>" data-original-title="<?php echo $user->getName();?>"></td>
		  	  </tr>
		  	  <tr>
		  	  <td width="246" class="tekstform">Dodano do bazy: </td>
		  	  <td width="354"><input name="date_add" type="text"  maxlength="120" class="inputydl" id="date_add" value="<?php echo $wpis->getDateAdd();?>"/></td>
		  	  </tr>
		    	<tr>
		      <td width="246" class="tekstform">Rodzaj</td>
		        <td width="354"><select name="rodzaj" class="optinp"><option class="optinpw" value="1" <?php if($wpis->getKind()==1) echo "selected";?>>offset</option><option value="2" <?php if($wpis->getKind()==2) echo "selected";?>>sito</option></select></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Numer pracy</td>
		        <td width="354"><input name="numer" type="text"  maxlength="10"  class="inputydl" id="numer" value="<?php echo $wpis->getNumber();?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Nazwa</td>
		        <td width="354"><input name="nazwa" type="text"  maxlength="120"  class="inputydl" id="nazwa" value="<?php echo $wpis->getName();?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Opis</td>
		        <td width="354"><textarea name="opis" cols="50" rows="8"  class="inputydld" id="opis"><?php echo $wpis->getDescript();?></textarea></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Tagi</td>
		        <td width="354"><input name="tagi" type="text"  maxlength="250"  class="inputlog" id="tagi" value="<?php echo $wpis->getTags();?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Lokalizacja</td>
		        <td width="354"><input name="lokalizacja" type="text"  maxlength="250"  class="inputydl" id="lokalizacja" value="<?php echo $wpis->getPath();?>"/></td>
		      </tr>
		      <tr>
		      <td width="246" class="tekstform">Dodaj screeny</td>
		        <td width="354"><input type="file" name="files[]" id="filer_input1" multiple="multiple"></td>
		      </tr>
		      <tr>
		        <td colspan="2"><p class="cent">
		 		 <input type="hidden" name="id" value="<?php echo $id;?>"/>
		        <input type="submit" class="zalog" value="Zapisz zmiany bazy"></p></td>
		      </tr>
		    </table>
		</form>
		<br />
		
		  <table width="600" border="0" cellpadding="1" cellspacing="0" class="centab">
		<?php 
		$i=0;
		$data=new DateTime();
		$rand=$data->format("i:s");
		foreach ($photolist as $photo => $row)
		{
			$i++;
		if($i==1) {
		?>
		 <tr><td colspan="2" class="tekstform">Screeny dodane do wpisu:</td></tr>
		<?php	
		}
		?>
		<tr><td><a href="<?php echo $targetFolder.$row[2];?>" target="_blank"><img src="<?php echo $targetFolder."thumbs/".$row[2].'?'.$rand; ?>"/></a></td>
		<td>
		<form action="<?php echo $root_dir;?>foto-usun.html" method="post"><input type="hidden" name="foto_id" value="<?php echo $row[0];?>"/><input type="hidden" name="id" value="<?php echo $id;?>"/><input type="submit" class="zalog" value="Usuń screen"></form>
		<form action="<?php echo $root_dir;?>foto-crop.html" method="post"><input type="hidden" name="foto_id" value="<?php echo $row[0];?>"/><input type="hidden" name="id" value="<?php echo $id;?>"/><input type="submit" class="zalog" value="Kadruj miniaturę"></form>
		</td></tr>
		<?php 
		}
		?>
		</table>
			  </div>
				</div>
		<?php 	
	}
	
	public static function form_edytuj_miniatura_decor($id,$foto_id)
{
	$root_dir=Config::get("ROOT_DIR");
	
	$foto=new Photo($foto_id);
	$Mfoto=new PhotoModel($foto);
	$Mfoto->loadDecor();
	
	$file=Config::get("ROOT_DIR").Config::get("PHOTO_PATH").$foto->getPath();
	
	?>
		<script language="Javascript">

			$(function(){

				$('#cropbox').Jcrop({
				
					onSelect: updateCoords
				});

			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Wybierz obszar miniaturki i naciśnij przycisk');
				return false;
			};

		</script>
	<div id="outer">
	<div class="jcExample">
	<div class="article">

		<h3>Miniaturka - edycja</h3>
			<h4>Zaznacz obszar i naciśnij przycisk</h4>
		<img src="<?php echo $file;?>" id="cropbox"/>

		   <form action="<?php echo $root_dir;?>foto-decor-crop-zapisz.html" method="post" onsubmit="return checkCoords();">
			<input type="hidden" name="id" value="<?php echo $id;?>" />
			<input type="hidden" name="foto_id" value="<?php echo $foto_id;?>" />
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input class="zalog"  type="submit" value="Zapisz miniaturkę"/>
		</form>

	</div>
	</div>
	</div>
			  </div>
				</div>
<?php 
}
	
	public static function form_edytuj_miniatura($id,$foto_id)
{
	$root_dir=Config::get("ROOT_DIR");
	
	$foto=new Photo($foto_id);
	$Mfoto=new PhotoModel($foto);
	$Mfoto->load();
	
	$file=Config::get("ROOT_DIR").Config::get("PHOTO_PATH").$foto->getPath();
	
	?>
		<script language="Javascript">

			$(function(){

				$('#cropbox').Jcrop({
				
					onSelect: updateCoords
				});

			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Wybierz obszar miniaturki i naciśnij przycisk');
				return false;
			};

		</script>
	<div id="outer">
	<div class="jcExample">
	<div class="article">

		<h3>Miniaturka - edycja</h3>
			<h4>Zaznacz obszar i naciśnij przycisk</h4>
		<img src="<?php echo $file;?>" id="cropbox"/>

		   <form action="<?php echo $root_dir;?>foto-crop-zapisz.html" method="post" onsubmit="return checkCoords();">
			<input type="hidden" name="id" value="<?php echo $id;?>" />
			<input type="hidden" name="foto_id" value="<?php echo $foto_id;?>" />
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input class="zalog"  type="submit" value="Zapisz miniaturkę"/>
		</form>

	</div>
	</div>
	</div>

			  </div>
				</div>
<?php 
}

	public static function form_lista_prac($gr=False)
		{
		$root_dir=Config::get("ROOT_DIR");
		if(!$gr) $grupa=0; else $grupa=$gr;
		?>
		<script type="text/javascript">
		jQuery(document).ready(function(){

		var oTable = jQuery('#prace_table').dataTable({
			"aoColumnDefs": [
		                        { "bSearchable": true, "bVisible": false, "aTargets": [ 5,7 ] }
		                    ],
			"sPaginationType": "full_numbers",
			"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Wszystkie"]],
			"iDisplayLength": 25,
			"bStateSave": true,
			"bProcessing": false,
		    "bServerSide": true,
		    "aaSorting": [[ 0, "desc" ]],
		    "sAjaxSource": "ajax/ajax_prace_lista.php",
		    <?php if($grupa>0) {?>
	        "fnServerParams": function ( aoData ) {
	            aoData.push( { "name": "sSearch_7", "value": "<?php echo $grupa;?>" } );
	        },
	        <?php } ?>
			"fnDrawCallback": function(oSettings) {
			jQuery('.stdtable .pencil').click(function(){
			var id=jQuery(this).find('span').text();
			jQuery('#id').val(id); 
			jQuery('#form_edit').submit(); 
				// otworz edycje
			});

			jQuery('.stdtable .trash').click(function(){
				var id=jQuery(this).prev().find('span').text(); 
				jQuery("#dialog-potwierdz").dialog({
					 resizable: false,
					 width:350,
					 height:200,
					 modal: false,
					 closeText: "zamknij", 
					 buttons: {
					 "Usuń": function() {
					jQuery.ajaxSetup({async:false, cache:false});
					jQuery.post("ajax/ajax_prace_usun.php",{pid: id}, function(data){if(data==1) {oTable.fnDraw();  jQuery('#komunikat_del').fadeIn(1000).delay(2000).fadeOut(1000);} else {jQuery('#komunikat_del_error').fadeIn(1000).delay(2000).fadeOut(1000);} }, "json");
					jQuery( this ).dialog( "close" ); 
					 },
					 Anuluj: function() {
						 jQuery( this ).dialog( "close" );
					 }
					 }
					 });
			});

			jQuery('.lbox').click(function(){
				var ff=jQuery(this);
				var id=jQuery(this).find('span').text();
				jQuery('.added').remove();
				jQuery.ajaxSetup({async:false, cache:false});
				jQuery.ajax({
					  type: "POST",
					  url: "ajax/ajax_lightbox.php",
					  data: {pid: id },
					  dataType: "html",
					  success: function(li){ 
						  ff.append(li);			    			
					  }
					 });
			});

			jQuery( "#prace_table td" ).hover(
					function() {
						jQuery(this).parent().find("td").addClass( "zebra" );
						}, function() {
						jQuery(this).parent().find("td").removeClass( "zebra" );
				});

	        }
		}); 

	});
	</script>
	
	<div id="radio_kind">
		<a class="rodzajgraf <?php if($grupa==0) echo "active";?>" href="index.html">Wszystkie</a> <a class="rodzajgraf <?php if($grupa==1) echo "active";?>" href="offset.html">&nbsp;&nbsp;OFFSET</a> <a class="rodzajgraf <?php if($grupa==2) echo "active";?>" href="sito.html">&nbsp;&nbsp;&nbsp;SITO</a>
	</div>
	
         			<div id="komunikat_del" class="info" style="display:none;">
                        <h2>Praca została usunięta z bazy danych.</h2> 
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_del_error" class="info" style="display:none;">
                        <h2>Wystąpił nieoczekiwany błąd. Nie udało się usunąć pracy z bazy. Jeśli problem będzie się powtarzał proszę o kontakt.</h2>
                    </div>
                    
                <div id="tab_lista">
				<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="prace_table">
                    <colgroup>
                        <col class="con0" style="width: 7%"/>
                        <col class="con1" style="width: 7%"/>
                        <col class="con0" style="width: 320px;"/>
                        <col class="con1" />
                        <col class="con0"  style="width: 20%"/>
                        <col class="con1"  style="width: 10%"/>
                        <col class="con0"/>
                      
                    </colgroup>
                    <thead>
                        <tr>
                      		<th class="head0">Numer</th>
                      	    <th class="head1">Data utw.</th>
                      	    <th class="head0">Screen</th>
                            <th class="head1">Nazwa</th>
                            <th class="head0">Opis</th>
                            <th class="head1">Tagi</th>
                            <th class="head0">Edycja/Usuń</th>
                      
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                      		<th class="head0">Numer</th>
                      	    <th class="head1">Data utw.</th>
                      	    <th class="head0">Screen</th>
                            <th class="head1">Nazwa</th>
                            <th class="head0">Opis</th>
                            <th class="head1">Tagi</th>
                            <th class="head0">Edycja/Usuń</th>
                           
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
				</div> <!--tab_lista-->
				
				<form id="form_edit" action="edytuj.html" method="post">
				<input type="hidden" name="id" id="id" value="0"/>
				</form>
				
				<div id="dialog-potwierdz" title="Na pewno usunąć pracę z bazy?" style="display: none;">
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Jesteś pewien, że chcesz usunąć pracę?</p>
				</div>
				

		<?php
		}
		
	public static function form_lista_dekoracji($gr=False)
		{
		$root_dir=Config::get("ROOT_DIR");
		if(!$gr) $grupa=0; else $grupa=$gr;
		?>
		<script type="text/javascript">
		jQuery(document).ready(function(){

		var oTable = jQuery('#decor_table').dataTable({
			"aoColumnDefs": [
		                        { "bSearchable": true, "bVisible": false, "aTargets": [ 6,12,13,14,15,16 ]}
		                    ],
			"sPaginationType": "full_numbers",
			"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Wszystkie"]],
			"iDisplayLength": 25,
			"bStateSave": true,
			"bProcessing": false,
		    "bServerSide": true,
		    "aaSorting": [[ 1, "asc" ]],
		    "sAjaxSource": "ajax/ajax_dekoracje_lista.php",
		    
			"fnDrawCallback": function(oSettings) {
			jQuery('.stdtable .pencil').click(function(){
			var id=jQuery(this).find('span').text();
			jQuery('#id').val(id); 
			jQuery('#form_edit').submit(); 
				// otworz edycje
			});

			jQuery('.stdtable .trash').click(function(){
				var id=jQuery(this).prev().find('span').text(); 
				jQuery("#dialog-potwierdz").dialog({
					 resizable: false,
					 width:350,
					 height:200,
					 modal: false,
					 closeText: "zamknij", 
					 buttons: {
					 "Usuń": function() {
					jQuery.ajaxSetup({async:false, cache:false});
					jQuery.post("ajax/ajax_dekoracje_usun.php",{pid: id}, function(data){if(data==1) {oTable.fnDraw();  jQuery('#komunikat_del').fadeIn(1000).delay(2000).fadeOut(1000);} else {jQuery('#komunikat_del_error').fadeIn(1000).delay(2000).fadeOut(1000);} }, "json");
					jQuery( this ).dialog( "close" ); 
					 },
					 Anuluj: function() {
						 jQuery( this ).dialog( "close" );
					 }
					 }
					 });
			});

			jQuery('.lbox').click(function(){
				var ff=jQuery(this);
				var id=jQuery(this).find('span').text();
				jQuery('.added').remove();
				jQuery.ajaxSetup({async:false, cache:false});
				jQuery.ajax({
					  type: "POST",
					  url: "ajax/ajax_lightbox_decor.php",
					  data: {pid: id },
					  dataType: "html",
					  success: function(li){ 
						  ff.append(li);			    			
					  }
					 });
			});			
	        }
		}); 

		jQuery( "#decor_table td" ).hover(
				function() {
					jQuery(this).parent().find("td").addClass( "zebra" );
					}, function() {
					jQuery(this).parent().find("td").removeClass( "zebra" );
			});

		
		oTable.fnFilter("", 12); oTable.fnFilter("", 13); oTable.fnFilter("", 14); oTable.fnFilter("", 15); oTable.fnFilter("", 16);
		
		jQuery('#szukaj_rok').change(function () {
			rok=jQuery("#szukaj_rok option:selected").val();
			oTable.fnFilter( rok, 12);
			});

		jQuery('#szukaj_rodzaj').change(function () {
			rodzaj=jQuery("#szukaj_rodzaj option:selected").val();
			oTable.fnFilter( rodzaj, 13);
			});

		jQuery('#szukaj_status').change(function () {
			status=jQuery("#szukaj_status option:selected").val();
			if(status==1) {oTable.fnFilter( "1", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "", 16);}
			if(status==2) {oTable.fnFilter( "", 14); oTable.fnFilter( "1", 15); oTable.fnFilter( "", 16);}
			if(status==3) {oTable.fnFilter( "", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "1", 16);}
			if(status==4) {oTable.fnFilter( "", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "", 16);}
			});
		
	});
	</script>
	
         			<div id="komunikat_del" class="info" style="display:none;">
                        <h2>Dekoracja została usunięta z bazy danych.</h2> 
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_del_error" class="info" style="display:none;">
                        <h2>Wystąpił nieoczekiwany błąd. Nie udało się usunąć dekoracji z bazy. Jeśli problem będzie się powtarzał proszę o kontakt.</h2>
                    </div>
                    
	<div style="position: relative; top: 37px; left: 275px; z-index: 9; width: 645px; font-weight: bold;" class="dataTables_filter">
		<label class="fs10" style="padding-left:15px;">Rok</label>
		<select name="szukaj_rok" id="szukaj_rok" class="fs10 lista_sel">
				<option value="">Wszystkie</option>
				<option value="07">2007</option>
				<option value="08">2008</option>
				<option value="09">2009</option>
				<option value="10">2010</option>
		        <option value="11">2011</option>
		        <option value="12">2012</option>
		        <option value="13">2013</option>
		        <option value="14">2014</option>
		        <option value="15">2015</option>
		        <option value="16">2016</option>
		        <option value="17">2017</option>
		        <option value="18">2018</option>
		</select>
		
		<label class="fs10" style="padding-left:15px;">Rodzaj</label>
		<select name="szukaj_rodzaj" id="szukaj_rodzaj" class="fs10 lista_sel" style="padding: 5px;">
				<option value="">Wszystkie</option>
				<option value="1">PIWO [019]</option>
		        <option value="2">SZKLO [018]</option>
		        <option value="3">EMALIA [035]</option>
		        <option value="4">NASZKLIWNA [027]</option>
		        <option value="5">WSZKLIWNA [047]</option>
		        <option value="6">NISKOTEMPERATUROWA [054]</option>
		</select>
		
		<label class="fs10" style="padding-left:15px;">Akwiz/Prod</label>
		<select name="szukaj_status" id="szukaj_status" class="fs10 lista_sel" style="padding: 5px;">
				<option value="4">Wszystkie</option>
				<option value="1">Akwizycja</option>
				<option value="2">Produkcja</option>
				<option value="3">ETC Akw.</option>
		</select>
	</div>
                    
                <div id="tab_lista">
				<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="decor_table">
                    <colgroup>
                        <col class="con0" style="width: 20px;"/>
                        <col class="con1" style="width: 20px;"/>
                        <col class="con0"/>
                        <col class="con1" style="width: 320px;"/>
                        <col class="con0"/>
                        <col class="con1" style="width: 10%"/>
                        <col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1"/>
                     	<col class="con0"/>
                    </colgroup>
                    <thead>
                        <tr>
                      		<th class="head0">Indeks</th>
                      	    <th class="head1">Numer</th>
                            <th class="head0">Data</th>
                            <th class="head1">Screen</th>
                            <th class="head0">Nazwa</th>
                            <th class="head1">Opis</th>
                            <th class="head0">Tagi</th>
                            <th class="head1">Akwiz</th>
                            <th class="head0">Prod</th>
                            <th class="head1">ETC</th>
                            <th class="head0">Klient</th>
                            <th class="head1">Edycja/Usuń</th> 
                            <th class="head0">Rok</th> 
                            <th class="head1">Rodzaj</th>  
                            <th class="head0">A</th>
                            <th class="head1">P</th>
                            <th class="head0">EA</th>                        
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                      		<th class="head0">Indeks</th>
                      	    <th class="head1">Numer</th>
                            <th class="head0">Data</th>
                            <th class="head1">Screen</th>
                            <th class="head0">Nazwa</th>
                            <th class="head1">Opis</th>
                            <th class="head0">Tagi</th>
                            <th class="head1">Akwiz</th>
                            <th class="head0">Prod</th>
                            <th class="head1">ETC</th>
                            <th class="head0">Klient</th>
                            <th class="head1">Edycja/Usuń</th> 
                            <th class="head0">Rok</th> 
                            <th class="head1">Rodzaj</th>  
                            <th class="head0">A</th>
                            <th class="head1">P</th>
                            <th class="head0">EA</th>                               
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
				</div> <!--tab_lista-->
				
				<form id="form_edit" action="edytuj-dekoracje.html" method="post">
				<input type="hidden" name="id" id="id" value="0"/>
				</form>
				
				<div id="dialog-potwierdz" title="Na pewno usunąć dekorację z bazy?" style="display: none;">
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Jesteś pewien, że chcesz usunąć dekorację?</p>
				</div>

		<?php
		}
		
	public static function form_lista_dekoracji_prev()
		{
		$root_dir=Config::get("ROOT_DIR");
		?>
		<script type="text/javascript">
		jQuery(document).ready(function(){

		var oTable = jQuery('#decor_table2').dataTable({
			"aoColumnDefs": [
		                        { "bSearchable": true, "bVisible": false, "aTargets": [ 6,11,12,13,14,15,16 ]}
		                    ],
			"sPaginationType": "full_numbers",
			"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Wszystkie"]],
			"iDisplayLength": 25,
			"bStateSave": true,
			"bProcessing": false,
		    "bServerSide": true,
		    "aaSorting": [[ 1, "asc" ]],
		    "sAjaxSource": "ajax/ajax_dekoracje_lista.php",
		    
			"fnDrawCallback": function(oSettings) {
			jQuery('.stdtable .pencil').click(function(){
			});

			jQuery('.stdtable .trash').click(function(){
			});

			jQuery('.lbox').click(function(){
				var ff=jQuery(this);
				var id=jQuery(this).find('span').text();
				jQuery('.added').remove();
				jQuery.ajaxSetup({async:false, cache:false});
				jQuery.ajax({
					  type: "POST",
					  url: "ajax/ajax_lightbox_decor.php",
					  data: {pid: id },
					  dataType: "html",
					  success: function(li){ 
						  ff.append(li);			    			
					  }
					 });
			});			
	        }
		}); 

		jQuery( "#decor_table2 td" ).hover(
				function() {
					jQuery(this).parent().find("td").addClass( "zebra" );
					}, function() {
					jQuery(this).parent().find("td").removeClass( "zebra" );
			});

		
		oTable.fnFilter("", 12); oTable.fnFilter("", 13); oTable.fnFilter("", 14); oTable.fnFilter("", 15); oTable.fnFilter("", 16);
		
		jQuery('#szukaj_rok').change(function () {
			rok=jQuery("#szukaj_rok option:selected").val();
			oTable.fnFilter( rok, 12);
			});

		jQuery('#szukaj_rodzaj').change(function () {
			rodzaj=jQuery("#szukaj_rodzaj option:selected").val();
			oTable.fnFilter( rodzaj, 13);
			});

		jQuery('#szukaj_status').change(function () {
			status=jQuery("#szukaj_status option:selected").val();
			if(status==1) {oTable.fnFilter( "1", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "", 16);}
			if(status==2) {oTable.fnFilter( "", 14); oTable.fnFilter( "1", 15); oTable.fnFilter( "", 16);}
			if(status==3) {oTable.fnFilter( "", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "1", 16);}
			if(status==4) {oTable.fnFilter( "", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "", 16);}
			});
		
	});
	</script>
	
         			<div id="komunikat_del" class="info" style="display:none;">
                        <h2>Dekoracja została usunięta z bazy danych.</h2> 
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_del_error" class="info" style="display:none;">
                        <h2>Wystąpił nieoczekiwany błąd. Nie udało się usunąć dekoracji z bazy. Jeśli problem będzie się powtarzał proszę o kontakt.</h2>
                    </div>
                    
	<div style="position: relative; top: 37px; left: 275px; z-index: 9; width: 645px; font-weight: bold;" class="dataTables_filter">
		<label class="fs10" style="padding-left:15px;">Rok</label>
		<select name="szukaj_rok" id="szukaj_rok" class="fs10 lista_sel">
				<option value="">Wszystkie</option>
				<option value="07">2007</option>
				<option value="08">2008</option>
				<option value="09">2009</option>
				<option value="10">2010</option>
		        <option value="11">2011</option>
		        <option value="12">2012</option>
		        <option value="13">2013</option>
		        <option value="14">2014</option>
		        <option value="15">2015</option>
		        <option value="16">2016</option>
		        <option value="17">2017</option>
		        <option value="18">2018</option>
		</select>
		
		<label class="fs10" style="padding-left:15px;">Rodzaj</label>
		<select name="szukaj_rodzaj" id="szukaj_rodzaj" class="fs10 lista_sel" style="padding: 5px;">
				<option value="">Wszystkie</option>
				<option value="1">PIWO [019]</option>
		        <option value="2">SZKLO [018]</option>
		        <option value="3">EMALIA [035]</option>
		        <option value="4">NASZKLIWNA [027]</option>
		        <option value="5">WSZKLIWNA [047]</option>
		        <option value="6">NISKOTEMPERATUROWA [054]</option>
		</select>
		
		<label class="fs10" style="padding-left:15px;">Akwiz/Prod</label>
		<select name="szukaj_status" id="szukaj_status" class="fs10 lista_sel" style="padding: 5px;">
				<option value="4">Wszystkie</option>
				<option value="1">Akwizycja</option>
				<option value="2">Produkcja</option>
				<option value="3">ETC Akw.</option>
		</select>
	</div>
                    
                <div id="tab_lista">
				<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="decor_table2">
                    <colgroup>
                        <col class="con0" style="width: 20px;"/>
                        <col class="con1" style="width: 20px;"/>
                        <col class="con0"/>
                        <col class="con1" style="width: 320px;"/>
                        <col class="con0"/>
                        <col class="con1" style="width: 10%"/>
                        <col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1"/>
                     	<col class="con0"/>
                    </colgroup>
                    <thead>
                        <tr>
                      		<th class="head0">Indeks</th>
                      	    <th class="head1">Numer</th>
                            <th class="head0">Data</th>
                            <th class="head1">Screen</th>
                            <th class="head0">Nazwa</th>
                            <th class="head1">Opis</th>
                            <th class="head0">Tagi</th>
                            <th class="head1">Akwiz</th>
                            <th class="head0">Prod</th>
                            <th class="head1">ETC</th>
                            <th class="head0">Klient</th>
                            <th class="head1">Edycja/Usuń</th> 
                            <th class="head0">Rok</th> 
                            <th class="head1">Rodzaj</th>  
                            <th class="head0">A</th>
                            <th class="head1">P</th>
                            <th class="head0">EA</th>                          
                        </tr>
                    </thead>
                    <tfoot> 
                        <tr>
                      		<th class="head0">Indeks</th>
                      	    <th class="head1">Numer</th>
                            <th class="head0">Data</th>
                            <th class="head1">Screen</th>
                            <th class="head0">Nazwa</th>
                            <th class="head1">Opis</th>
                            <th class="head0">Tagi</th>
                            <th class="head1">Akwiz</th>
                            <th class="head0">Prod</th>
                            <th class="head1">ETC</th>
                            <th class="head0">Klient</th>
                            <th class="head1">Edycja/Usuń</th> 
                            <th class="head0">Rok</th> 
                            <th class="head1">Rodzaj</th>  
                            <th class="head0">A</th>
                            <th class="head1">P</th>
                            <th class="head0">EA</th>                                    
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
				</div> <!--tab_lista-->
		<?php
		}
		
public static function form_lista_dekoracji_print()
		{
		$root_dir=Config::get("ROOT_DIR");
		?>
		<script type="text/javascript">
		jQuery(document).ready(function(){

		var oTable = jQuery('#decor_table2').dataTable({
			"aoColumnDefs": [
		                        { "bSearchable": true, "bVisible": false, "aTargets": [ 4,5,6,7,8,9,11,12,13,14,15,16 ]}
		                    ],
			"sPaginationType": "full_numbers",
			"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Wszystkie"]],
			"iDisplayLength": 25,
			"bStateSave": true,
			"bProcessing": false,
		    "bServerSide": true,
		    "aaSorting": [[ 1, "asc" ]],
		    "sAjaxSource": "ajax/ajax_dekoracje_lista.php",
		    
			"fnDrawCallback": function(oSettings) {
			jQuery('.stdtable .pencil').click(function(){
			});

			jQuery('.stdtable .trash').click(function(){
			});

			jQuery('.lbox').click(function(){
				var ff=jQuery(this);
				var id=jQuery(this).find('span').text();
				jQuery('.added').remove();
				jQuery.ajaxSetup({async:false, cache:false});
				jQuery.ajax({
					  type: "POST",
					  url: "ajax/ajax_lightbox_decor.php",
					  data: {pid: id },
					  dataType: "html",
					  success: function(li){ 
						  ff.append(li);			    			
					  }
					 });
			});			
	        }
		}); 

		jQuery( "#decor_table2 td" ).hover(
				function() {
					jQuery(this).parent().find("td").addClass( "zebra" );
					}, function() {
					jQuery(this).parent().find("td").removeClass( "zebra" );
			});

		
		oTable.fnFilter("", 12); oTable.fnFilter("", 13); oTable.fnFilter("", 14); oTable.fnFilter("", 15); oTable.fnFilter("", 16);
		
		jQuery('#szukaj_rok').change(function () {
			rok=jQuery("#szukaj_rok option:selected").val();
			oTable.fnFilter( rok, 12);
			});

		jQuery('#szukaj_rodzaj').change(function () {
			rodzaj=jQuery("#szukaj_rodzaj option:selected").val();
			oTable.fnFilter( rodzaj, 13);
			});

		jQuery('#szukaj_status').change(function () {
			status=jQuery("#szukaj_status option:selected").val();
			if(status==1) {oTable.fnFilter( "1", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "", 16);}
			if(status==2) {oTable.fnFilter( "", 14); oTable.fnFilter( "1", 15); oTable.fnFilter( "", 16);}
			if(status==3) {oTable.fnFilter( "", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "1", 16);}
			if(status==4) {oTable.fnFilter( "", 14); oTable.fnFilter( "", 15); oTable.fnFilter( "", 16);}
			});
		
	});
	</script>
	
         			<div id="komunikat_del" class="info" style="display:none;">
                        <h2>Dekoracja została usunięta z bazy danych.</h2> 
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_del_error" class="info" style="display:none;">
                        <h2>Wystąpił nieoczekiwany błąd. Nie udało się usunąć dekoracji z bazy. Jeśli problem będzie się powtarzał proszę o kontakt.</h2>
                    </div>
                    
	<div style="position: relative; top: 0px; z-index: 9; font-weight: bold;" class="dataTables_filter">
		<label class="fs10" style="padding-left:15px;">Rok</label>
		<select name="szukaj_rok" id="szukaj_rok" class="fs10 lista_sel">
				<option value="">Wszystkie</option>
				<option value="07">2007</option>
				<option value="08">2008</option>
				<option value="09">2009</option>
				<option value="10">2010</option>
		        <option value="11">2011</option>
		        <option value="12">2012</option>
		        <option value="13">2013</option>
		        <option value="14">2014</option>
		        <option value="15">2015</option>
		        <option value="16">2016</option>
		        <option value="17">2017</option>
		        <option value="18">2018</option>
		</select>
		
		<label class="fs10" style="padding-left:15px;">Rodzaj</label>
		<select name="szukaj_rodzaj" id="szukaj_rodzaj" class="fs10 lista_sel" style="padding: 5px; font-size:7px;">
				<option value="">Wszystkie</option>
				<option value="1">PIWO [019]</option>
		        <option value="2">SZKLO [018]</option>
		        <option value="3">EMALIA [035]</option>
		        <option value="4">NASZKLIWNA [027]</option>
		        <option value="5">WSZKLIWNA [047]</option>
		        <option value="6">NISKOTEMPERATUROWA [054]</option>
		</select>
		
		<label class="fs10" style="padding-left:15px; ">Akwiz/Prod</label>
		<select name="szukaj_status" id="szukaj_status" class="fs10 lista_sel" style="padding: 5px; font-size:7px;">
				<option value="4">Wszystkie</option>
				<option value="1">Akwizycja</option>
				<option value="2">Produkcja</option>
				<option value="3">ETC Akw.</option>
		</select>
	</div>
                    
                <div id="tab_lista">
				<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="decor_table2">
                    <colgroup>
                        <col class="con0" style="width: 20px;"/>
                        <col class="con1" style="width: 20px;"/>
                        <col class="con0"/>
                        <col class="con1" style="width: 320px;"/>
                        <col class="con0"/>
                        <col class="con1" style="width: 10%"/>
                        <col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1" />
                     	<col class="con0"/>
                     	<col class="con1"/>
                     	<col class="con0"/>
                    </colgroup>
                    <thead>
                        <tr>
                      		<th class="head0">Indeks</th>
                      	    <th class="head1">Numer</th>
                            <th class="head0">Data</th>
                            <th class="head1">Screen</th>
                            <th class="head0">Nazwa</th>
                            <th class="head1">Opis</th>
                            <th class="head0">Tagi</th>
                            <th class="head1">Akwiz</th>
                            <th class="head0">Prod</th>
                            <th class="head1">ETC</th>
                            <th class="head0">Klient</th>
                            <th class="head1">Edycja/Usuń</th> 
                            <th class="head0">Rok</th> 
                            <th class="head1">Rodzaj</th>  
                            <th class="head0">A</th>
                            <th class="head1">P</th>
                            <th class="head0">EA</th>                          
                        </tr>
                    </thead>
                    <tfoot> 
                        <tr>
                      		<th class="head0">Indeks</th>
                      	    <th class="head1">Numer</th>
                            <th class="head0">Data</th>
                            <th class="head1">Screen</th>
                            <th class="head0">Nazwa</th>
                            <th class="head1">Opis</th>
                            <th class="head0">Tagi</th>
                            <th class="head1">Akwiz</th>
                            <th class="head0">Prod</th>
                            <th class="head1">ETC</th>
                            <th class="head0">Klient</th>
                            <th class="head1">Edycja/Usuń</th> 
                            <th class="head0">Rok</th> 
                            <th class="head1">Rodzaj</th>  
                            <th class="head0">A</th>
                            <th class="head1">P</th>
                            <th class="head0">EA</th>                                    
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
				</div> <!--tab_lista-->
		<?php
		}
		
public static function klienci()
		{
		$root_dir=Config::get("ROOT_DIR");
			?>
<script type="text/javascript">
	jQuery(document).ready(function(){			
		var nazwa = jQuery("#nazwa"),
		opis = jQuery("#opis"),		
		nazwa_ed = jQuery("#nazwa_ed"),
		opis_ed = jQuery("#opis_ed"),
		td = jQuery("#td_nr"),	
		oTable = jQuery('#customers_table').dataTable({
			"sPaginationType": "full_numbers",
			"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Wszystkie"]],
			"iDisplayLength": 25,
			"bStateSave": true,
			"bProcessing": false,
		    "bServerSide": true,
		    "aaSorting": [[ 0, "asc" ]],
		    "sAjaxSource": "ajax/ajax_klienci_lista.php",
		    
			"fnDrawCallback": function(oSettings) {
			jQuery('.stdtable .pencil').click(function(){
				var id=jQuery(this).find('span').text();
				jQuery.post("ajax/ajax_klient_pobierz.php",{pid: id}, function(data)
					{
					jQuery('#nazwa_ed').val(data[0]);
					jQuery('#opis_ed').val(data[1]); } , "json");	
					jQuery('#td_nr').val(id);
					jQuery('#dialog-form').dialog('open');
			});

			jQuery('.stdtable .trash').click(function(){
				var id=jQuery(this).prev().find('span').text(); 
				jQuery("#dialog-potwierdz").dialog({
					 resizable: false,
					 width:350,
					 height:200,
					 modal: false,
					 closeText: "zamknij", 
					 buttons: {
					 "Usuń": function() {
					jQuery.ajaxSetup({async:false, cache:false});
					jQuery.post("ajax/ajax_klient_usun.php",{pid: id}, function(data){if(data==1) {oTable.fnDraw();  jQuery('#komunikat_del').fadeIn(1000).delay(2000).fadeOut(1000);} else {jQuery('#komunikat_del_error').fadeIn(1000).delay(2000).fadeOut(1000);} }, "json");
					jQuery( this ).dialog( "close" ); 
					 },
					 Anuluj: function() {
						 jQuery( this ).dialog( "close" );
					 }
					 }
					 });
			});
		
	        }
		}); 

		jQuery( "#customers_table td" ).hover(
				function() {
					jQuery(this).parent().find("td").addClass( "zebra" );
					}, function() {
					jQuery(this).parent().find("td").removeClass( "zebra" );
			});	

		jQuery('#dialog-form').dialog({
			closeText: 'x',
			autoOpen: false,
			height: 400,
			width: 700,
			modal: true,
			buttons: {
				"Zapisz zmiany": function() 
				{				
			jQuery.ajaxSetup({async:false, cache:false});
			jQuery.post("ajax/ajax_klient_up.php",{pnazwa: nazwa_ed.val(), popis: opis_ed.val(), ptd: td.val()}, function(data){if(data==1) {oTable.fnDraw(); jQuery('#komunikat_up_ok').show(1000).delay(2000).hide(1000);} else {jQuery('#komunikat_up_error').show(1000).delay(2000).hide(1000);} }, "json");	
			jQuery(this).dialog('close');											
				},
				Anuluj: function() {
					jQuery( this ).dialog( "close" );
				}
				},
				close: function() {
				
				}
		});
		
	jQuery('#submit1').click(function()
		{ 
			jQuery.ajaxSetup({async:false, cache:false});		 
			jQuery.post("ajax/ajax_klient.php",{pnazwa: nazwa.val(), popis: opis.val() }, function(data){if(data==1) {oTable.fnDraw(); jQuery('#form_kont').get(0).reset(); jQuery('#komunikat_ok').show(1000).delay(2000).hide(1000);} if(data==2) {jQuery('#komunikat_error').show(1000).delay(2000).hide(1000);} if(data==3) {jQuery('#form_kont').get(0).reset();  jQuery('#komunikat_same').show(1000).delay(2000).hide(1000);} }, "json");
		});
				});
	</script>
	
	
	                    <div class="contenttitle2">
                        <h3>Dodaj klienta</h3>
                    </div><!--contenttitle-->

      <form id="form_kont" action="#" class="stdform" method="post">
        <table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
		    <tr>
		     	 <td width="246" class="tekstform">Klient</td>
		        <td width="354"><input name="nazwa" type="text"  maxlength="120"  class="inputydl" id="nazwa" placeholder="...wpisz nazwę klienta"/></td>
		      </tr>
                       
              <tr>
		      <td width="246" class="tekstform">Opis</td>
		        <td width="354"><textarea name="opis" cols="50" rows="4" class="inputydld" id="opis" placeholder="dodatkowy opis klienta"></textarea></td>
		      </tr>
                      
         	  <tr>
		        <td colspan="2"><p class="cent">
			    <input id="submit1" type="button" class="zalog" value="Dodaj do bazy"></p></td>
		      </tr>
         </table>                       
       </form>

	<div id="dialog-form" title="Edycja danych">
	<form action="#" class="stdform" method="post">
		<table width="600" border="0" cellpadding="0" cellspacing="0" class="centab">
			    <tr>
			     	 <td width="246" class="tekstform">Klient</td>
			        <td width="354"><input name="nazwa_ed" type="text"  maxlength="120"  class="inputydl" id="nazwa_ed"/></td>
			      </tr>
	                       
	              <tr>
			      <td width="246" class="tekstform">Opis</td>
			        <td width="354"><textarea name="opis_ed" cols="45" rows="4"  class="inputydld" id="opis_ed"></textarea>
			        <input type="hidden" name="td_nr" id="td_nr" value="1"/></td>
			      </tr>
	      </table>                   
	</form>
</div>
					<div id="komunikat_ok" class="info" style="display:none;">
                        <a class="close"></a>
                        <h3>Dodano</h3>
                        <p>Nowy klient dodany do bazy danych.</p>
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_same" class="info" style="display:none; color: #ff6000;">
                        <a class="close"></a>
                        <h3>Już jest w bazie!</h3>
                        <p>Wpisany klient już jest w bazie.</p>
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_error"class="info" style="display:none;">
                        <a class="close"></a>
                        <h3></h3>
                        <p>Wystąpił nieoczekiwany błąd. Jeśli problem będzie się powtarzał proszę o kontakt.</p>
                    </div><!-- notification announcement -->
                    

         			<div id="komunikat_del" class="info" style="display:none;">
                        <h2>Klient został usunięty z bazy danych.</h2> 
                    </div><!-- notification announcement -->
                    
                    <div id="komunikat_del_error" class="info" style="display:none;">
                        <h2>Wystąpił nieoczekiwany błąd. Nie udało się usunąć klienta z bazy. Jeśli problem będzie się powtarzał proszę o kontakt.</h2>
                    </div>
                    
                       <div id="komunikat_up_ok" class="info" style="display:none;">
                        <a class="close"></a>
                        <h3></h3>
                        <p>Zmiany zapisano.</p>
                    </div><!-- notification announcement -->
                            
                     <div id="komunikat_up_error" class="info" style="display:none;">
                        <a class="close"></a>
                        <h3></h3>
                        <p>Nic nie zmieniono lub nie udało się zapisac zmian w bazie danych.</p>
                    </div><!-- notification announcement -->
                    
                <div id="tab_lista">
				<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="customers_table">
                    <colgroup>
                        <col class="con0" style="width: 30%;"/>
                        <col class="con1"/>
                        <col class="con0" style="width: 80px;"/>
                    </colgroup>
                    <thead>
                        <tr>
                      		<th class="head0">Klient</th>
                      	    <th class="head1">Opis</th>
                            <th class="head0">Edycja/Usuń</th> 
                        
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                      		<th class="head0">Klient</th>
                      	    <th class="head1">Opis</th>
                            <th class="head0">Edycja/Usuń</th>                          
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
				</div> <!--tab_lista-->
				
				<form id="form_edit" action="edytuj-klienta.html" method="post">
				<input type="hidden" name="id" id="id" value="0"/>
				</form>
				
				<div id="dialog-potwierdz" title="Na pewno usunąć klienta z bazy?" style="display: none;">
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Jesteś pewien, że chcesz usunąć klienta?</p>
				</div>

		<?php
		}
		
}
?>