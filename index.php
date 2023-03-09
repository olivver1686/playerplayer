<?php	  
$db = new SQLite3('./api/user.db');
$db->exec("CREATE TABLE IF NOT EXISTS USERS(ID INT PRIMARY KEY,USERNAME TEXT ,PASSWORD TEXT,SESSAO TEXT)");
$sql ='SELECT COUNT(*) as count FROM USERS where USERNAME="'.$_COOKIE["usuario"].'" and SESSAO="'.$_COOKIE["sessao"].'"';
$rows = $db->query($sql);
$row = $rows->fetchArray();
$numRows = $row['count'];
$db->close();
if ($numRows <> 1 ){
header("Location:login.php");
} else {

if ($_REQUEST['pag'] == "") {
	$pag = "dns";
	} else {
	$pag = $_REQUEST['pag']; 
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>IMplayer Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		        
                                <link rel="stylesheet" href="css/padrao.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>


  </head>
  <body  style="text-align: center; font-size: 16px;" onload="iniciaForm();">
		
		<div class="wrapper d-flex align-items-stretch">

<?php
//menu
include("inc/menu.php");
//menu
?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Menu</span>Menu
            </button>              
        
  </div>
        </nav>
        
<?php
//conteudo
include("pag/$pag.php");
//conteudo
?>
            
        

  
     
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
  </body>
</html>
<?php } ?>