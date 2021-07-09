<?php
  if(isset($_POST['Forward'])) {
	$vol=1;
}
elseif(isset($_POST['Left'])) {
	$vol=2;
}
elseif(isset($_POST['Right'])) {
	$vol=3;
}
elseif(isset($_POST['Backward'])) {
	$vol=4;
}
else {
	$vol=5;
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$conn = new mysqli('localhost','root','','movement');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
} else {
	$stmt = $conn->prepare("UPDATE movements SET direction=?");
	$stmt->bind_param("i", $vol);
	$execval = $stmt->execute();
	echo $execval;
	echo "Registration successfully...";
	$stmt->close();
	$conn->close();
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
 