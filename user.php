<?php

require 'vendor/autoload.php';

$data = "<table>";
$data .="<tr>";
$data .="<th>From</th>";
$data .="<th>To</th>";
$data .="<th>Date</th>";
$data .="<th>Time</th>";
$data .="<th>Fare</th>";
$data .="</tr>";


$conn = new MongoDB\Client;

$db = $conn->BusEntryforTravels;

$coll = $db->DepartureEntry;

if(isset($_POST['submit']))
{
	$from=$_POST['from'];
	$to=$_POST['to'];
	$date=$_POST['datepicker'];
	$cursor = $coll->find([
	"From"=>$from,
	"To"=>$to,
	"Date"=>$date
	]);
	foreach($cursor as $document)
	{
	$data .="<tr>";
	$data .="<td>" .$document["From"]."</td>";
	$data .="<td>" .$document["To"]."</td>";
	$data .="<td>" .$document["Date"]."</td>";
	$data .="<td>" .$document["time"]."</td>";
	$data .="<td>" .$document["Fare"]."</td>";
	$data .="</tr>";
	}
$data .="</table>";
echo $data;
}

?>
