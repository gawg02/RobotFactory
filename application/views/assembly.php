
    <body>
	<h1>Assembly<h1>
        <div class="container">
            <div id="content">
			
				<h2>parts</h2>
				<h3>filter: <a href="/filter/actor/all" ><button style="color:black;">All</button></a> <a href="/filter/actor/a" style="color:black;"><button style="color:black;">A</button></a> <a href="/filter/actor/b"><button style="color:black;">B</button></a> <a href="/filter/actor/c" ><button style="color:black;">C</button></a> <a href="/filter/actor/m" ><button style="color:black;">M</button></a> <a href="/filter/actor/r" ><button style="color:black;">R</button></a> <a href="/filter/actor/w" ><button style="color:black;">W</button></a></h3>
				<!--<div class ="row">
					<div class = "span4">
						{leftparts}
					</div>
					<div class = "span4">
						{midparts}
					</div>
					<div class = "span4">
						{rightparts}
					</div>
				</div>-->
				<div class = "row">
				<span class='col-md-2'></span><!--see without-->
				<span class='col-md-6'>
				<table class = "table">
				<tr>
				<th></th>
				<th>part</th>
				<th>Part code</th>
				<th>Ca code</th>
				<th>plant made</th>
				</tr>
				{partTable}
				<tr>
				<td><input type="checkbox" name="pick{part}" value="select"></td>
				<td>{part}</td>
				<td>{partCode}</td>
				<td>{caCode}</td>
				<td>{plant}</td>
				</tr>
				{/partTable}
				</table>
<!--				{leftMidParts} 
				{leftBottomParts}
				{rightTopParts} 
				{rightMidParts} 
				{rightBottomParts}-->
				</span>
				<!--<span class='col-md-4'>
				
				{rightTopParts} 
				{rightMidParts} 
				{rightBottomParts}
				</span>-->
				</div>
				<button type= "button" style="color:black;">Build</button> <button type= "button" style="color:black;">return to head office</button> 

				<h2>completed bots</h2>
			<!--	{completeBots}
-->
			</div>
		</div>