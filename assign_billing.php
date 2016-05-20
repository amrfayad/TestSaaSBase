<html>
    <head>
        <title>Ajax Example</title>
        <link rel="stylesheet" href="./boot/bootstrap.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/md5.min.js"></script>
        <script>
            function loginMessage() {
                var team_id = 1 ;
                var admin_pass = md5($('#pass').val());
                var user_id =2;
                var key = "e10adc3949ba59abbe56e057f20f883e";
                var action = "assign_billing"
                var data=action+''+team_id+''+admin_pass+''+user_id+''+key;
                var hashed = md5(data);
                var userData = {
                    action: action,
                    team_id: team_id,
                    pass: admin_pass,
                    user_id:user_id,
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
                
                <tr>
                    <td>Password</td>    
                    <td><input type="password" name="pass" id ="pass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" name="submit" value="LogIn" onclick="loginMessage()"></td>
                </tr>
            </table>
        </form>


    </body>

</html>
