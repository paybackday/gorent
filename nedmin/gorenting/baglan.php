<?php
date_default_timezone_set('Europe/Istanbul');
try {
	$db= new PDO("mysql:host=localhost;dbname=gorent;charset=utf8","root","emre1234");
	//echo "Veritabani baglantisi basarili";
} catch (PDOException $a) {
	echo $a->getMessage();
	
}

?>