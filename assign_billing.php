<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Assign Billing</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
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
    <br><br>
    <h1 align="center">Assign Billing</h1>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="pass" id ="pass">
            </div>
            <button type="button" name="submit" class="btn btn-primary" onclick="loginMessage()">Login</button>
        </div>
    </div>
    </body>

</html>
