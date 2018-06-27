<?php  
$connect = mysqli_connect("localhost", "root", "", "testing1");
$FNAME = $_POST['name'];
$VALUE = $_POST['value'];
$RID = $_POST['pk'];
$query = "UPDATE employee SET $FNAME='$VALUE' WHERE id='$RID'";
if (mysqli_query($connect, $query)){echo 'done';}
else{echo 'oooops';}
?>
