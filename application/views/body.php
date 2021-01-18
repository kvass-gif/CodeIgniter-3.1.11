
</div>
  <main role="main" class="container">
    <div class="row">
      <div class="col-md-8 blog-main">
        

        <div class="blog-post">
        <?php
        // echo "<pre>";
        // var_dump($comments);
        // echo "</pre>";
        ?>
          <h2 class="blog-post-title"><?=$post[0]['title']?></h2>

          <p class="blog-post-meta" style="opacity: 0.5;">
          <span>Date of addition: <?=$post[0]['date']?></span>
          <br>
          <span>Status: <?=$post[0]['status']?></span>
          </p>

          <p><?=$post[0]['description']?></p>
          <hr>

          <p>
          <?=$post[0]['content']?>
          </p>
          
        </div><!-- /.blog-post -->
        <hr>
        <div class="comments">
        <h3>Comments</h3>
        <?php foreach($comments as $value):?>
          <div class="comment">
          <?=$value['text']?>
          <div class="time"><?=$value['date_time']?></div>
          </div>
        <?php endforeach?>
        </div>


      

      </div><!-- /.blog-main -->

      <aside class="col-md-4 blog-sidebar">

      <?php foreach($photos as $value):?>
        <img style="width: 100%; margin-top:10px" src="<?=$value['Photo_Path']?>" alt="qwe">
        <?php endforeach ?>

      </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

  </main><!-- /.container -->

</body>
</html>