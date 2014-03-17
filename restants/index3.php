<?php

$idioma='ca'; 
 
include('header.php');

?>

<script>
	
$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p border: 1px solid red;"><input type="text" id="p_scnt" size="20" name="fill_' + i +'" value="" placeholder="Input Value"/><select width: 80px;"name="dia_' + i +'"></select><a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { if( i > 2 ) {  $(this).parents('p').remove(); i--; } return false;});
});


</script>

 

	<div class="bandform">
	<div class="container">
		<div class="sixteen columns">
		
 		
 
      <form class="inscripcio" method="post" action="pas2.php">
		
		<h3>Nom i data de naixament dels fills que vols inscriure</h3>
		
			
			
			
			<div id="p_scents" style="border: 1px solid red;">
				 <p><input type="text" id="p_scnt" size="20" name="fill" value="" placeholder="Input Value" /></p>
			</div>
			 
			 
			 <a href="#" id="addScnt">Afegeix un altre fill</a>
			
			
			
			
			
			 <div>
			 
			 <!--linia 1-->
			 <div>
			 <div style="display: inline-block;"> 
              <label for="fill1"></label>
              <input type="text" placeholder="Nom 1" name="fill1" value=""/>
              
              </div>
             
             
             
             
			 	<?php $i='1'; include('birthdate.php');?>
              
              <span class="advertise"></span>
              <span class="advertise"></span>
              
              
			 </div>
			 
			 
			 
			 
			 
              
              <!--linia 2-->
              <div>
              <div style="display: inline-block;"> 
              <label for="fill2"></label>
              <input type="text" placeholder="Nom 2" name="fill2" value=""/>
              
              
              <span class="advertise"></span>
              </div>
              
              <?php $i='2'; include('birthdate.php');?>
              
              </div><!--linia2-->
              
              <!--linia 3-->
              <div>
              <div style="display: inline-block;"> 
              <label for="fill3"></label>
              <input type="text" name="fill3" placeholder="Nom 3" value=""/>
              <span class="advertise"></span>
              </div>
              
              <?php $i='3'; include('birthdate.php');?>
              
			 </div><!--linia 3-->
              
              
              <!--linia 4-->
              <div>
              <div style="display: inline-block;"> 
              <label for="fill3"></label>
              <input type="text" name="fill4" placeholder="Nom 4" value="" />
              <span class="advertise"></span>
              </div>
              
              <?php $i='4'; include('birthdate.php');?>
              
              </div>
              
 
            <input type="hidden" name="idioma" value="<?=$idioma?>"/>
            <input type="submit" value="Següent"/>

            
            
            
            </form>
     
     
    

    
    </div>
  
   </div><!--tanca content-->
    
<?php include('footer.php')?>