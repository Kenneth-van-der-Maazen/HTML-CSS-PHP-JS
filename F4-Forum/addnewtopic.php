<?php
include 'connect.php';
session_start();

$topic = addslashes($_POST['topic']);
$content = nl2br(addslashes($_POST['content']));
$cid = $_GET['cid'];
$scid = $_GET['scid'];

$result = mysqli_query($sql, "INSERT INTO topics (category_id, subcategory_id, user_name, topic_title, topic_content, date_posted)
											VALUES ('".$cid."', '".$scid."', '".$_SESSION['user_name']."', '".$topic."', '".$content."', NOW());");
											
if ($result) {
		header("Location: /forum/topics/".$cid."/".$scid."");
	}
?>