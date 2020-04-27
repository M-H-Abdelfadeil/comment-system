<?php
try {
	$conn=new PDO ('mysql:host=localhost;dbname=simple_comment','root','');
} catch (PDOException $e) {
	echo 'Error Connect DB'.$e->getMessage();
}