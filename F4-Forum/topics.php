<?php
include 'connect.php';
include 'header.php';
include 'content_function.php';

disptopics($_GET['cid'], $_GET['scid']);
/*
if (isset($_SESSION['user_name'])) {
	echo "<div class='content'><p><a href='/forum/newtopic.php?id=".$_GET['cid']."/".$_GET['scid']."'>
				add new topic</a></p></div>";
}
*/
echo '</div>';

include 'footer.php';
?>