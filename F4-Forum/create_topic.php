<?php
include 'connect.php';
include 'header.php';

echo "<br /><h2>Create a topic</h2><br /><br />";
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	echo "<form method='post' action=''>
		Category: <select style='background-color:#003300; opacity: .4;'><option value='categories'>Coins</option></select><br /><br />
		Topic name: <input style='background-color:#003300; opacity: .4;' type='text' name='cat_name' /><br /><br />
		Comment: <br /><textarea style='background-color:#003300; opacity: .4;' rows='16' cols='80' name='cat_description' /></textarea><br />
		<input style='background-color:#003300; opacity: .4;' type='submit' value='Create topic' />
		</form>";
}
else
{
	$sql = "INSERT INTO categories(category_title, category_descr)
				VALUES('". mysql_real_escape_string($_POST['cat_name']) ."',
				'". mysql_real_escape_string($_POST['cat_description']) ."')";
	$result = mysql_query($sql);
	if(!$result)
	{
		echo 'Error' . mysql_error();
	}
	else
	{
		echo 'New category added';
	}
}

?>

</div> <!-- content -->

<?php
include 'footer.php';
?>