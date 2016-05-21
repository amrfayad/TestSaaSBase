<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Reset Password</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function resetpass() {
            var email = $('#email').val();
            var key = "e10adc3949ba59abbe56e057f20f883e";
            var action = "generate_reset_token";
            var data=action+''+email+''+key;
            var hashed = md5(data);
            var userData = {
                action: action,
                email: email,
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
<h1 align="center">Reset Password</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            <label for="Email">Enter Your Email</label>
            <input type="text" class="form-control"  name="email" id ="email">
        </div>
        <button type="button" class="btn btn-primary"  onclick="resetpass()">Reset Password</button>
    </div>
</div>
</body>
</html>
