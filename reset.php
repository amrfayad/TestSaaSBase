<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="./boot/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function resetpass() {
            var email = $('#email').val();
            var key = "e10adc3949ba59abbe56e057f20f883e";
            var action = "generate_reset_token";
            var data=action+''+email+''+key;
            var hashed = md5(data);
            var userData = {
                action: action,
                email: email,
            };
            $.ajax(
                {
                    type:'POST',
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
<form method="POST">
    <table class="table">
        <tr>
            <td>Enter Your Email</td>
            <td><input type="text" class="form-control"  name="email" id ="email"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" value="ResetPassword"  onclick="resetpass()">
            </td>
        </tr>
    </table>
</form>

</body>

</html>
