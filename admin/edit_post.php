<?php include'includes/header.php' ?>
<?php
  $id = @$_GET['id'];

  $db = new Database();

  if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $body = mysqli_real_escape_string($db->link,$_POST['body']);
    $category = mysqli_real_escape_string($db->link,$_POST['category']);
    $author = mysqli_real_escape_string($db->link,$_POST['author']);
    $tags = mysqli_real_escape_string($db->link,$_POST['tags']);

    echo $title,$body,$category,$author,$tags;
    $query = "update posts set 
                title='$title',
                body='$body',
                category='$category',
                author='$author',
                tags='$tags' where
                id = '$id'";
    $db->update($query) or die($db->error.__LINE__);

  }

  if (isset($_POST['delete'])) {
    $query = "delete from posts where id = '$id' ";
    $db->delete($query);
  }

  $query = "select * from posts where id = '$id' ";

  $post = $db->select($query);

  $row = $post->fetch_assoc();

  $query = "select * from categories";

  $categories = $db->select($query);




  
?>

<form method="POST" action="edit_post.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" value="<?php echo $row['title'];?>" placeholder="Post Title" required>
  </div>
  <div class="form-group">
    <label>Post body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post body" required><?php echo $row['body'];?></textarea>
  </div>
  <div class="form-group">
    <label>Category Select</label>
    <select name="category" class="form-control" required>
    <?php while ($rowc = $categories->fetch_assoc()) { 
      if ($rowc['id'] == $row['category'] ) {
        $selected = "selected";
      }else{
        $selected = " ";
      }
      ?>
    	<option value="<?php echo $rowc['id'];?>" <?php echo $selected; ?>><?php echo $rowc['name'];?></option>
      <?php }  ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" value="<?php echo $row['author'];?>"  placeholder="Enter Author Name" required>
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" value="<?php echo $row['tags'];?>"  placeholder="Enter Tags">
  </div>
  <input type="submit" name="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-warning">Cancel</a>
  <input type="submit" name="delete" class="btn btn-danger" value="Delete">

</form>
  <br>

<?php include'includes/footer.php' ?>
