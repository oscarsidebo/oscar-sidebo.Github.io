<<?php

session_start();

$servername="artistdatabase.cd2p9dbzyese.us-west-1.rds.amazonaws.com";
$username="oscarsidebo";
$password="electro70";
$dbname="artist_database";

$name = $_SESSION['name'][$_SESSION['page']];

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update artist set notes = 'heard' where name = '$name' ";
			
$conn->query($sql);
$conn->close();

?>