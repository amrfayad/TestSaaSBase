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
              }
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
</div>
</body>
</html>
