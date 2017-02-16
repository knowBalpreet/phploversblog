<?php
  include 'includes/header.php';

  $db = new Database();

  if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "select * from posts where category = '$category' order by id desc ";

    $posts = $db->select($query);
  
  }else{

  $query = "select * from posts order by id desc";

  $posts = $db->select($query);
  }


  $query = "select * from categories";

  $categories = $db->select($query);

  if ($posts) { 
      while ($row = $posts->fetch_assoc()) {
    
    ?> 
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']);?> by <a href="#"><?php echo $row['author'];?></a></p>
            <p>
              <?php echo shortenText($row['body']);  ?>
            </p>

          <a href="post.php?id=<?php echo urlencode($row['id']);?>" class="readmore">Read More</a>
          </div><!-- /.blog-post -->

        <?php   }  }else{?>
          <p>There are no posts yet!</p>
        <?php   }   ?>


<?php     include 'includes/footer.php';  ?>
       
