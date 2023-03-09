  <?php
  $db = new SQLite3('./api/user.db');
  if($_REQUEST['op'] == 'add') {

$db->exec("INSERT INTO dns(title, url) VALUES('".$_POST['title']."', '".$_POST['dns']."')");
$db->close();


$mensagemstatus = "<div class=\"alert alert-success\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Dns successfully registered</h4></div>";  
}
  

   
  ?>

 <center>
<?php echo $mensagemstatus;  ?>

<form action="" method="POST">
<input type="hidden" name="op" value="add">
<div>
   <p>
      <p><input name="title" type="text" autofocus required="required" class="form-control" placeholder="Title" autocomplete="off"></p>
         <p><input name="dns" type="url" autofocus required="required" class="form-control" placeholder="DNS" autocomplete="off"></p>
   
   
</div>
                                                <br>  <button class="btn btn-primary btn-lg btn-block" type="submit">Add DNS</button>
                        </div>
                      
</form>
</center>