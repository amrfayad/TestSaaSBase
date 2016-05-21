<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Activate & Deactivate User</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>
<script>
    function activeUser() {
        var user_id = $('#user_id').val();
        var admin_id = 1;
        var password = $('#password').val();
        var team_id = 1;
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var action = "activateUser_inTeam";
        var data = action + '' + user_id + '' + admin_id +'' + password + '' + team_id + '' + key;
        var hashed = md5(data);
        var userData = {
            action: action,
            user_id:user_id,
            admin_id:admin_id,
            password:password,
            team_id:team_id
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

    function deactivateUser() {
        var user_id = $('#user_id').val();
        var admin_id = 1;
        var password = $('#password').val();
        var team_id = 1;
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var action = "deactivateUser_inTeam";
        var data = action + '' + user_id + '' + admin_id + '' + password + '' + team_id + '' + key;
        var hashed = md5(data);
        var userData = {
            action: action,
            user_id:user_id,
            admin_id:admin_id,
            password:password,
            team_id:team_id
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
<h1 align="center">Active & Deactivate User</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            <label for="Account">User ID</label>
            <input type="text" class="form-control" name="user_id" id ="user_id">
        </div>
        <div class="form-group">
            <label for="Password">Admin Password</label>
            <input type="password" class="form-control" name="password" id ="password">
        </div>

        <input type="hidden" name="team_id" id ="team_id">

        <button type="button" name="submit" class="btn btn-success" onclick="activeUser()">Activate</button>
        <button type="button" name="submit" class="btn btn-danger" onclick="deactivateUser()">Deactivate</button>

    </div>
</div>
</body>
</html>
