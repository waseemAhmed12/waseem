<?php  
// $connect = mysqli_connect("localhost", "root", "", "testing1");
// // Check connection
// //if (!$link) {die("Connection failed: " . mysqli_connect_error());}

// $query = "SELECT * FROM employee";
// $result = mysqli_query($connect, $query);
// $output = array();
// while ($row = mysqli_fetch_assoc($result)) 
// {
// 	$output[] = $row;
// }
// 	echo json_encode($output);


$connect = mysqli_connect("localhost", "root", "", "testing");
// Check connection
//if (!$link) {die("Connection failed: " . mysqli_connect_error());}

$query = "SELECT * FROM checking";
$result = mysqli_query($connect, $query);
$output = array();
while ($row = mysqli_fetch_assoc($result)) 
{
	$output[] = $row;
}
	echo json_encode($output);
?>