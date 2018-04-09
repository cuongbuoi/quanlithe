<?php 
class db{
    private $servername = "fdb19.awardspace.net";
	private $username = "2603386_quanlithe";
	private $password = "paygate123";
	private $dbname = "2603386_quanlithe";

	public $mysql;
	function __construct() {
	$this->mysql = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

	$this->mysql->set_charset('utf8');
	
	if($this->mysql->connect_error) {
	die("Connection Failed : " . $this->mysql->connect_error);
}
}




}

 ?>
