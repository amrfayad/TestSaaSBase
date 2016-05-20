<html>
	<head>
    <title>Registration System</title>
    <link rel="stylesheet" href="./boot/bootstrap.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function signupMessage() {
            var name = $('#name').val();
            var mail = $('#email').val();
            var pass = md5($('#passwd').val());
            var action = "signup";
            var team_id = $('#team_id').val();
            var Data;
            var key = 'e10adc3949ba59abbe56e057f20f883e';
            var hashed;
            if (team_id === undefined)
            {
                var data = action + '' + name + '' + mail + '' + pass + '' + key;
                hashed = md5(data);
                Data = {
					action: action,
                    name: name,
                    email: mail,
                    pass: pass
                };
        	$.ajax(
                        {
                            type:'post',
                            url:'http://localhost/SaaSBase/index.php',
                            data:{
                              data:userData,
                              hash:hashed
              },
                success:function(data)
                            {
                                alert(data);
                               
                            }
                             
                        });

            else
            {
                var data = action + '' + name + '' + mail + '' + pass + '' + team_id +''+ key ;
                hashed = md5(data);
                Data = {
                    action: action,
                    name: name,
                    email: mail,
                    pass: pass,
                    team_id: team_id
                };
            }
            $.ajax(
                    {
                        type: 'post',
                        url: 'http://localhost/SaaSBase/index.php',
                        data: {
                            data: Data,
                            hash: hashed
                        },
                        success: function (data)
                        {
                            alert(data);

                        }

                    });
        }
    </script>
</head>
<body>
    <form method="post">
        <table align="center" width="30%" border="0">
            <tr>
                <td><input type="text" name="uname" id="name" placeholder="User Name" required /></td>
            </tr>
            <tr>
                <td><input type="email" name="email"  id="email" placeholder="Your Email" required /></td>
            </tr>
            <tr>
                <td><input type="password" name="pass" id="passwd" placeholder="Your Password" required /></td>
            </tr>
            <?php if (isset($_GET['team_id'])) { ?>
                <tr>
                    <td><input type="hidden" name="team_id" id="team_id" value="<?php echo $_GET['team_id'] ?>"/></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td><input type="button" name="submit" value="SignUp" onclick="signupMessage()"></td>
            </tr>
        </table>
    </form>
</body>
</html>