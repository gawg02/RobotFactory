{sort_script}
{filterModel_script}
{filterLine_script}
<br/>
<div class="row">
	<form action="" method="POST">
		<div class="col-md-3">
			<h4 style="display:inline; margin-left:2%;">Filter by Model:</h4>
			<select style="margin-left:2%" class="form-control" name="filterModel" id="filterModel">
				<option value="all">All</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>
				<option value="F">F</option>
				<option value="G">G</option>
				<option value="H">H</option>
				<option value="I">I</option>
				<option value="J">J</option>
				<option value="K">K</option>
				<option value="L">L</option>
				<option value="M">M</option>
				<option value="N">N</option>
				<option value="O">O</option>
				<option value="P">P</option>
				<option value="Q">Q</option>
				<option value="R">R</option>
				<option value="S">S</option>
				<option value="T">T</option>
				<option value="U">U</option>
				<option value="V">V</option>
				<option value="W">W</option>
				<option value="X">X</option>
				<option value="Y">Y</option>
				<option value="Z">Z</option>
			</select>
		</div>
		<div class="col-md-3">
			<h4 style="display:inline; margin-left:2%;">Filter by Series:</h4>
			<select style="margin-left:2%" class="form-control" name="filterLine" id="filterLine">
				<option value="all">All</option>
				<option value="Household">Household</option>
				<option value="Butler">Butler</option>
				<option value="Companion">Companion</option>
			</select>
		</div>
		<div class="col-md-3">
			<h4 style="display:inline; margin-left:2%">Sort</h4>
			<select style="margin-left:2%;" class="form-control" name="order" id="order">
				<option value="timestamp">Timestamp</option>
				<option value="model">Model</option>
			</select>
		</div>
		<div class="col-md-3">
			<h3></h3>
			<input class="btn btn-primary" type="submit" value="Filter" />
		</div>
	</form>
</div>
<br/>
<div class="row">
    <table class="table" style="width:85%; margin-left:2%; margin-right:2%">
        <tr>
			<th class="text-center table-bordered">Cost</th>
            <th class="text-center table-bordered">Transaction Type</th>
            <th class="text-center table-bordered">Item</th>
			<th class="text-center table-bordered">Line</th>
            <th class="text-center table-bordered">Model</th>
            <th class="text-center table-bordered">Piece</th>
            <th class="text-center table-bordered">Shipment</th>
            <th class="text-center table-bordered">Timestamp</th>
        </tr>
        {history}
        <tr>
            <td class="table-bordered">${cost}</td>
            <td class="table-bordered">{transactionType}</td>
            <td class="table-bordered">{item}</td>
            <td class="table-bordered">{series}</td>
            <td class="table-bordered">{model}</td>
            <td class="table-bordered">{piece}</td>
            <td class="table-bordered">{shipment}</td>
			<td class="table-bordered">{timestamp}</td>
        </tr>
        {/history}
    </table>
    {pagination}
</div>