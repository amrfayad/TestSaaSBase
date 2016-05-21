<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Forget My Password</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function forgot_password() {
            var email = $('#email').val();
            //var token=
            var password=$('#password').val();
            var password_confirmation=$('#password_confirmation').val();
            var key = "e10adc3949ba59abbe56e057f20f883e";
            var action = "change_password";
            var data=action+''+email+''+password+''+password_confirmation+''+key;
            var hashed = md5(data);
            var userData = {
                action: action,
                email: email,
                password:password,
                password_confirmation:password_confirmation
            };
            $.ajax(
                {
                    type:'POST',
                    url:'http://localhost/SaaSBase/index.php',
                    data:{
                        data: userData,
                        hash: hashed,
                    },
                    success: function (data)
                    {
                        alert(data);
                    }
                });
        }
    </script>
<body>
<br><br>
<h1 align="center">Forget My Password</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            <label for="email">Enter Your Email</label>
            <input type="text" class="form-control"  name="email" id ="email">
        </div>
        <div class="form-group">
            <label for="password">Enter New Password</label>
            <input type="password" class="form-control"  name="password" id ="password">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control"  name="password_confirmation" id ="password_confirmation">
        </div>
        <button type="button" class="btn btn-primary"  onclick="forgot_password()">Change Password</button>
    </div>
</div>
</body>
</html>
