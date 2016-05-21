<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Accept Invitation</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>
<script>
    function accept_invite() {
        var pass = $('#pass').val();
        var email = $('#email').val();
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var action = "accept_invitation";
        var data = action + '' + email + '' + pass + '' + key;
        var hashed = md5(data);
        var userData = {
            action: action,
            email: email,
            pass: pass,
            team_id: 1
        };
        $.ajax(
            {
                type: 'post',
                url: 'http://localhost/SaaSBase/index.php',
                data: {
                    data: userData,
                    hash: hashed
                },
                success: function (data) {
                    alert(data);

                }
            });
    }
</script>
<body>
<br><br>
<h1 align="center">Accept Invitation</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            <label for="Email">User Email</label>
            <input type="text" class="form-control" name="email" id ="email">
        </div>

        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="pass" id ="pass">
        </div>
        <input type="hidden" name="team_id" id ="team_id">
        <button type="button" name="submit" class="btn btn-primary" onclick="accept_invite()">Accept</button>
    </div>
</div>
</body>
</html>
