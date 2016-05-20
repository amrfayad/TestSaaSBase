<html>
<head>
    <link rel="stylesheet" href="./boot/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function add() {
            var role_name = $('#role').val();
            var key = "1234";
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
<form method="post">
    <table class="table">
        <tr>
            <td>Role</td>
            <td><input type="text" name="role" id ="role"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" name="submit" value="Add" onclick="add()"></td>
        </tr>
    </table>
</form>
</body>
</html>
