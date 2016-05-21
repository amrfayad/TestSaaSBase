<html>
<head>
    <title>Invite Users</title>
    <link rel="stylesheet" href="./boot/bootstrap.css">
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
<form method="post">
    <table class="table">
        <tr><td>Enter Your Admin Email</td>
            <td><input class="form-control" type="text" name="admin_email" id ="admin_email"></td>
        </tr>
        <tr>
            <td>Invited Emails Sperated By Enter "New Line"</td>
            <td><textarea class="form-control" type="text" name="invited_emails" id ="invited_emails"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" value="invite" onclick="invite()"></td>
        </tr>

    </table>
</form>
</body>

</html>
