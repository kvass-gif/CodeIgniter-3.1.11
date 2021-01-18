

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic"><?=$longerBlog['title']?></h1>
        <p class="lead my-3"><?=$longerBlog['description']?></p>
        <p class="lead mb-0"><a href="http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/SiteController/Post/<?=$longerBlog['id']?>" class="text-white font-weight-bold">Сontinue</a></p>
      </div>
    </div>

    
<?php
// echo "<pre>";
// var_dump($categories);
// echo '</pre>';
function categoryName($categories,$randBlog){
$catId = $randBlog['category_id'];
$categoryName = (string)null;
foreach($categories as $value){
  if($value['id'] == $catId){
    $categoryName = $value['name'];
    break;
  }
}
return $categoryName;
}



?>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary"><?=categoryName($categories,$randBlog1)?></strong>
            <h3 class="mb-0"><?=$randBlog1['title']?></h3>
            <div class="mb-1 text-muted"><?=$randBlog1['date']?></div>
            <p class="card-text mb-auto"><?=$randBlog1['description']?></p>
            <a href="http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/SiteController/Post/<?=$randBlog1['id']?>" class="stretched-link">Сontinue</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success"><?=categoryName($categories,$randBlog2)?></strong>
            <h3 class="mb-0"><?=$randBlog2['title']?></h3>
            <div class="mb-1 text-muted"><?=$randBlog2['date']?></div>
            <p class="mb-auto"><?=$randBlog2['description']?></p>
            <a href="http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/SiteController/Post/<?=$randBlog2['id']?>" class="stretched-link">Сontinue</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
  