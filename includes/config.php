<?php 

$dsn = 'mysql:host=localhost;dbname=srmdb'; //DataSourceName 
$user = 'root';
$pass = '';
// --------------------------------------

try {
	$base=new PDO($dsn, $user, $pass);

	$base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'Failed to connect ' . $e->getMessage();
}


session_start();
?>