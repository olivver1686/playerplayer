<?php
$db = new SQLite3('./api/user.db');
$db->exec("CREATE TABLE IF NOT EXISTS dns(id INTEGER PRIMARY KEY NOT NULL, title VARCHAR(50), url VARCHAR(50))");

$res = $db->query('SELECT * FROM dns');

if($_REQUEST['op'] == 'delete') {
			 
$db->exec("DELETE FROM dns WHERE id=".$_REQUEST['id']);

	
	$mensagemstatus = "<div class=\"alert alert-danger\" id=\"flash-msg\"><h4><i class=\"icon fa fa-times\"></i>Dns successfully deleted</h4></div>";  
 }




?>

<center> <?php echo $mensagemstatus;  ?>
 <form action="?pag=register" method="POST">
              <input type="submit" name="submit" id="submit"  class="btn btn-sm btn-outline-secondary" value="Add DNS">
</form><br>
</center>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">DNS</th>
       <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  while ($row = $res->fetchArray()) {
					$id = $row['id'];
					$title = $row['title'];
					$url = $row['url'];
   ?>
    <tr>
           <td><?php echo $title; ?></td>
      <td><?php echo $url; ?></td>
         <td><div class="btn-group"><form action="" method="POST">
      <input type="hidden" name="op" value="delete">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
         
         <!-- Botão para acionar modal -->
<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modal<?php echo $id; ?>">
  Delete
</button>   
                        
            <!-- Modal -->
<div class="modal fade" id="modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you will delete the dns <?php echo $url; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="submit" id="submit" class="btn alert-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
      
</form>

</div>
</td>
    </tr>
     <?php }?>
    
    

  </tbody>
</table>