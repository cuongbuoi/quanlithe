<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kiểm tra thẻ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt="IMG"></a>
		</div>
		<div class="container-contact2">
			<div class="col-md-4 col-sm-12 gate">
				<img src="images/gate.png" alt="IMG">
				<img src="images/gate2.png" alt="IMG">
			</div>
			<div class="wrap-contact2 mt-5">
				<form id="form-send" class="contact2-form" action="#" method="POST">
					<span class="contact2-form-title">
						Mời bạn nhập thẻ cần kiểm tra
					</span>

					<div class="wrap-input2">
						<input class="input2" type="text" id="name" name="name">
						<span class="focus-input2" data-placeholder="Họ và tên"></span>
					</div>
					<div class="input-group">
						<div class="wrap-input2">
							<input id="s1" class="input2" type="text" name="the" maxlength="4"  pattern="[0-9]{4}" title="Bạn phải nhập đủ 4 số">
							<span class="focus-input2" data-placeholder="4 mã số đầu"></span>
						</div>
						<div class="wrap-input2">
							<input id="s2" class="input2" type="text" name="the"  maxlength="4" pattern="[0-9]{4}" title="Bạn phải nhập đủ 4 số">
							<span class="focus-input2" data-placeholder="4 mã số tiếp theo"></span>
						</div>
						<div class="wrap-input2">
							<input id="s3" class="input2" type="text" name="the"  maxlength="2" pattern="[0-9]{2}" title="Bạn phải nhập đủ 2 số">
							<span class="focus-input2" data-placeholder="2 mã số cuối"></span>
						</div>
					</div>
					<div class="wrap-input2">
						<input id="seri" class="input2" type="text" name="serial"  maxlength="10" pattern="[A-Z]{2}[0-9]{8}" title="Bạn phải nhập đúng số serial trên thẻ">
						<span class="focus-input2" data-placeholder="Serial"></span>
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn" id="submit-send">
								Kiểm tra thẻ
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.js"></script>
	<script type="text/javascript">
		$(function() {
			function send(ten,mathe,serial)
			{
				$.ajax({
					url: '/insert.php',
					type: 'POST',
					data: {ten: ten,
						masothe:mathe,
						seri:serial},
					success:function(res)
					{
                       if($.trim(res) === "true")
                       	{
                       		toastr["success"]("Gửi thẻ thành công vui lòng đợi xác nhận !", "Thông báo")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
                       	}
                       	else{
                       		toastr["error"]("Thẻ đã được sử dụng", "Lỗi")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
                       	}

					}
				})
				
				
			}

			// function submit()
			// {
			// 	var ten = $("#name").val();
			// 	var mathe = $("#s1").val() + $("#s2").val() + $("#s3").val();
			// 	var seri = $("#seri").val();
			// 	console.log(
			// }
			$("#form-send").submit(function(event) {
				event.preventDefault();
				var ten = $("#name").val();
				var mathe = $("#s1").val() + $("#s2").val() + $("#s3").val();
				var seri = $("#seri").val();
			
				
				send(ten,mathe,seri)
			});
		});
	</script>
</body>
</html>
