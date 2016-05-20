<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>
<script>
    function loginMessage() {
        var email = $('#email').val();
        var pass = $('#pass').val();
        var key = "1234";
        var action = "login"
        var data=action+''+email+''+pass+''+key;
        var hashed = md5(data);
        var userData = {
            action: action,
            email: email,
            pass: pass,
        };
        $.ajax(
            {
                type: 'post',
                url: 'http://localhost/SaaSBase/index.php',
                data: {
                    data: userData,
                    hash: hashed,
                },
                success: function (data)
                {
                    alert(data);

                }
            });
    }
    function signupMessage() {
        $.ajax(
            {
                type: 'post',
                url: 'http://localhost/SaaSBase/index.php',
                data: {
                    action: "signup",
                    name: "amr",
                    pass: "123456"
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
<h1 align="center">SignUp Form</h1>
<div class="container">
    <div class="form">

        <div class="form-group">
            <label for="Name">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="pass" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" onclick="signupMessage()">SignUp</button>

    </div>
</div>
</body>

</html>
