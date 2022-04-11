<?php 
	require 'inc/bootstrap.php';
  	App::getAuth()->restrict();

  	require 'inc/header.php';

	  $db = App::getDatabase();
  	$req = $db->query('SELECT * FROM users'); ?>
  	<div class="px-16 py-16 w-4/5">
  	<table class="border-separate border border-green-800 w-full text-center">
    	<thead>
    	    <tr>
    	        <th class="border border-green-600">id</th>
    	        <th class="border border-green-600">username</th>
    	        <th class="border border-green-600">email</th>
    	        <th class="border border-green-600">status</th>
              <th colspan="2" class="border border-green-600">Privileges</th>
              <th class="border border-green-600">supprimer</th>
    	    </tr>
    	</thead>
    	<tbody>
    	<?php
		while($user = $req->fetch()){
      echo
    	   "<tr>
    	        <td class='border border-green-600'>". $user->id ."</td>
    	        <td class='border border-green-600'>". $user->username ."</td>
    	        <td class='border border-green-600'>". $user->email ."</td>
    	        <td class='border border-green-600'>". $user->status ."</td>
              <td class='border border-green-600'> <a href='privilegesUp.php?id=".$user->id."&status=".$user->status."'>+</a></td>
              <td class='border border-green-600'> <a href='privilegesDown.php?id=".$user->id."&status=".$user->status."'>-</a></td>
              <td class='border border-green-600'> <a href='ban.php?id=".$user->id."'>❌</a></td>
    	    </tr>";
    	} ;
		?>
		</tbody>
		</table>
	</div>

	<div class="px-12 py-2">
		<a href="admin.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
	</div>
