<?php include'includes/header.php' ?>
<?php
	$db = new Database;
	$query = "select posts.*,categories.name from posts inner join categories on posts.category = categories.id order by id desc";
	$posts = $db->select($query);

	$query = "select * from categories order by id desc";
	$category = $db->select($query);
?>
<!--Content Here -->
<table class="table table-striped">

	<tr>
		<th>POST Id#</th>
		<th>POST Title</th>
		<th>Category</th>
		<th>Author</th>
		<th>Date</th>
	</tr>
	<?php 	while ($row = $posts->fetch_assoc()) {	?>
	<tr>
		<td><?php echo $row['id'];?></td>
		<td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['author'];?></td>
		<td><?php echo formatDate($row['date']);?></td>
	</tr>
	<?php 	}	?>
</table>

<table class="table table-striped">
	<tr>
		<th>Category Id#</th>
		<th>Category Name</th>
	</tr>
	<?php  	while ($rows = $category->fetch_assoc()) { ?>
	<tr>
		<td><?php echo $rows['id'];?></td>
		<td><a href="edit_category.php?id=<?php echo $rows['id'];?>"><?php echo $rows['name'];?></a></td>
	</tr>
	<?php 	}	?>
</table>


<?php include'includes/footer.php' ?>
