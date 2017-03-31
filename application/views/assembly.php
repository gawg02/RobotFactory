<div class = 'col-mid12' id = 'content'>

<div id ="body">
	<p> this is the assembly select your options </p>

<div class ="row">
<table style="border: 1px solid white; width: 50%; height:100px;">	
	<tr>
		<th></th>
		<th>part</th>
		<th>Part code</th>
		<th>Ca Code</th>
		<th>plant built</th>
	</tr>
	{partTable}
	<tr>
	<td><input type="checkbox" name="pick[]" value="select"></td>
		<td>{part}</td>
		<td>{partCode}</td>
		<td>{caCode}</td>
		<td>{plant}</td>
	</tr>
	{/partTable}
</table>
</div>

<button type= "button" style="color:black;">Build</button> <button type= "button" style="color:black;">return to head office</button> 
</br>
<div class ="row">
<table style="border: 1px solid white; width: 50%; height:100px;">	
	<tr>
		<th></th>
		<th>part</th>
	</tr>
	{completedBots}
	<tr>
		<td><input type="checkbox" name="pick[]" value="select"></td>
		<td>{part}</td>
	</tr>
	{/completedBots}
</table>
</div>


<button class = "button" style="color:black;">ship</button>

</div>

