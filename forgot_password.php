<html>
<head>
    <title>Forgot My Password</title>
    <link rel="stylesheet" href="./boot/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function forgot_password() {
            var email = $('#email').val();
            //var token=
            var password=$('#password').val();
            var password_confirmation=$('#password_confirmation').val();
            var key = "e10adc3949ba59abbe56e057f20f883e";
            var action = "change_password";
            var data=action+''+email+''+password+''+password_confirmation+''+key;
            var hashed = md5(data);
            var userData = {
                action: action,
                email: email,
                password:password,
                password_confirmation:password_confirmation
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
            <td>Enter New Password</td>
            <td><input type="password" class="form-control"  name="password" id ="password"></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" class="form-control"  name="password_confirmation" id ="password_confirmation"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" value="Change Password"  onclick="forgot_password()">
            </td>
        </tr>
    </table>
</form>

</body>

</html>
