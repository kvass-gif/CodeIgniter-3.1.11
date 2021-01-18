</div>
<main role="main" class="container">
<h3 class="head3"><?=$categoryName?></h3>
<table class="table">
  <thead>
    <tr class = "table-secondary">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  		
	<?php for($i = 0; count($list)>$i; $i++):?>
	
		<tr onclick=link(<?=$list[$i]['id']?>)>
	      <th scope="row" style="width: 5%"><?=$i+1?></th>
	      <td class = "col" style="width: 50%"><?=$list[$i]['title']?></td>
	      <td class = "col" style="width: 27%"><?=$list[$i]['author'][0]['name']?></td>
		  <td class = "col" style="width: 18%"><?=$list[$i]['date']?></td>
	    </tr>
		  	
	<?php endfor?>

  </tbody>
</table>
</main>
<script>
function link(id){
	window.location.href=`http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/SiteController/Post/${id}`; 
	return false;
}
</script>

</body>
</html>