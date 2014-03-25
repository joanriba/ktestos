<?php
include('header.php');?>


	<div class="bandform">
	<div class="container">
		<div class="sixteen columns">
			
		
	
	<? if(isset($_POST['submit'])){?>
	
		<h3><?=$word['nomidata'][$idioma]?></h3>
	
	<? $numeronens=$_POST[numeronens];
		
			for ($i=1; $i<=$numeronens; $i++) {?>
		
			<form id="nomsnens" class="inscripcio" method="post" action="pas2.php" data-parsley-validate>
			
			<input type="hidden" name="idioma" value="<?=$idioma?>">
			<input type="hidden" name="numeronens" value="<?=$numeronens?>">
			
			<table class="nomiedat">
				<tr>
				<td><input type="text" placeholder="<?=$word['pnom'][$idioma]?> <?=$i?>" name="fill<?=$i?>" value="" class="form-control" required/></td>
				
				<td><select style="width: 80px;" name="dia<?=$i?>" data-trigger="change" required>
	              <option value=""><?=$word['day'][$idioma]?></option>
	              <option value="01">01</option>
	              <option value="02">02</option>
	              <option value="04">03</option>
	              <option value="05">04</option>
	              <option value="05">05</option>
	              <option value="06">06</option>
	              <option value="07">07</option>
	              <option value="08">08</option>
	              <option value="09">09</option>
	              <option value="10">10</option>
	              <option value="11">11</option>
	              <option value="12">12</option> 
	              <option value="13">13</option> 
	              <option value="14">14</option> 
	              <option value="15">15</option> 
	              <option value="16">16</option> 
	              <option value="17">17</option> 
	              <option value="18">18</option> 
	              <option value="19">19</option> 
	              <option value="20">20</option> 
	              <option value="21">21</option> 
	              <option value="22">22</option> 
	              <option value="23">23</option> 
	              <option value="24">24</option> 
	              <option value="25">25</option> 
	              <option value="26">26</option> 
	              <option value="27">27</option>
	              <option value="28">28</option> 
	              <option value="29">29</option> 
	              <option value="30">30</option> 
	              <option value="31">31</option>       
              </select>
             </td>
             
             
             <td> 
                <select style="width: 80px;" name="mes<?=$i?>" required>
               	  <option value="">Mes</option>
	              <option value="01">Gener</option>
	              <option value="02">Febrer</option>
	              <option value="04">Març</option>
	              <option value="05">Abril</option>
	              <option value="05">Maig</option>
	              <option value="06">Juny</option>
	              <option value="07">Juliol</option>
	              <option value="08">Agost</option>
	              <option value="09">Setembre</option>
	              <option value="10">Octubre</option>
	              <option value="11">Novembre</option>
	              <option value="12">Desembre</option>      
              </select>
              </td>

              
              
              <td> 
              <select style="width: 80px;" name="any<?=$i?>" required>
              
	              <option value=""><?=$word['year'][$idioma]?></option>
	              <? for ($x=1995; $x<=2012; $x++) {?>
	              <option value="<?=$x?>"><?=$x?></option>
	              <? } ?>
	        
              </select>
              </td>
              
              
              
              
			</table>

		
			
			
			
			
			<? } //tanca for ?>
	
				
				<input type="hidden" name="idioma" value="<?=$idioma?>"/>
				<a href="index.php" class="submit"><?=$word['previous'][$idioma]?></a>
				<input type="submit" name="submit2" value="<?=$word['next'][$idioma]?>"/>
			
			</form>
			
			
			<script type="text/javascript">
				$('#nomsnens').parsley();
				</script>
			
	
	<? } else { ?>
 		
 		
 		<? if(isset($_GET[numeronens])){?>
 		
 		
 		<? } ?>
 		
 
 <div class="seven columns">
 
      <form class="inscripcio" method="post" action="?" enctype="multipart/form-data">
		
		<h3><?=$word['howmanykids'][$idioma]?></h3>
		
			
			<input type="number" name="numeronens" value="<? if(isset($_GET[numeronens])){ echo $_GET[numeronens];}?>">
			              
 
            <input type="hidden" name="idioma" value="<?=$idioma?>"/>
            <input type="submit" name="submit" value="<?=$word['next'][$idioma]?>"/>

           
      </form>
      
 </div>
 
 <div class="seven columns">
 	
<script type="text/javascript" src="/js/_ajax.new.js?<?=rand()?>"></script>
<script type="text/javascript" src="/js/_formdata2querystring.js"></script>
<? include("js/_applogin.php");?>
 	
		
	
		
		    <form class="users" id="loginForm" method="POST" action="?">
		    
		    		<h2><?=$word['iammember'][$idioma]?></h2>
      				
      				<label for="email"><?=$word['email'][$idioma]?></label>
	      			<input id="email" name="email" type="text" >
	      			
	      			<label for="password"><?=$word['password'][$idioma]?></label> 
	            	<input id="pass" name="password" type="password" value="">
	    
	            	<input type="submit" id="submitButton" name="submitButton" value="Accedir"/>
	            	
	            	<a href="recover.php?idioma=<?=$idioma?>"><?=$word['forgot'][$idioma]?></a>       
	        </form>
	        
      
      <div id="promptDiv" class="procPrompt">
          <span id="msg1"></span>
          <span id="msg2"></span>
        </div>
 		
 	
 </div>
 
 
 

    
 
     
    <? }?>	
    
    </div>
  
   </div><!--tanca content-->
    
<?php include('footer.php')?>