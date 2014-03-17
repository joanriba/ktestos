              <div style="display: inline-block;"> 
              <select style="width: 80px;" name="dia<?=$i?>">
	              <option value=""></option>
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
             </div>
             
             
             <div style="display: inline-block;"> 
                <select style="width: 80px;" name="mes<?=$i?>">
               	  <option value=""></option>
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
              </div>

              
              
              <div style="display: inline-block;"> 
              <select style="width: 80px;" name="any<?=$i?>">
              
	              <option value=""></option>
	              <? for ($x=1995; $x<=2012; $x++) {?>
	              <option value="<?=$x?>"><?=$x?></option>
	              <? } ?>
	        
              </select>
              </div>
              