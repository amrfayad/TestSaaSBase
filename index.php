<html>
    <head>
        <title>Ajax Example</title>
        <link rel="stylesheet" href="./boot/bootstrap.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/md5.min.js"></script>
        <script>
            function loginMessage() {
                var email = $('#email').val();
                var pass = $('#pass').val();
                var key = "1234";
                var action = "login";
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
