<?php include'includes/header.php' ?>
<?php

$db = new Database();

	if (isset($_POST['submit'])) {
		$title = mysqli_real_escape_string($db->link,$_POST['title']);
		$body = mysqli_real_escape_string($db->link,$_POST['body']);
		$category = mysqli_real_escape_string($db->link,$_POST['category']);
		$author = mysqli_real_escape_string($db->link,$_POST['author']);
		$tags = mysqli_real_escape_string($db->link,$_POST['tags']);

		echo $title,$body,$category,$author,$tags;
		$query = "insert into posts (title,body,category,author,tags) values ('$title', '$body', '$category', '$author', '$tags')";
		$db->insert($query) or die($db->error.__LINE__);

	}

  $query = "select * from categories";

  $category = $db->select($query);

?>

<form method="POST" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control"  placeholder="Post Title" required>
  </div>
  <div class="form-group">
    <label>Post body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post body" required></textarea>
  </div>
  <div class="form-group">
    <label>Category Select</label>
    <select class="form-control" name="category" required>
      <?php 	while ($row = $category->fetch_assoc()) {?>
    	<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
      <?php 	}	?>	
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control"  placeholder="Enter Author Name" required>
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control"  placeholder="Enter Tags">
  </div>
  <input type="submit" name="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-warning">Cancel</a>
</form>
  <br>

<?php include'includes/footer.php' ?>
