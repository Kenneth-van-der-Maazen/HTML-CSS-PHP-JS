<?php

class Database {
	// Eigenschappen (properties) en methoden van de klasse
	public $pdo;

	// Constructor (initialisatie)
	public function __construct($db, $host="localhost", $user="root", $pwd="") {
		// Code die wordt uitgevoerd bij het aanmaken van een nieuw object
		try {
			$this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected to database: $db";
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public function execute($sql, $placeholders = null)
	{
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($placeholders);
		return $stmt;
	}
}

$pdo = new Database($db = 'forum');
?>