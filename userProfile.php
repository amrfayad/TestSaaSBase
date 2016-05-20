<html>
<title>Registration System</title>
<link rel="stylesheet" href="./boot/bootstrap.css">

<script src="js/jquery.min.js"></script>
<script src="js/md5.min.js"></script>

<script>
function signupMessage(){
    var action="get_profile";
var Data = {
            action: action
                };
        $.ajax(
                        {
                            type:'post',
                            url:'http://localhost/SaaSBase/index.php',
                            data:{
                              data:Data,
              },
                success:function(data)
                            {
                                alert(data);
                               
                            }
                             
                        });
            }
</script>
</head>
<body>
<form method="post">
<tr>
  <td><input type="button" name="submit" value="ShowProfile" onclick="signupMessage()"></td>
</tr>
</table>
</form>
</body>
</html>