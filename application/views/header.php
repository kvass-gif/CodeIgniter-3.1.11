<!DOCTYPE html>
<!-- saved from url=(0048)https://getbootstrap.com/docs/4.4/examples/blog/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.6">
  <title>Blog Template · Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/blog/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
  <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">
  <link type="text/css" rel="stylesheet" href="magicscroll/magicscroll.css"/>
  <script type="text/javascript" src="magicscroll/magicscroll.js"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .head3{
        text-align: center;
        background-color: #25272B ;
        color: white;
        margin: 0;
        padding: 10px;
       
    }
    .comment{
      background-color: #E3E3E3;
      margin: 10px 0;
      padding: 10px;
      border-radius: 10px;
    }
    .time{
      margin-top: 10px;
      text-align: right;
      font-size: small;
      opacity: 0.5;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="./Blog Template · Bootstrap_files/css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./Blog Template · Bootstrap_files/blog.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <?php $i = 0; ?>
          <a class="text-muted" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
        <h4>
          <u><i><a class="blog-header-logo text-dark" href="http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/SiteController/Main">Blog-post</a></i></u>
          </h3>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
              <title>1</title>
              <circle cx="10.5" cy="10.5" r="7.5"></circle>
              <path d="M21 21l-5.2-5.2"></path>
            </svg>
          </a>
          <a class="btn btn-sm btn-outline-secondary" href="">Sign Up</a>
        </div>
      </div>
    </header>
	<div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <?php foreach ($categories as $value) : ?>
          <a class="p-2 text-muted" href="http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/SiteController/CategoryList/<?=$value['id']?>"><?=$value['name']?></a>
        <?php endforeach ?>
      </nav>
    </div>
	
   
	
