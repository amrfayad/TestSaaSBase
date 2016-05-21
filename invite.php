<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Invite Users</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>
<script>

    function invite() {
        var admin_email = $('#admin_email').val();
        var invited_emails = $('#invited_emails').val();
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var action = "invite_users";
        var data=action+''+admin_email+''+invited_emails+''+key;
        var hashed = md5(data);
        var userData = {
            action: action,
            admin_email: admin_email,
            invited_emails: invited_emails,
        };
        $.ajax(
            {
                type:'post',
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
<h1 align="center">Invite Users</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            <label for="Email">Enter Your Admin Email</label>
            <input type="email" class="form-control" name="admin_email" id ="admin_email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="Email">Invited Emails Sperated By Enter "New Line"</label>
            <textarea class="form-control" type="text" name="invited_emails" id ="invited_emails"></textarea>
        </div>

        <button type="button" class="btn btn-primary" onclick="invite()">Invite</button>
    </div>
</div>
</body>
</html>
