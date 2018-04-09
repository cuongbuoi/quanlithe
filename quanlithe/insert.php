<?php 
require 'db.php';

if(isset($_POST['ten']) && isset($_POST['masothe']) && isset($_POST['seri']) )
{
	echo insert_the($_POST['ten'],$_POST['masothe'],$_POST['seri']);
}
else
{
	echo "deo vo";
}

function insert_the($ten,$masothe,$seri)
{
	$db = new db();
	$ten = $db->mysql->escape_string($ten);
	$masothe = $db->mysql->escape_string($masothe);
	$seri = $db->mysql->escape_string($seri);
	$query = $db->mysql->query("insert into the values (0,'".$ten."','".$masothe."','".$seri."','".date("Y-m-d")."', 0)");
	if($query)
	{
		return 'true';
	}
	else
	{
		return "error";
	}
}

 ?>