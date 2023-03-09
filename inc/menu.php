			            <nav id="sidebar">
				<div class="p-4 pt-5">
		  	
	        <ul class="list-unstyled components mb-5">
              <li <?php if ($pag == "dns") {echo "class=\"active\""; } ?> >
	              <a href="?pag=dns"><i class="fa fa-pencil-square-o"></i> DNS</a>
	          </li>
                  <li <?php if ($pag == "password") {echo "class=\"active\""; } ?>>
	              <a href="?pag=password"><i class="fa fa-lock"></i> Password</a>
	          </li>
                       <li>
	              <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
	          </li>
	   

	      </div>
    	</nav>