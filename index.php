<html>
    <head>
        <title>Ajax Example</title>
        <link rel="stylesheet" href="./boot/bootstrap.css">
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
                    <td><input type="button" name="submit" value="SignUp" onclick="signupMessage()"></td>
                </tr>
            </table>
        </form> 


    </body>

</html>
