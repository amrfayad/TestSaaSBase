<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Role</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>
<script>
    function add() {
        var role_name = $('#role').val();
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var action = "add_role";
        var data = action + '' + role_name + '' + key;
        var hashed = md5(data);
        var roleData = {
            action: action,
            role_name:role_name
        };
        $.ajax(
            {
                type: 'post',
                url: 'http://localhost/SaaSBase/index.php',
                data: {
                    data: roleData,
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
<h1 align="center">Add Role</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            <label for="Role">Role</label>
            <input type="text" class="form-control" name="role" id ="role">
        </div>
        <button type="button" name="submit" class="btn btn-primary" onclick="add()">Add</button>
    </div>
</div>
</body>
</html>
