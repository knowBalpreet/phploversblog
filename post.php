<?php     include 'includes/header.php';  
  
  $id = @$_GET['id'];

  $db = new Database();

  $query = "select * from posts where id = '$id' ";

  $post = $db->select($query);

  $query = "select * from categories";

  $categories = $db->select($query);

      $row = $post->fetch_assoc()
    
?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']);?> by <a href="#"><?php echo $row['author'];?></a></p>
            <p>
              <?php echo $row['body'];  ?>
            </p>

          </div><!-- /.blog-post -->


<?php     include 'includes/footer.php';  ?>
       
