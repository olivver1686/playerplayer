<?php
  $db = new SQLite3('./api/user.db');
  if($_REQUEST['op'] == 'change') {
$sessao = "1";
$db->exec("UPDATE users 
			SET	USERNAME='".$_POST['username']."', 
				PASSWORD='".$_POST['password']."',
				SESSAO='".$sessao."' 
			WHERE 
        id='1' ");
echo '<script language="javascript">location = "login.php"</script>';
 }
  
$res = $db->query("SELECT * 
				  FROM users 
				  WHERE id='1'");
$row=$res->fetchArray();
$user = $row['USERNAME'];
$pass = $row['PASSWORD'];

$db->close();
  ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
 </head>
 <body>
   
 </body>

 
 <center>


<form action="" method="POST">
<input type="hidden" name="op" value="change">
<div>
   <p>
      <p> <label class="bmd-label-floating">Username</label><input name="username" type="text" autofocus required="required" class="form-control" placeholder="Username" autocomplete="off" value="<?php echo $user; ?>"></p>
         <p><label class="bmd-label-floating">Password</label><input name="password" type="text" autofocus required="required" class="form-control" placeholder="Password" autocomplete="off" value="<?php echo $pass; ?>"></p>
   
   
</div>
                                                <br>  <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                        </div>
                      
</form>
</center>
</html>