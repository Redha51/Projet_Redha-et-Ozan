<?php

class Database {

    public static function getPdo(){
    try
		{
			$connex = new PDO("mysql:host=localhost;port=3306;dbname=databaseprojet;charset=UTF8","root","");
			$connex -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
			echo utf8_encode($e->getMessage());
}
            return $connex;
}
}
?>