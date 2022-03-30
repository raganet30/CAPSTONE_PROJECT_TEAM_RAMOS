<?php 
	include('testing-process.php');
	//$db = new DB();


	$name=$_POST['name'];

	$con= new DB();
	$data = $con->searchData($name);

	//echo "name : $name";

	echo json_encode($data);


 ?>