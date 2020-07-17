<?php
$student = array(
	'Name'=>array('JAY','AMIT','KISHAN'),
	'ID'=> array(49,89,25)
);
$encode = json_encode($student);
$Json = '{
	"Name":"JAY",
	"Last":"Patel",
	"ID":"049"
}';
$decode = json_decode($Json);
foreach($decode as $key=>$value){
	echo $key.' => '.$value;
	echo '<br>';
};
?>
