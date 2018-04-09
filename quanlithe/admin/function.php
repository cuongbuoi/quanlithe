<?php 
session_start();
if(!isset($_SESSION['id']))
{
	header('location: ./index.php');
}
require_once"db.php";

	if(isset($_GET['action']))
	{
		if($_GET['action'] == "getfull")
			{
				echo get_list();
			}
		elseif ($_GET['action'] == "full") {
			echo laydulieu("tong");
		}
		elseif ($_GET['action'] == "duyet") {
			echo laydulieu("duyet");
		}
		elseif ($_GET['action'] == "chuaduyet") 
		{
			echo laydulieu("chuaduyet");
		}
		elseif ($_GET['action'] == "status") 
		{
			if(isset($_POST['id_data']))
			{
				if(set_status($_POST['id_data']))
				{
					echo "ok";
				}
				else
				{
					echo "error";
				}
			}
		}
		
	}

	function get_list()
	{
		$db= new db();
		$que="select stt,ten,mathe,seri,ngaynap,status from the";
		$query=$db->mysql->query($que);

		if($query)
		{
			$re=array();
		
			while($row=$query->fetch_assoc())
			{
				$t = array();
				if($row['status'] == 0)
				{
					array_push($row,"<button class='btn btn-danger' onclick='set_status($row[stt])'>Duyệt</button>");
				}
				else
				{
					array_push($row,"<button class='btn btn-success' disabled onclick='set_status($row[stt])'>Đã xử lý</button>");
				}
				
				foreach ($row as $key => $value) {
				
						array_push($t,$value);
										
				}
				array_splice($t, 5,1);
				array_push($re,$t);
				unset($t);
				
			}
			
			$re = array("data" => $re);
			return json_encode($re,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
		}
		/*else
		{
			return false;
		}*/

	}

	function filter($date)
	{
		$db= new db();
		$que="select * from the where ngaynap='".$date."'";
		$query=$db->mysql->query($que);
		if($query)
		{
			$re=array();
			$re=array();
			while($row=$query->fetch_assoc())
			{
				array_push($row,"<button class='btn btn-error' onclick='set_status($row[stt])'></button>");
				array_push($re,$row);
			}
			var_dump($re);
			//return json_encode($re,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
		}
		/*else
		{
			return false;
		}*/

	}

	function laydulieu($action)
	{
		$db = new db();
		if($action == "tong")
		{
			return $db->mysql->query("select * from the")->num_rows;
		}
		elseif ($action == "duyet") {
			return $db->mysql->query("select * from the where status = 1")->num_rows;
		}
		else
		{
			return $db->mysql->query("select * from the where status = 0")->num_rows;
		}
	}
	
	function set_status($id)
	{
		$db= new db();
		$tk=$db->mysql->real_escape_string($id);
		$que="update the set status=1 where stt=".$tk."";
		$query=$db->mysql->query($que);
		if($query)
			return true;
		else
			return false;

	}
	
	




?>