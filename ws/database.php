<?php 
class WebServiceDB {
	private $db_user = 'nava_usr';
	private $db_pass = 'nava_db_us3r!';
	private $db_name = 'wp_nava3';
	private $db_host = "localhost";
	public $con = '';
	
	function __construct() {
		try {
			$this->con = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
			$this->con->exec("set names utf8");
			// set the PDO error mode to exception
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "ÚÏã Çã˜Çä ÈÑÞÑÇÑí ÇÑÊÈÇØ: " . $e->getMessage();
		}
	}
}

$db = new WebServiceDB();