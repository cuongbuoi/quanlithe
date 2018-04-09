<?php
require "function.php";
if(!isset($_SESSION['id']))
{
	header('location: ./index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lí thẻ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<nav class="navbar navbar-light bg-faded navbar-custom">
	  <a class="navbar-brand" href="#"><h1>Quản lí thẻ</h1></a>
	    <a class="navbar-brand pull-right" href="./logout.php"><span style="color: #fff;"><i class="fa fa-power-off"></i></span></a>
	  
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card thongke">
					<div class="card-block">
						<div class="col-md-12">
							<div class="card the">
								<div class="card-block">
									<div class="banner">
										<h3 class="card-title">Tổng số thẻ</h3>
									</div>
									<span class="card-text1"><?php echo laydulieu("tong"); ?></span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card the">
								<div class="card-block">
									<div class="banner1">
										<h3 class="card-title">Thẻ đã duyệt</h3>
									</div>
									<span class="card-text2"><?php echo laydulieu("duyet"); ?></span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card the">
								<div class="card-block">
									<div class="banner2">
										<h3 class="card-title">Thẻ chưa duyệt</h3>
									</div>
									<span class="card-text3"><?php echo laydulieu("chuaduyet"); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card table-the">
					<div class="card-block">
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							        <thead>
							            <tr>
							                <th>STT</th>
							                <th>Tên</th>
							                <th>Mã thẻ</th>
							                <th>Serial</th>
							                <th>Ngày nạp</th>
							                <th>Duyệt thẻ</th>
							            </tr>
							        </thead>
							        <tbody>
							            
							            
							        </tbody>
							    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

</body>
<script>
var table = $('#example').DataTable({
	    	"ajax": './function.php?action=getfull',
	    	"dataSrc": "data"
	    });
function set_status(id)
		{
			$.ajax({
				url: './function.php?action=status',
				type: 'POST',

				data: {id_data: id},
				success:function(concc)
				{
					if($.trim(concc) === "ok")
					{
						table.ajax.reload();
						location.reload();
					}
				}
			})
			
			
		}
	$(document).ready(function() {
		
	    table.ajax.reload();
	} );
</script>
</html>