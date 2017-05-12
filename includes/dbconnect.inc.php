I<?php
try
{
	$pdo = new PDO('CONNECTIONSTRING');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('set names "utf8"');
}catch(PDOException $e)
{
	$error = 'Nie można nawiązać połączenia z bazą danych: '. $e->getMessage();
	    include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
	exit();
}
//$output = 'Pomyślnie nawiązano połączenie z bazą danych<br>';
