<?php include('header.php');?>

<div class="bandform">
	<div class="container">
		<div class="sixteen columns">
			
			<form action="">
			
			<!-- Label and text input -->
			<label for="regularInput">Regular Input</label>
			<input type="text" id="regularInput" />
			
			<!-- Label and textarea -->
			<label for="regularTextarea">Regular Textarea</label>
			<textarea id="regularTextarea"></textarea>
			
			<!-- Label and select list -->
			<label for="selectList">Select List</label>
			<select id="selectList">
			<option value="Option 1">Option 1</option>
			<option value="Option 2">Option 2</option>
			<option value="Option 3">Option 3</option>
			</select>
			
			<!-- Wrap checkbox/radio button groups in fieldsets -->
			<fieldset>
			
			<!-- Give the fieldset a label -->
			<label for="">Checkboxes</label>
			
			<!-- Wrap each checkbox in a label, then give it the input and span for the text option -->
			<label for="regularCheckbox">
			<input type="checkbox" id="regularCheckbox" value="checkbox 1" />
			<span>Regular Checkbox</span>
			</label>
			
			<label for="secondRegularCheckbox">
			<input type="checkbox" id="secondRegularCheckbox" value="checkbox 2" />
			<span>Regular Checkbox</span>
			</label>
			</fieldset>
			
			<fieldset>
			<label for="">Radio Buttons</label>
			<label for="regularRadio">
			<input type="radio" name="radios" id="regularRadio" value="radio 1" />
			<span>Regular Radio</span>
			</label>
			<label for="secondRegularRadio">
			<input type="radio" name="radios" id="secondRegularRadio" value="radio 2" />
			<span>Regular Radio</span>
			</label>
			</fieldset>
			
			<button type="submit">Submit Form</button>
			
			</form>

			
			
<?php include('footer.php');?>