<?php include 'includes/header.php'; ?>
<?php
  $id = @$_GET['id'];

  $db = new Database();

  $query = "select * from categories where id = '$id' ";

  $category = $db->select($query)->fetch_assoc();
  	if (isset($_POST['submit'])) {
		$category = mysqli_real_escape_string($db->link,$_POST['name']);

		$query = "update categories set name = '$category' where id ='$id'";
		$db->update($query) or die($db->error.__LINE__);

	}

	if (isset($_POST['delete'])) {
		$query = "delete from categories where id ='$id' ";
		$db->delete($query);
	}


?>
<form method="POST" action="edit_category.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" value="<?php echo $category['name'];?>"  placeholder="Enter Category Name">
  </div>
  <input type="submit" name="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-warning">Cancel</a>
    <input type="submit" name="delete" class="btn btn-danger" value="Delete">

</form>
<br>
<?php include 'includes/footer.php'; ?>