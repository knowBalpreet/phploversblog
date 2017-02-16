<?php include 'includes/header.php'; ?>
<?php
$db = new Database();

	if (isset($_POST['submit'])) {
		$category = mysqli_real_escape_string($db->link,$_POST['name']);

		$query = "insert into categories (name) values ('$category')";
		$db->insert($query) or die($db->error.__LINE__);

	}

?>

<form method="POST" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="Enter Category Name" required>
  </div>
  <input type="submit" name="submit" class="btn btn-default" value="Submit">
    <a href="index.php" class="btn btn-warning">Cancel</a>

</form>
<br>
<?php include 'includes/footer.php'; ?>