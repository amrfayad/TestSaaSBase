<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Info</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>

<script>
    function signupMessage(){
        var action="get_profile";
        var id=$('#user_id').val();
        var key = "e10adc3949ba59abbe56e057f20f883e";
        var data=action+''+id+''+key;
        var hashed = md5(data);


        var Data = {
                action: action,
                user_id:id
                    };
            $.ajax(
                            {
                                type:'post',
                                url:'http://localhost/SaaSBase/index.php',
                                data:{
                                  data:Data,
                                  hash:hashed,
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
<h1 align="center">User Info</h1>
<div class="container">
    <div class="form">
        <div class="form-group">
            Enter User ID:
            <input  type="text" name="user_id" id="user_id"/>
        </div>
        <div class="form-group">
            <button type="button" name="submit" class="btn btn-primary" onclick="signupMessage()">ShowProfile</button>
        </div>
    </div>
</div>
</body>
</html>