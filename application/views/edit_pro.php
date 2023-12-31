<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #login{
            margin-left : 500px;
        }
        </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Edit Profile</h2>
        
        <div id="divMsg" class="alert alert-success" style="display: none">
         <span id="msg"></span>
        </div>
        <form action="<?php echo base_url('Registration/save'); ?>" method="POST" id="submitdata" enctype="multipart/form-data">
        <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div><div class="form-group">
                <label for="confirm_password"> Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>"required>
            </div>
            <div class="form-group">
            <div class="control-label image-label"><label>Profile Photo</label></div>
						<div class="form-control col-lg-8 col-sm-8 image-display" style="background-image:url('<?php echo base_url($profile_pic); ?>')"></div>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
			url: '<?php echo site_url('Registration/edit'); ?>',
			data: dataString,
			dataType:"json",
			success: function(response){
                if (response.status === 'success') {
                        alert(response.message); 
                    } else {
                        alert(response.message); 
                    }
            },
                error: function(xhr, status, error) {
                    console.error(error);
                }
        });
	});
});
</script>
</body>
</html>
