<?php
session_start();
$db = new SQLite3('./api/user.db');
$db->exec("CREATE TABLE IF NOT EXISTS USERS(ID INT PRIMARY KEY,USERNAME TEXT ,PASSWORD TEXT,SESSAO TEXT)");
$rows = $db->query("SELECT COUNT(*) as count FROM USERS");
$row = $rows->fetchArray();
$numRows = $row['count'];
if ($numRows == 0){
	$db->exec("INSERT INTO USERS(ID ,USERNAME, PASSWORD, SESSAO) VALUES('1' ,'admin', 'admin', '1')");
	}

function gerar_hash($length) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . rand(0, 99999);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

 function real_ip() {
	$ip = 'undefined';
	if (isset($_SERVER)) {
		$ip = $_SERVER['REMOTE_ADDR'];
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		elseif (isset($_SERVER['HTTP_CLIENT_IP'])) $ip = $_SERVER['HTTP_CLIENT_IP'];
	} else {
		$ip = getenv('REMOTE_ADDR');
		if (getenv('HTTP_X_FORWARDED_FOR')) $ip = getenv('HTTP_X_FORWARDED_FOR');
		elseif (getenv('HTTP_CLIENT_IP')) $ip = getenv('HTTP_CLIENT_IP');
	}
	$ip = htmlspecialchars($ip, ENT_QUOTES, 'UTF-8');
	return $ip;
}

if(isset($_POST['login'])) {
	
$sql ='SELECT COUNT(*) as count FROM USERS where USERNAME="'.$_POST["username"].'" and PASSWORD="'.$_POST["password"].'"';
$rows = $db->query($sql);
$row = $rows->fetchArray();
$numRows = $row['count'];

if($numRows == 1) {
$ts = time() + (3600*24*10);

$sessao = gerar_hash(256);

$db->exec("UPDATE USERS 
			SET	SESSAO= '".$sessao."'
			WHERE
        ID= 1");
setcookie("usuario", $_POST["username"]);
setcookie("sessao", $sessao);
header("Location:index.php");
}else {header("Location: login.php?sess=erro");}

}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
        <link rel="stylesheet" href="css/padrao.css">
          </head>
  <body style="text-align: center; font-size: 24px;">
		
		<div class="wrapper d-flex align-items-stretch">



        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

<p style="font-size: 24px">Welcome</p>
<p style="font-size: 16px">Login with your details below.</p>
<?php
                        if($_GET['sess'] == 'erro') { ?>
						<center><h5> Invalid data! Check the data entered. <br>
Reminder: the system is case sensitive.</h5></center>
                        <?php	
						}
                        ?>
<form action="" method="POST">
<div>
   <input type="text" class="form-dados" name="username" placeholder="Username">
  </div>
                          <input type="password" class="form-dados" name="password" placeholder="Password"><br>
                     
                        <center> <br> <button class="page-link" name="login" type="submit">Sign in</button></center>
                           
<p>Time Of Arrival: "<i><?php echo  date('Y-m-d H:i:s')?></i>"</p>
				<p>IP Address: "<i><?php echo  real_ip()?></i>"</p>
                        </div>
                      
</form>

        

            
          </div>
        </nav>



    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>