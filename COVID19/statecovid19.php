<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$state = $_POST['state'];
	$data = file_get_contents('https://api.covid19india.org/data.json');
	$decode = json_decode($data,true);
	echo '<table border="1px">';
	echo '<tr>';
		echo '<th>Active</th>';
		echo '<th>Confirmed</th>';
		echo '<th>Deaths</th>';
		echo '<th>Daily Confirmed</th>';
		echo '<th>Daily Deaths</th>';
		echo '<th>Daily Recoverd</th>';
		echo '<th>Recoverd</th>';
		
	echo '</tr>';
		foreach($decode["statewise"] as $key=>$value){
			
			 $state2= $value['statecode'];
			
			if($state2==$state){
			foreach($value as $key2=>$value2){
				
				if($key2 == "active" ||$key2 == "confirmed" || $key2 == "deaths" || $key2 == "deltaconfirmed" || $key2 == "deltadeaths" || $key2 == "deltarecovered" || $key2 == "recovered"){
					echo '<td title="'.$key2.'">'.$value2.'</td>';
				}
				else{
				
				}
			
			}
		}
			
		}
		echo '</table>';
		/* echo '<tr>';
			$total = $decode["cases_time_series"][count($decode["cases_time_series"])-1];
			echo '<td><strong>'.$total['totalconfirmed'].'</strong></td>';
			echo '<td><strong>'.$total['totaldeceased'].'</strong></td>';
			echo '<td><strong>'.$total['totalrecovered'].'</strong></td>';
			echo '<td><strong>TOTAL</strong></td>';
		echo '</tr>'; */
	
}
?>
<html>
<head>
	<title>STATE WISE COVID19</title>

</head>
<body>
	<form method="post">
		<label for="state">Select The State</label>
		<select name="state" id="state">
			<option value="MH">Maharashtra</option>
			<option value="TN">Tamil Nadu</option>
			<option value="DL">Delhi</option>
			<option value="GJ">Gujarat</option>
			<option value="UP">Uttar Pradesh</option>
			<option value="KA">Karnataka</option>
			<option value="TG">Telangana</option>
			<option value="WB">West Bengal</option>
			<option value="AP">Andhra Pradesh</option>
			<option value="RJ">Rajasthan</option>
			<option value="HR">Haryana</option>
			<option value="MP">Madhya Pradesh</option>
			<option value="AS">Assam</option>
			<option value="BR">Bihar</option>
			<option value="JK">Jammu and Kashmir</option>
			<option value="PB">Punjab</option>
			<option value="KL">Kerala</option>
			<option value="CT">Chhattisgarh</option>
			<option value="UK">Uttarakhand</option>
			<option value="GA">Goa</option>
			<option value="TR">Tripura</option>
			<option value="MN">Manipur</option>
			<option value="HP">Himachal Pradesh</option>
			<option value="LA">Ladakh</option>
			<option value="CH">Chandigarh</option>
			<option value="DN">Dadra and Nagar Haveli and Daman and Diu</option>
			<option value="AR">Arunachal Pradesh</option>
			<option value="MZ">Mizoram</option>
			<option value="AN">Andaman and Nicobar Islands</option>
			<option value="SK">Sikkim</option>
			<option value="ML">Meghalaya</option>
			<option value="MZ">Lakshadweep</option>
		</select>
		<input type="submit" value="submit">
	</form>
</body>
</html>