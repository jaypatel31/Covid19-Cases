<?php
	$data = file_get_contents('https://api.covid19india.org/data.json');
	$decode = json_decode($data,true);
	require_once("phpChart_Lite/conf.php");
	 
	echo '<table border="1px">';
	echo '<tr>';
		echo '<th>Daily Confirmed</th>';
		echo '<th>Daily Deceased</th>';
		echo '<th>Daily Recovered</th>';
		echo '<th>Date</th>';
		
	echo '</tr>';
	$array = array();
	$array2 = array();
		foreach($decode["cases_time_series"] as $key=>$value){
			echo '<tr>';
			$array[] = $value['totalconfirmed'];
			$array2[] = $value['dailyconfirmed'];
			foreach($value as $key2=>$value2){
				if($key2 == "totalconfirmed" ||$key2 == "totaldeceased" || $key2 == "totalrecovered"){
					break;
				}
				else{
					echo '<td title="'.$key2.'">'.$value2.'</td>';
				}
			
			}
			echo '/<tr>';
		}
		echo '<tr>';
			$total = $decode["cases_time_series"][count($decode["cases_time_series"])-1];
			echo '<td><strong>'.$total['totalconfirmed'].'</strong></td>';
			echo '<td><strong>'.$total['totaldeceased'].'</strong></td>';
			echo '<td><strong>'.$total['totalrecovered'].'</strong></td>';
			echo '<td><strong>TOTAL</strong></td>';
		echo '</tr>';
	echo '</table>';
	require_once("phpChart_Lite/conf.php");
	
	$jerray = array();
	$jerray2 = array();
	foreach($array as $key4=>$value4){
			$xalue = (int)$value4;
			$jerray2[] =$xalue;
		
	}
	foreach($array2 as $key3=>$value3){
			$xalue = (int)$value3;
			$jerray[] =$xalue;
		
	}
	$one = $jerray2[0];
	var_dump($one);
	
	$pc1 = new C_PhpChartX(array($jerray2),'basic_chart');
	$pc1->set_animate(true);
	$pc1->set_title(array('text'=>'Covid19 Daily Cases'));
	$pc1->draw(); 
	
?>