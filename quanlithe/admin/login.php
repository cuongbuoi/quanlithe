<?php 
session_start();
require "db.php";

if(isset($_POST['username']) && isset($_POST['password']) )
{
	if(login($_POST['username'],$_POST['password']))
	{
		$_SESSION["id"] = $_POST['username'];
		echo 'ok';
	}
	else
	{
		echo 'error';
	}
}



function login($id,$pass)
	{
		$db= new db();
		$tk=$db->mysql->real_escape_string($id);
		$mk=$db->mysql->real_escape_string($pass);
		$que="select * from admin where id='".$tk."'and pass='".$mk."'";
		
		$query=$db->mysql->query($que)->fetch_assoc();
		return count($query)>0? true:false;
			
	}

 ?>