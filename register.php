<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>

<script>
    function signupMessage(){
        var name=$('#name').val();
        var mail=$('#email').val();
        var pass=md5($('#passwd').val());
        var action="signup";
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var data=action+''+name+''+mail+''+pass+''+key;
        //alert(data); exit;
        var hashed = md5(data);
        var Data = {
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
                    data:Data,
                    hash:hashed
                },
                success:function(data)
                {
                    alert(data);

                }

            });
    }
</script>
<body>
<br><br>
<h1 align="center">SignUp Form</h1>
<div class="container">
    <div class="form">

        <div class="form-group">
            <label for="Name">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="passwd" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" onclick="signupMessage()">SignUp</button>
    </div>
</div>
</body>
</html>