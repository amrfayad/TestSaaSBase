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
                var pass = md5($('#pass').val());
                var key = "e10adc3949ba59abbe56e057f20f883e";
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
        </script>
    <body>
<<<<<<< HEAD:login.php
    <br><br>
    <h1 align="center">Login Form</h1>
    <div class="container">
        <div class="form">

            <div class="form-group">
                <label for="Email1">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="pass" placeholder="Password">
            </div>
        </div>
            <button type="submit" class="btn btn-primary" onclick="loginMessage()">Login</button>
    </div>
        <form method="post">
            <table class="table">
                <tr><td>User Email</td>
                    <td><input type="text" name="usname" id ="email"></td>
                </tr>
                <tr>
                    <td>Password</td>    
                    <td><input type="password" name="pass" id ="pass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" name="submit" value="LogIn" onclick="loginMessage()"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="register.php">signup</a></td>
                </tr>
            </table>
        </form>
    </body>

</html>