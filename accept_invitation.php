<html>
<head>
    <link rel="stylesheet" href="./boot/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function accept_invite() {
            var pass = $('#pass').val();
            var email = $('#email').val();
            var key = "1234";
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
<form method="post">
    <table class="table">
        <tr><td>User Email</td>
            <td><input type="text" name="email" id ="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass" id ="pass"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="team_id" id ="team_id"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" name="submit" value="Accept" onclick="accept_invite()"></td>
        </tr>
    </table>
</form>
</body>
</html>
