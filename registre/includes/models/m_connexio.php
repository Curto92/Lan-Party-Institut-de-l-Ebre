<?php
class Connexio {
	var $conn;
	var $db_host;
	var $db_name;
	var $db_user;
	var $db_pass;
	
	public function connexio(){
		//Direcció del servidor on es troba la BBDD MySQL
		$this->db_host="127.0.0.1";
		//Nom de la BBDD del MySQL
		$this->db_name="";
		//Nom Usuari amb permisos de connexió remota
		$this->db_user="";
		//Paraula de pas del usuari
		$this->db_pass="";		
		}

	public function db_Open(){
		$this->conn=mysql_connect($this->db_host,$this->db_user,$this->db_pass);
		
		if($this->conn){
			if (mysql_select_db($this->db_name,$this->conn)){
				$estat=1;
				}
			else{
				$estat=mysql_error();
				}
			}
		else
			{
			$estat=mysql_error();
			}
		//echo $estat;
	}
	
	public function db_Close(){
		if (mysql_close($this->conn)){
			$estat=1;
			}
			else{
				$estat=mysql_error();
				}
			echo $estat;	
	}
	
	public function db_Select($strSelect) { 
		$result=mysql_query($strSelect,$this->conn); 
		if ($result) {
			if (mysql_num_rows($result)>0){
			return ($result);
			}
		else {
			return(0);
			}
		} 
			else {
				$result = mysql_error(); 
			}
	}
	
	function db_Fetch($resultat) {
	if ($resultat) {
		if (mysql_num_rows($resultat)>0) {
	return(mysql_fetch_array($resultat));
	} else {
		return false; 
	}
	} else
	return false;
	}
}
?>
