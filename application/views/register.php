<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Registration Form</h2>
        
	  	<div id="messages"></div>
        <form action="<?php echo base_url('Registration/save'); ?>" method="POST" id="submitdata" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div><div class="form-group">
                <label for="confirm_password"> Password:</label>
                <input type="password" class="form-control" id="password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="password">Profile pic:</label>
                <input type="file" name="profile_pic" required><br>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){    
	$("#submit").click(function(){

		var dataString = $("#submitdata :input").serializeArray();
		$.ajax({
			type: "POST",
			url: '<?php echo site_url('Registration/save'); ?>',
			data: dataString,
			dataType:'JSON',
			success: function(result){
                if(result.success == true) {
					$("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
					  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
					  result.messages+
					'</div>');

					$("#submitdata")[0].reset();
					$(".text-danger").remove();
					$(".form-group").removeClass('has-error').removeClass('has-success');

				}
				else {
					$.each(result.messages, function(index, value) {
						var element = $("#"+index);

						$(element)
						.closest('.form-group')
						.removeClass('has-error')
						.removeClass('has-success')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();

						$(element).after(value);

					});
				}
			}
        });
	});
});
</script>
</body>
</html>
